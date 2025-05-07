<?php

use Illuminate\Database\Seeder;

class EmpresasOnsiteTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

	
		DB::table('empresas_onsite')->insert([
			'id'=> '1',
			'nombre'=> '-----',
		]);	
		
		DB::table('empresas_onsite')->insert([
			'id'=> '2',
			'nombre'=> 'Pago Fácil',
		]);			
		
		DB::table('empresas_onsite')->insert([
			'id'=> '3',
			'nombre'=> 'Rapipago',
		]);			
		
		DB::table('empresas_onsite')->insert([
			'id'=> '4',
			'nombre'=> 'Telecom',
		]);			
		
		DB::table('empresas_onsite')->insert([
			'id'=> '5',
			'nombre'=> 'Posnet',
		]);					
		
		DB::table('empresas_onsite')->insert([
			'id'=> '6',
			'nombre'=> 'Quilmes',
		]);			
		
		DB::table('empresas_onsite')->insert([
			'id'=> '7',
			'nombre'=> 'Nike',
		]);			
		
		DB::table('empresas_onsite')->insert([
			'id'=> '8',
			'nombre'=> 'YPF',
		]);			
	
    }
}
