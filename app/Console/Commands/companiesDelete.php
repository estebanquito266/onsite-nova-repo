<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Config;

class companiesDelete extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:companiesDelete';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete companies, according to the COMPANIES_DELETE_ID variable(.env)';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $companiesIdsStr = Config::get('app.companies_delete_id');
        $companiesIdsArray = explode(",", $companiesIdsStr);
        
        if(empty($companiesIdsStr) || empty($companiesIdsArray))
        {
            $this->info('No encontramos IDs de companias a eliminar');
        }
        else
        {
            $this->info("Comenzamos eliminación de registros para las siguientes companies {$companiesIdsStr}");

            DB::table('parametros')->whereIn('company_id', $companiesIdsArray)->delete();
            DB::table('reparaciones_onsite')->whereIn('company_id', $companiesIdsArray)->delete();
            DB::table('historial_estados_onsite')->whereIn('company_id', $companiesIdsArray)->delete();
            DB::table('terminales_onsite')->whereIn('company_id', $companiesIdsArray)->delete();
            DB::table('sucursales_onsite')->whereIn('company_id', $companiesIdsArray)->delete();
            DB::table('empresas_onsite')->whereIn('company_id', $companiesIdsArray)->delete();
            DB::table('estados_onsite')->whereIn('company_id', $companiesIdsArray)->delete();
            DB::table('localidades_onsite')->whereIn('company_id', $companiesIdsArray)->delete();
            DB::table('niveles_onsite')->whereIn('company_id', $companiesIdsArray)->delete();
            DB::table('tipos_servicios_onsite')->whereIn('company_id', $companiesIdsArray)->delete();
            DB::table('provincias')->whereIn('company_id', $companiesIdsArray)->delete();
            DB::table('user_companies')->whereIn('company_id', $companiesIdsArray)->delete();
            DB::table('companies')->whereIn('id', $companiesIdsArray)->delete();

            $this->info("Eliminación terminada");
        }
    }
}
