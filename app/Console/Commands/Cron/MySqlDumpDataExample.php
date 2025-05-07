<?php

namespace App\Console\Commands\Cron;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use App\Models\EmpresaInstaladora\EmpresaInstaladoraOnsite;
use App\Models\Onsite\ObraOnsite;
use App\Models\Onsite\SistemaOnsite;
use App\Models\Onsite\SolicitudOnsite;
use App\Models\Onsite\UnidadExteriorOnsite;
use App\Models\Onsite\UnidadInteriorOnsite;
use App\Models\Onsite\ReparacionOnsite;
use \ZipArchive;

class MySqlDumpDataExample extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'db:dumpDataExample {email_to?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generates a MySQL dump of Example backups and sends it via email.';

    /**
     * Constantes
     */
    const EXT_SQL = '.sql';
    const EXT_ZIP = '.zip';

    /**
     * Constantes de conexión a la BD
     */
    protected $dbHost;
    protected $dbUsername;
    protected $dbPassword;
    protected $dbDatabase;

    /**
     * Constantes del envío de mails
     */
    protected $EMAIL_NAME_FROM;
    protected $EMAIL_FROM;
    protected $EMAIL_TO;
    protected $EMAIL_SUBJECT;

    /**
     * Constantes de la clase
     */
    protected $pathDir;
    protected $fileNameSql;
    protected $fileNameZip;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();

        $this->dbHost = env('DB_HOST');
        $this->dbUsername = env('DB_USERNAME');
        $this->dbPassword = env('DB_PASSWORD');
        $this->dbDatabase = env('DB_DATABASE');

        $this->pathDir = database_path() . DIRECTORY_SEPARATOR . 'backups' . DIRECTORY_SEPARATOR;

        $this->fileNameSql = $this->pathDir . $this->getFilename('dump-example') . self::EXT_SQL;
        $this->fileNameZip = $this->pathDir . $this->getFilename('dump-example') . self::EXT_ZIP;

        $this->EMAIL_NAME_FROM = env('MAIL_FROM_NAME');
        $this->EMAIL_FROM = env('MAIL_FROM_ADDRESS');
        $this->EMAIL_SUBJECT = 'Backups';
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        Log::info('MySqlDumpDataExample - start');

        if (!File::exists($this->pathDir)) {
            // El directorio no existe, lo creamos
            File::makeDirectory($this->pathDir, 0755, true);
        }

        // Consulta si el argumento tiene un valor para asignar el valor a EMAIL_TO
        if ($this->argument('email_to')) {
            $this->EMAIL_TO = $this->argument('email_to');
        } else {
            $this->EMAIL_TO = env('MAIL_DUMP');
        }

        // Crea el dump/zip y lo envía por mail
        $this->crearEnviarDumpDataExample();

        Log::info('MySqlDumpDataExample - end');
    }

    /**
     * Generate the filename with a prefix and timestamp.
     *
     * @param  string  $name
     * @return string
     */
    private function getFilename($name)
    {
        return date('Ymd-His', time()) . '-' . $name;
    }

    /**
     * Create and send the dump file via email.
     *
     * @return void
     */
    private function crearEnviarDumpDataExample()
    {
        $body = 'Dump de la base de datos generado el ' . date('Y-m-d H:i:s', time());
        $empresas_instaladoras_id = [];

        if (!empty(env('EMPRESAS_INSTALADORAS_ID'))) {
            $empresas_instaladoras_id = explode(',', env('EMPRESAS_INSTALADORAS_ID'));
        }

        $obras_id = $this->getObrasId($empresas_instaladoras_id);
        if (empty($obras_id)) Log::info('No se encontraron obras para las empresas instaladoras especificadas.');

        $sistemas_id = $this->getSistemasId($obras_id);
        if (empty($sistemas_id)) Log::info('No se encontraron sistemas para las obras especificadas.');

        $unidades_interiores_id = $this->getUnidadesInterioresId($sistemas_id);
        if (empty($unidades_interiores_id)) Log::info('No se encontraron unidades interiores para los sistemas especificados.');

        $unidades_exteriores_id = $this->getUnidadesExterioresId($sistemas_id);
        if (empty($unidades_exteriores_id)) Log::info('No se encontraron unidades exteriores para los sistemas especificados.');

        $reparaciones_id = $this->getReparacionesId($sistemas_id);
        if (empty($reparaciones_id)) Log::info('No se encontraron reparaciones para los sistemas especificados.');

        $solicitudes_id = $this->getSolicitudesId($obras_id);
        if (empty($solicitudes_id)) Log::info('No se encontraron solicitudes para las obras especificadas.');

        $tablasDataExample = $this->getTablasDataExample($empresas_instaladoras_id, $obras_id, $sistemas_id, $unidades_interiores_id, $unidades_exteriores_id, $reparaciones_id, $solicitudes_id);

        foreach ($tablasDataExample as $tablaDataExample) {
            $filename = explode(" ", $tablaDataExample)[0];
            $sqlDumpFileName = $this->crearDumpDeLaTabla($filename, $tablaDataExample, '', false, true);
            $this->agregarAlDump($sqlDumpFileName);
        }

        $this->comprimirDump($this->fileNameZip, $this->fileNameSql);

        $filename = 'dump-data-example';

        $this->enviarMail($filename, $body, [$this->fileNameZip]);
    }

    /**
     * Get the IDs of all obras using the EmpresaInstaladoraOnsite model.
     *
     * @param  array  $empresas_instaladoras_id
     * @return array
     */
    private function getObrasId($empresas_instaladoras_id)
    {
        return ObraOnsite::whereIn('empresa_instaladora_id', $empresas_instaladoras_id)->pluck('id')->toArray();
    }

    /**
     * Get the IDs of all sistemas using the ObraOnsite model.
     *
     * @param  array  $obras_id
     * @return array
     */
    private function getSistemasId($obras_id)
    {
        return SistemaOnsite::whereIn('obra_onsite_id', $obras_id)->pluck('id')->toArray();
    }

    /**
     * Get the IDs of all solicitudes using the ObraOnsite model.
     *
     * @param  array  $obras_id
     * @return array
     */
    private function getSolicitudesId($obras_id)
    {
        return SolicitudOnsite::whereIn('obra_onsite_id', $obras_id)->pluck('id')->toArray();
    }

    /**
     * Get the IDs of all unidades interiores using the SistemaOnsite model.
     *
     * @param  array  $sistemas_id
     * @return array
     */
    private function getUnidadesInterioresId($sistemas_id)
    {
        return UnidadInteriorOnsite::whereIn('sistema_onsite_id', $sistemas_id)->pluck('id')->toArray();
    }

    /**
     * Get the IDs of all unidades exteriores using the SistemaOnsite model.
     *
     * @param  array  $sistemas_id
     * @return array
     */
    private function getUnidadesExterioresId($sistemas_id)
    {
        return UnidadExteriorOnsite::whereIn('sistema_onsite_id', $sistemas_id)->pluck('id')->toArray();
    }

    /**
     * Get the IDs of all reparaciones using the SistemaOnsite model.
     *
     * @param  array  $sistemas_id
     * @return array
     */
    private function getReparacionesId($sistemas_id)
    {
        return ReparacionOnsite::whereIn('sistema_onsite_id', $sistemas_id)->pluck('id')->toArray();
    }

    /**
     * Genera el dump de una tabla
     * @param string $filename nombre del archivo
     * @param array $tables tablas a incluir en el dump
     * @param array $ignoreTables tablas a excluir del dump
     * @param bool $structOnly si esta en true solo genera la estructura de las tablas
     * @param string $emailBody si no esta vacio envia un email con el dump comprimido adjunto
     */
    private function crearDumpDeLaTabla($filename, $tables = null, $ignoreTables = null, $structOnly = false, $dataOnly = false)
    {
        $filename = $this->getFilename($filename);
        $pathFile = $this->getPathFile($filename);
        $pathFileSql = $pathFile . self::EXT_SQL;

        $this->runDump($pathFileSql, $tables, $ignoreTables, $structOnly, $dataOnly);

        // se reemplaza ripauser_ripabd  por root
        $archivo = file_get_contents($pathFileSql);
        $patron = '/ripauser_ripabd/';
        $sustitucion = 'root';
        $datosnuevos = preg_replace($patron, $sustitucion, $archivo);
        file_put_contents($pathFileSql, $datosnuevos);

        return $pathFileSql;
    }

    /**
     * Agrega el contenido de un archivo sql al final del archivo dump general ($this->fileNameSql)
     *  y elimina el archivo
     * @param string $dumpTabla nombre y ruta del archivo sql
     */
    private function agregarAlDump($dumpTabla) {
        File::append($this->fileNameSql, File::get($dumpTabla) . "\n\n");
        File::delete($dumpTabla);
    }
    /**
     * Genera un dump de la BD
     * @param string $filepath ruta del archivo de salida
     * @param array $tables tablas a incluir en el dump
     * @param array $ignoreTables tablas a excluir en el dump
     * @param bool $structOnly genera solo la estructura de las tablas
     * @param bool $dataOnly genera solo los datos de las tablas
     */
    private function runDump($filepath, $tables = null, $ignoreTables = null, $structOnly = false, $dataOnly = false)
    {

        $tables = $this->tableArraysToString($tables);
        $ignoreTables = $this->ignoreTableArraysToString($ignoreTables);
        $structOnly = ($structOnly) ? '--no-data' : '';
        $dataOnly = ($dataOnly) ? '--no-create-info' : '';
        $dbPassword = ('' !== $this->dbPassword) ? " -p'" . $this->dbPassword . "'" : '';

        $command = sprintf(
            //'mysqldump --column-statistics=0 -h %s -u %s -p\'%s\'%s %s %s %s %s > %s',
            'mysqldump -h %s -u %s -p\'%s\'%s %s %s %s %s > %s',
            $this->dbHost,
            $this->dbUsername,
            $dbPassword,
            $structOnly,
            $dataOnly,
            $ignoreTables,
            $this->dbDatabase,
            $tables,
            $filepath
        );

        exec($command);
    }

    private function getPathFile($filename)
    {
        return $this->pathDir . $filename;
    }

    private function comprimirDump($pathFileZip, $pathFileSql)
    {
        // Validar que los archivos existan
        if (!file_exists($pathFileSql)) {
            throw new \InvalidArgumentException("El archivo SQL no existe: $pathFileSql");
        }

        // Crea una instancia de la clase ZipArchive
        $zip = new ZipArchive();

        // Intenta abrir o crear el archivo ZIP
        if ($zip->open($pathFileZip, ZipArchive::CREATE | ZipArchive::OVERWRITE) === true) {
            // Añade el archivo SQL al ZIP
            $zip->addFile($pathFileSql, basename($pathFileSql));
            
            // Cierra el archivo ZIP
            $zip->close();
        } else {
            throw new \RuntimeException("Error al comprimir el archivo SQL: $pathFileSql");
        }
    }

    /**
     * Envia email con adjuntos
     * @param filename Nombre del archivo que va en el subject del mail
     * @param body cuerpo del mail
     * @param arrayFiles Array de rutas de archivos a adjuntar
     */
    private function enviarMail($filename, $body, $arrayFiles)
    {

        $subject = $this->EMAIL_SUBJECT . ' ' . $filename;
        $email_to = $this->EMAIL_TO;

        $emails = explode(",", trim($email_to));

        //foreach ($emails as $mail) {
            Mail::send('emails.comprobante', ['cuerpo' => $body], function ($message) use ($subject, $arrayFiles, $emails) {
                $message->from($this->EMAIL_FROM, $this->EMAIL_NAME_FROM);
                //$message->to($mail);
                $message->to($emails);
                $message->subject($subject);

                foreach ($arrayFiles as $file) {
                    $message->attach($file);
                }

                //$message->setBody($body, 'text/html');
            });
        //}        
    }

    private function ignoreTableArraysToString($ignoreTables = null)
    {

        if ($ignoreTables != null) {
            $split = '--ignore-table=' . $this->dbDatabase . '.';
            if (is_array($ignoreTables)) {
                return $split . implode($split, $ignoreTables);
            } else {
                return $split . $ignoreTables;
            }
        }
        return '';
    }

    private function tableArraysToString($tables = null)
    {

        if ($tables != null) {
            if (is_array($tables)) {
                return implode(' ', $tables);
            } else {
                return $tables;
            }
        }
        return '';
    }

    private function getTablasDataExample($empresas_instaladoras_id = [], $obras_id = [], $sistemas_id = [], $unidades_interiores_id, $unidades_exteriores_id = [], $reparaciones_id = [], $solicitudes_id = [])
    {
        $tables = [];

        if (!empty($empresas_instaladoras_id) && is_array($empresas_instaladoras_id)) {
            $empresas_instaladoras_ids_string = implode(',', $empresas_instaladoras_id);
            $tables[] = 'empresas_instaladoras_onsite --where="id IN (' . $empresas_instaladoras_ids_string . ')"';
        }

        if (!empty($obras_id) && is_array($obras_id)) {
            $obras_ids_string = implode(',', $obras_id);
            $tables[] = 'obras_onsite --where="id IN (' . $obras_ids_string . ')"';
        }

        if (!empty($sistemas_id) && is_array($sistemas_id)) {
            $sistemas_ids_string = implode(',', $sistemas_id);
            $tables[] = 'sistemas_onsite --where="id IN (' . $sistemas_ids_string . ')"';
        }

        if (!empty($unidades_interiores_id) && is_array($unidades_interiores_id)) {
            $unidades_interiores_ids_string = implode(',', $unidades_interiores_id);
            $tables[] = 'unidades_interiores_onsite --where="id IN (' . $unidades_interiores_ids_string . ')"';
        }

        if (!empty($unidades_exteriores_id) && is_array($unidades_exteriores_id)) {
            $unidades_exteriores_ids_string = implode(',', $unidades_exteriores_id);
            $tables[] = 'unidades_exteriores_onsite --where="id IN (' . $unidades_exteriores_ids_string . ')"';
        }

        if (!empty($reparaciones_id) && is_array($reparaciones_id)) {
            $reparaciones_ids_string = implode(',', $reparaciones_id);
            $tables[] = 'reparaciones_onsite --where="id IN (' . $reparaciones_ids_string . ')"';
        }

        if (!empty($solicitudes_id) && is_array($solicitudes_id)) {
            $solicitudes_ids_string = implode(',', $solicitudes_id);
            $tables[] = 'solicitudes_onsite --where="id IN (' . $solicitudes_ids_string . ')"';
        }

        return $tables;
    }
}
