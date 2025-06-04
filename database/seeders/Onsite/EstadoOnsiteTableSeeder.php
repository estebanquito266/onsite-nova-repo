<?php
namespace Database\Seeders\Onsite;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EstadoOnsiteTableSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		/*
		DB::table('estados_onsite')->insert([
			'id' => '1',
			'nombre' => 'Nuevo',
		]);
		DB::table('estados_onsite')->insert([
			'id' => '2',
			'nombre' => 'En progreso',
		]);

		DB::table('estados_onsite')->insert([
			'id' => '3',
			'nombre' => 'Pendiente de Información',
		]);

		DB::table('estados_onsite')->insert([
			'id' => '4',
			'nombre' => 'Cerrada',
		]);

		DB::table('estados_onsite')->insert([
			'id' => '5',
			'nombre' => 'Cancelada',
		]);
		*/

		DB::table('estados_onsite')->insert([
			'id' => '10',
			'nombre' => 'Problemas de acceso',
		]);		

		DB::table('estados_onsite')->insert([
			'id' => '15',
			'nombre' => 'Problemas Logística - Infra',
		]);		

		DB::table('estados_onsite')->insert([
			'id' => '20',
			'nombre' => 'Problemas Covid',
		]);	

		DB::table('estados_onsite')->insert([
			'id' => '25',
			'nombre' => 'Factor Externo',
		]);	
	}
}
