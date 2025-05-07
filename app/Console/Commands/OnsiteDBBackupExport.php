<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class OnsiteDBBackupExport extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'db:dump-onsite-tables';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Runs the mysqldump utility using info from .env for dumps the database tables structure and data.';

    /**
     * @var string
     */
    protected static $sqlExt = '.sql';

    /**
     * @var string
     */
    protected static $zipExt = '.zip';

    /**
     * @var string
     */
    protected $dbHost;

    /**
     * @var string
     */
    protected $dbUsername;

    /**
     * @var string
     */
    protected $dbPassword;

    /**
     * @var string
     */
    protected $dbDatabase;

    /**
     * @var string
     */
    protected $pathDir;

    /**
     * Create a new console command instance.
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
        $this->pathDir = database_path('backups');
    }

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
        $this->validateDirectory();

        $this->dbStructDump();

        $this->dbDataDump();
    }

    /**
     * @return void
     */
    private function dbStructDump(): void
    {
        $ignoreTables = $this->ignoreTables();
        $this->runDump('onsite-estructura-dump', null, $ignoreTables, true);
    }

    /**
     * @return void
     */
    private function dbDataDump(): void
    {
        $dataTables = $this->getTablesNames();
        $ignoreTables = $this->ignoreTables();
        $this->runDump('onsite-configuracion-dump', $dataTables, $ignoreTables, false, true);
    }

    /**
     * @param string $filename
     * @param array|null $tables
     * @param array|null $ignoreTables
     * @param bool $structOnly
     * @param bool $dataOnly
     * @return void
     */
    private function runDump(
        string $filename,
        ?array $tables = null,
        ?array $ignoreTables = null,
        bool $structOnly = false,
        bool $dataOnly = false
    ): void {
        $filename = $this->getFilename($filename);
        $pathFile = $this->getPathFile($filename);
        $pathFileSql = $pathFile . self::$sqlExt;
        $pathFileZip = $pathFile . self::$zipExt;

        $this->generateSQLFile($pathFileSql, $tables, $ignoreTables, $structOnly, $dataOnly);

        $this->generateZIPFile($pathFileZip, $pathFileSql);
    }

    /**
     * @param string $filepath
     * @param array|null $tables
     * @param array|null $ignoreTables
     * @param bool $structOnly
     * @param bool $dataOnly
     * @return void
     */
    private function generateSQLFile(
        string $filepath,
        ?array $tables = null,
        ?array $ignoreTables = null,
        bool $structOnly = false,
        bool $dataOnly = false
    ): void {
        $tables = $this->prepareTablesArrayToString($tables);
        $ignoreTables = $this->prepareTablesArrayToString($ignoreTables, true);
        $structOnly = ($structOnly) ? '--no-data' : '';
        $dataOnly = ($dataOnly) ? '--no-create-info' : '';
        $suffix = '--single-transaction';

        $command = sprintf(
            'mysqldump -h %s -u %s -p\'%s\' %s %s %s %s %s %s > %s',
            $this->dbHost,
            $this->dbUsername,
            $this->dbPassword,
            $structOnly,
            $dataOnly,
            $ignoreTables,
            $this->dbDatabase,
            $tables,
            $suffix,
            $filepath
        );

        exec($command);
    }

    /**
     * @param string $pathFileZip
     * @param string $pathFileSql
     * @return void
     */
    private function generateZIPFile(string $pathFileZip, string $pathFileSql): void
    {
        $command = sprintf('zip %s %s', $pathFileZip, $pathFileSql);

        exec($command);
    }

    /**
     * @return void
     */
    private function validateDirectory(): void
    {
        if (! is_dir($this->pathDir)) {
            mkdir($this->pathDir, 0755, true);
        }
    }

    /**
     * @param string $filename
     * @return string
     */
    private function getPathFile(string $filename): string
    {
        return $this->pathDir . '/' . $filename;
    }

    /**
     * @param string $name
     * @return string
     */
    private function getFilename(string $name): string
    {
        return date('Ymd-His', time()) . '-' . $name;
    }

    /**
     * @param string|array $tables
     * @param bool $ignore
     * @return string
     */
    private function prepareTablesArrayToString($tables, bool $ignore = false): string
    {
        $prefix = '--ignore-table=' . $this->dbDatabase . '.';

        if (is_string($tables) && $tables !== '') {
            return $ignore ? $prefix . $tables : $tables;
        }

        if (is_array($tables) && ! empty($tables)) {
            return $ignore ? $prefix . implode(' '. $prefix, $tables) : implode(' ', $tables);
        }

        return '';
    }

    /**
     * @return array
     */
    private function getTablesNames(): array
    {
        return [
            'companies',
            'empresas_onsite',
            'estados_onsite',
            'estados_solicitudes_onsite',
            'historial_estados_notas_onsite',
            'historial_estados_onsite',
            'historial_estados_onsite_visible_por_user',
            'imagenes_onsite',
            'imagenes_unidades_exteriores_onsite',
            'imagenes_unidades_interiores_onsite',
            'localidades_onsite',
            // 'migrations',
            'niveles_onsite',
            'notas_onsite',
            'obras_checklist_onsite',
            'obras_onsite',
            'parametros',
            'perfiles',
            'perfiles_usuarios',
            //'personal_access_tokens',
            'plantillas_mails',
            'provincias',
            'reparaciones_onsite',
            'reparaciones_onsite_confirmadas_por_users',
            'reparacion_checklist_onsite',
            'roles',
            'roles_perfiles',
            'sistemas_onsite',
            'sla_onsite',
            'solicitudes_onsite',
            'sucursales_onsite',
            'terminales_onsite',
            'tipos_imagenes_onsite',
            'tipos_servicios_onsite',
            'unidades_exteriores_onsite',
            'unidades_interiores_onsite',
            'users',
            'user_companies',

            'user_empresas_onsite',
            'empresas_onsite_tipos_servicios_onsite',
            'user_sucursales_onsite',

            'oauth_clients',
            'oauth_personal_access_clients',
            'oauth_refresh_tokens'


        ];
    }

    /**
     * @return array
     */
    private function ignoreTables(): array
    {
        return [
            'calificaciones_fixup',
            'colores',
            'contratos',
            'cuentas_vendedores_mercado_pago_example',
            'descuentos',
            'elockers_etiquetas',
            'estados',
            'estados_derivaciones',
            'estados_derivaciones_servicios',
            'fallas',
            'fallas_grupos_equipos',
            'grupos_equipos',
            'grupos_equipos_sucursales',
            'localidades',
            'marcas',
            'marcas_grupos_equipos',
            'marcas_oficiales',
            'marcas_tipos_ingresos',
            'mensajes_web',
            'mensajes_web_tipos_ingresos_estados',
            'metodos_cobro',
            'migrations',
            'modelos',
            'modelos_colores',
            'motivos_cancelacion_derivacion',
            'motivos_cancelacion_orden_retiro_domicilio',
            'motivos_cancelacion_turno',
            'motivos_interes_derivaciones',
            'motivos_pendientes_orden_retiro_domicilio',
            'motivos_presupuesto_sin_cargo',
            'motivos_rechazo_presupuesto',
            'multiplicadores_fee',
            'multiplicadores_fee_usd',
            'operadores',
            'parametros_sitio_web',
            'plantillas_mails_variables',
            'porcentajes_iva',
            'preguntas_frecuentes',
            'presupuesto_pasos',
            'preguntas_frecuentes_pasos',
            'presupuestos_resoluciones',
            'presupuestos_etiquetas',
            'presupuesto_variables',
            'presupuestos_etiquetas_presupuestos_resoluciones',
            'presupuestos_resoluciones_tipos_equipos',
            'proveedores',
            'proveedores_logisticos',
            'repuestos',
            'resoluciones',
            'servicios',
            'servicios_extras',
            'servicios_extras_tipos_ingresos',
            'servicos_extra_tipos_equipos',
            'servicios_habilitados',
            'sucursales',
            'sucursales_estados',
            'sucursales_marcas',
            'sucursales_tipos_ingresos',
            'sucursal_user',
            'talleres_externos',
            'templates_mails',
            'templates_comprobantes',
            'tipos_clientes',
            'tipos_equipos',
            'tipos_equipos_grupos_equipos',
            'tipos_horarios',
            'tipos_ingresos',
            'tipos_parametros_sitio_web',
            'tipos_visibilidades',
            'users_example',

            'grupos_equipos_marcas_modelos',
            'grupos_equipos_marcas_modelos_sugeridos',
            'grupos_equipos_marcas_sugeridas',
            'historial_estados_notas',
            
        ];
    }
}
