<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SolicitudTipoOtrosSeeder extends Seeder
{
	/**
	 * 
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		
		DB::table('solicitudes_tipos')->insert([
			'company_id' => 2,			
			'nombre' => 'Otros / Indefinido',
			'orden' => 5
		]);

		DB::table('solicitudes_tipos_tarifas_bases')->insert([
			'company_id' => 2,			
			'solicitud_tipo_id' => 5,
			'moneda' => 'pesos',
			'precio' => 0,
			'version' => 1,
			'observaciones'=> '-'
		]);

	}
}
