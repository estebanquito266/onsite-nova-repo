<?php

use Illuminate\Database\Seeder;

class TipoImagenOnsiteTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('tipos_imagenes_onsite')->insert([
            'id' => 1,
            'nombre' => '-Ninguna-',
        ]);

        DB::table('tipos_imagenes_onsite')->insert([
            'id' => 2,
            'nombre' => 'Frente Local',
        ]);

        DB::table('tipos_imagenes_onsite')->insert([
            'id' => 3,
            'nombre' => 'Equipo',
        ]);

        DB::table('tipos_imagenes_onsite')->insert([
            'id' => 4,
            'nombre' => 'Terminal Red',
        ]);

        DB::table('tipos_imagenes_onsite')->insert([
            'id' => 5,
            'nombre' => 'Comprobante',
        ]);

        DB::table('tipos_imagenes_onsite')->insert([
            'id' => 6,
            'nombre' => 'Trabajo',
        ]);
    }
}
