<?php
namespace Database\Seeders\Onsite;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NivelOnsiteTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('niveles_onsite')->insert([
			'id'=> 10, 'nombre'=> 'Interior0',
		]);
		DB::table('niveles_onsite')->insert([
			'id'=> 11, 'nombre'=> 'Interior1',
		]);
		DB::table('niveles_onsite')->insert([
			'id'=> 12, 'nombre'=> 'Interior2',
		]);
		DB::table('niveles_onsite')->insert([
			'id'=> 13, 'nombre'=> 'Interior3',
		]);
		
		DB::table('niveles_onsite')->insert([
			'id'=> 14, 'nombre'=> 'Interior4',
		]);
		DB::table('niveles_onsite')->insert([
			'id'=> 15, 'nombre'=> 'Interior5',
		]);
		DB::table('niveles_onsite')->insert([
			'id'=> 16, 'nombre'=> 'Interior6',
		]);		
		
    }
}
