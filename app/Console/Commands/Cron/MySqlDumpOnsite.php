<?php

namespace App\Console\Commands\Cron;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use \ZipArchive;

class MySqlDumpOnsite extends Command
{
	/**
	 * The name and signature of the console command.
	 *
	 * @var string
	 */
	protected $signature = 'db:dumpOnsite {email_to?}';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Runs the mysqldump utility using info from .env';

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
	protected $EMAIL_TO_COPY;
	protected $EMAIL_TO_COPY_NAME;
	protected $EMAIL_SUBJECT;

	/**
	 *  Constantes de la clase
	 */
	protected $pathDir;

	public function __construct()
    {
        parent::__construct();

		$this->dbHost = env('DB_HOST');
        $this->dbUsername = env('DB_USERNAME');
        $this->dbPassword = env('DB_PASSWORD');
		$this->dbDatabase = env('DB_DATABASE');
		$this->pathDir = database_path() . DIRECTORY_SEPARATOR . 'backups' . DIRECTORY_SEPARATOR;

		$this->EMAIL_NAME_FROM = env('MAIL_FROM_NAME');
        $this->EMAIL_FROM = env('MAIL_FROM_ADDRESS');
        $this->EMAIL_TO = env('MAIL_DUMP');
        $this->EMAIL_TO_COPY = env('MAIL_COPIA');
        $this->EMAIL_TO_COPY_NAME = env('MAIL_COPIA_NOMBRE');
        $this->EMAIL_SUBJECT = 'ONSITE - Dump BD Onsite';
	}

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
		Log::info('MySqlDump - start');

		// Consulta si el argumento tiene un valor para asignar el valor a EMAIL_TO
		if ($this->argument('email_to')) {
			$this->EMAIL_TO = $this->argument('email_to');
		}
		
		if (!$this->EMAIL_TO) 
		{
			Log::error('MySqlDump - EMAIL NO DEFINIDO');
			$this->error('Debe especificar un email donde enviar el dump');
			exit;
		}		

		$this->eliminarRegistrosPrevios();
		$this->validarDirectorio();
		
		// Crea el dump/zip de toda la base, excepto la tabla Horarios, y lo envia por mail
		$this->crearEnviarDump();

		Log::info('MySqlDump - end');

	}

	private function crearEnviarDump() {
		$body = 'Dump de la base de datos generado el ' . date('Y-m-d H:i:s', time());

		$tablasConfiguracion = $this->getTablasConfiguracion();
		$zipFile[] = $this->crearComprimirDump('dump', $tablasConfiguracion);

		$this->enviarMail('dump', $body, $zipFile);
	}

	/**
	 * Genera el dump y lo comprime
	 * @param string $filename nombre del archivo
	 * @param array $tables tablas a incluir en el dump
	 * @param array $ignoreTables tablas a excluir del dump
	 * @param bool $structOnly si esta en true solo genera la estructura de las tablas
	 * @param string $emailBody si no esta vacio envia un email con el dump comprimido adjunto
	 */
	private function crearComprimirDump($filename, $tables = null, $ignoreTables = null, $structOnly = false, $dataOnly = false) {
		$filename = $this->getFilename($filename);
		$pathFile = $this->getPathFile($filename);
		$pathFileSql = $pathFile . self::EXT_SQL;
		$pathFileZip = $pathFile . self::EXT_ZIP;

		$this->runDump($pathFileSql, $tables, $ignoreTables, $structOnly, $dataOnly);

		$this->comprimirDump($pathFileZip, $pathFileSql);

		return $pathFileZip;
	}

	/**
	 * Genera un dump de la BD
	 * @param string $filepath ruta del archivo de salida
	 * @param array $tables tablas a incluir en el dump
	 * @param array $ignoreTables tablas a excluir en el dump
	 * @param bool $structOnly genera solo la estructura de las tablas
	 * @param bool $dataOnly genera solo los datos de las tablas
	 */
	private function runDump($filepath, $tables = null, $ignoreTables = null, $structOnly = false, $dataOnly = false) {

		$tables = $this->tableArraysToString($tables);
		$ignoreTables = $this->ignoreTableArraysToString($ignoreTables);
		$structOnly = ($structOnly) ? '--no-data' : '';
		$dataOnly = ($dataOnly) ? '--no-create-info' : '';
		$dbPassword = ('' !== $this->dbPassword) ? " -p'" . $this->dbPassword . "'" : '';

		$command = sprintf(
			'mysqldump --single-transaction -h %s -u %s'.$dbPassword.'%s %s %s %s %s > %s',
			//'mysqldump --single-transaction -h %s -u %s -p\'%s\' %s %s %s %s %s > %s',
			$this->dbHost,
			$this->dbUsername,
			//$this->dbPassword,
			$structOnly,
			$dataOnly,
			$ignoreTables,
			$this->dbDatabase,
			$tables,
			$filepath
		);

		exec($command);

	}

	private function eliminarRegistrosPrevios() {

		$file = new Filesystem;
		$file->cleanDirectory($this->pathDir);
	}

	private function validarDirectorio() {
		if (!is_dir($this->pathDir)) {
            mkdir($this->pathDir, 0755, true);
        }
	}

	private function getPathFile($filename) {
		return $this->pathDir . $filename;
	}

	private function getFilename($name) {
		return date('Ymd-His', time()) . '-' . $name;
	}

	private function ignoreTableArraysToString($ignoreTables = null) {

		if($ignoreTables != null) {
			$split = '--ignore-table=' . $this->dbDatabase . '.';
			if(is_array($ignoreTables)) {
				return $split . implode($split, $ignoreTables);
			} else {
				return $split . $ignoreTables;
			}
		}
		return '';
	}

	private function tableArraysToString($tables = null) {

		if($tables != null) {
			if(is_array($tables)) {
				return implode(' ', $tables);
			} else {
				return $tables;
			}
		}
		return '';
	}

	// private function comprimirDump($pathFileZip, $pathFileSql) {
		
	// 	$command = sprintf('zip %s %s', $pathFileZip, $pathFileSql);
		
	// 	exec($command);
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

		$subject = $this->EMAIL_SUBJECT . ' ' . $filename;
        $email_to = $this->EMAIL_TO;
        $email_to_copy = $this->EMAIL_TO_COPY;
        $email_to_copy_name = $this->EMAIL_TO_COPY_NAME;

        $emails = explode(",", trim($email_to));
		Mail::send('emails.plantilla', [ 'cuerpo'=>$body ], 
			function($msj) use ($subject, $arrayFiles, $emails, $email_to_copy, $email_to_copy_name ) 
			{
				$msj->from($this->EMAIL_FROM, $this->EMAIL_NAME_FROM );
				$msj->to($emails);
				$msj->cc($email_to_copy,$email_to_copy_name);
				$msj->subject($subject);
				foreach($arrayFiles as $file) {
					$msj->attach($file);
				}
			}
		);		
	}

	private function getTablasConfiguracion()
	{
		$tables_in_db = DB::select('SHOW TABLES');
		$db = "Tables_in_".env('DB_DATABASE');
		$tables = [];
		foreach($tables_in_db as $table){
			$tables[] = $table->{$db};
		}
		return $tables;
	}	
}
