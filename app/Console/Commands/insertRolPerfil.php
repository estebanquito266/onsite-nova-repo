<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class insertRolPerfil extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'seeder:insertRolPerfil';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        
        DB::table('roles')->insert([
			'id'=> '930',
			'nombre'=> 'REPARACIONES ONSITE-> Obras Onsite',
			'ruta'=> 'obrasOnsite',
		]);

        DB::table('roles_perfiles')->insert([
			'id_perfil'=> '1',
			'id_rol'=> '930',
		]);
        

        
        DB::table('roles')->insert([
			'id'=> '932',
			'nombre'=> 'SOLICITUDES ONSITE-> Solicitud Onsite',
			'ruta'=> 'solicitudesOnsite',
		]);

        DB::table('roles_perfiles')->insert([
			'id_perfil'=> '1',
			'id_rol'=> '932',
		]);
        

        DB::table('roles')->insert([
			'id'=> '934',
			'nombre'=> 'ONSITE-> Visitas Onsite',
			'ruta'=> 'visitasOnsite',
		]);

        DB::table('roles_perfiles')->insert([
			'id_perfil'=> '1',
			'id_rol'=> '934',
		]);
        
        

        DB::table('roles')->insert([
			'id'=> '936',
			'nombre'=> 'ONSITE-> Sistemas Onsite',
			'ruta'=> 'sistemaOnsite',
		]);

        DB::table('roles_perfiles')->insert([
			'id_perfil'=> '1',
			'id_rol'=> '936',
		]);        

        DB::table('roles')->insert([
			'id'=> '938',
			'nombre'=> 'ONSITE-> Unidad Exterior Onsite',
			'ruta'=> 'unidadExterior',
		]);

        DB::table('roles_perfiles')->insert([
			'id_perfil'=> '1',
			'id_rol'=> '938',
		]);        

        DB::table('roles')->insert([
			'id'=> '940',
			'nombre'=> 'ONSITE-> Unidad Interior Onsite',
			'ruta'=> 'unidadInterior',
		]);

        DB::table('roles_perfiles')->insert([
			'id_perfil'=> '1',
			'id_rol'=> '940',
		]);          

        

        

    }
}
