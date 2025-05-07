<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class SolicitudesBouchersTiposSeeder extends Seeder
{
	/**
	 * 
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Schema::disableForeignKeyConstraints();		
		DB::table('solicitudes_bouchers_tipos')->truncate();

		DB::table('solicitudes_bouchers_tipos')->insert([
			'company_id' => 2,			
			'nombre' => 'Crédito Inicial Bonificado',			
			'observaciones' =>'Boucher asignado a la obra inicialmente.'

		]);

		DB::table('solicitudes_bouchers_tipos')->insert([
			'company_id' => 2,			
			'nombre' => 'Boucher con costo',			
			'observaciones' =>'Boucher con costo por solicitudes posteriores al crédito inicial.'

		]);

		DB::table('solicitudes_bouchers_tipos')->insert([
			'company_id' => 2,			
			'nombre' => 'Otros Bouchers',			
			'observaciones' =>'Otras situaciones.'

		]);	

		
	}
}
