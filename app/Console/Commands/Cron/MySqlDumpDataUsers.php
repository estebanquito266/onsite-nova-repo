<?php

namespace App\Console\Commands\Cron;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;
use App\Models\Derivacion\Derivacion;
use App\Models\Cliente\Equipo;
use App\Models\Reparacion\Reparacion;
use App\Models\Derivacion\EquipoDerivacion;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use \ZipArchive;

class MySqlDumpDataUsers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'db:dumpDataUsers {email_to?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Crea un dump de tablas de usuarios';

    /**
     * Constantes
     */
    const EXT_SQL =  '.sql';
    const EXT_ZIP =  '.zip';


    /**
     * Constantes de conexion a la BD 
     * 
     */
    protected $dbHost;
    protected $dbUsername;
    protected $dbPassword;
    protected $dbDatabase;


    protected $EMAIL_NAME_FROM;
    protected $EMAIL_FROM;
    protected $EMAIL_TO;

    /**
     * Constantes del envio de Mails
     */
    const EMAIL_SUBJECT = 'ONSITE - Dump Data Users BD';

    /**
     *  Constantes de la clase
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

        $this->fileNameSql = $this->pathDir . $this->getFilename('dump-users') . self::EXT_SQL;
        $this->fileNameZip = $this->pathDir . $this->getFilename('dump-users') . self::EXT_ZIP;

        $this->EMAIL_NAME_FROM = env('MAIL_FROM_NAME');
        $this->EMAIL_FROM = env('MAIL_FROM_ADDRESS');
		$this->EMAIL_TO = env('MAIL_DUMP');
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        Log::info('MySqlDumpDataUsers - start');

		// Consulta si el argumento tiene un valor para asignar el valor a EMAIL_TO
		if ($this->argument('email_to')) {
			$this->EMAIL_TO = $this->argument('email_to');
		}
		
		if (!$this->EMAIL_TO) 
		{
			Log::error('MySqlDumpDataUsers - EMAIL NO DEFINIDO');
			$this->error('Debe especificar un email donde enviar el dump');
			exit;
		}	

        // Crea el dump/zip  y lo envia por mail
        $this->crearEnviarDumpDataUsers();

        Log::info('MySqlDumpDataUsers - end');
    }

    private function crearEnviarDumpDataUsers()
    {
        $body = 'Dump de la base de datos generado el ' . date('Y-m-d H:i:s', time());

        // DB::select('DROP TABLE IF EXISTS users');
        // DB::select('create table users select * from users');
        // DB::table('users')->update(['password' => '$2y$10$bXvjH/jV/K0zqVF37Am7IuFj5q5tdTIcCPsAYl6hA7z7JXNAfxzOy']);

        $tablasDataUsers = $this->getTablasDataUsers();

        foreach ($tablasDataUsers as $tablaDataUsers) {
            $filename = explode(" ", $tablaDataUsers)[0];

            $sqlDumpFileName = $this->crearDumpDeLaTabla($filename, $tablaDataUsers, '', false, true);
            $this->agregarAlDump($sqlDumpFileName);
        }

        $this->comprimirDump($this->fileNameZip, $this->fileNameSql);

        $filename = 'dump-data-users';

        $this->enviarMail($filename, $body, [$this->fileNameZip]);
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

        return $pathFileSql;
    }

    /**
     * Agrega el contenido de un archivo sql al final del archivo dump general ($this->fileNameSql)
     *  y elimina el archivo
     * @param string $dumpTabla nombre y ruta del archivo sql
     */
    private function agregarAlDump($dumpTabla)
    {
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
            'mysqldump -h %s -u %s'.$dbPassword.'%s %s %s %s %s > %s',
            // 'mysqldump -h %s -u %s -p\'%s\' %s %s %s %s %s > %s',
            $this->dbHost,
            $this->dbUsername,
            // $this->dbPassword,
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

    private function getFilename($name)
    {
        return date('Ymd-His', time()) . '-' . $name;
    }

    // private function comprimirDump($pathFileZip, $pathFileSql)
    // {

    //     $command = sprintf('zip %s %s', $pathFileZip, $pathFileSql);

    //     exec($command);
    // }

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

        $subject = self::EMAIL_SUBJECT . ' ' . $filename;
        $email_to = $this->EMAIL_TO;

        $emails = explode(",", trim($email_to));
        Mail::send('emails.plantilla', ['cuerpo' => $body], function ($msj) use ($subject, $arrayFiles, $emails) {
            $msj->from($this->EMAIL_FROM, $this->EMAIL_NAME_FROM);
            $msj->to($emails);
            $msj->subject($subject);
            foreach ($arrayFiles as $file) {
                $msj->attach($file);
            }
        });
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


    private function getTablasDataUsers()
    {
        $tables[] = 'users';

        return $tables;
    }
}
