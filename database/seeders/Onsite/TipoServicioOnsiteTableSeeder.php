<?php

use Illuminate\Database\Seeder;

class TipoServicioOnsiteTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

		DB::table('tipos_servicios_onsite')->insert([
			'id'=> 1, 'nombre'=> 'Alta',
		]);
		DB::table('tipos_servicios_onsite')->insert([
			'id'=> 2, 'nombre'=> 'Baja',
		]);
        DB::table('tipos_servicios_onsite')->insert([
			'id'=> 3, 'nombre'=> 'Incidente',
		]);		
		DB::table('tipos_servicios_onsite')->insert([
			'id'=> 4, 'nombre'=> 'Mudanza',
		]);
		DB::table('tipos_servicios_onsite')->insert([
			'id'=> 5, 'nombre'=> 'Cartelería',
		]);		
    }
}
