<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
          /* EstadoPedidoRespuestosOnsiteSeeder::class,
          ParametrosSeeder::class 
          TemplateDisclaimerSeeder::class
          GarantiasTipos::class
          PlantillaMailReparaciones::class,
          ParametrosSeeder::class,
          TemplateDisclaimerRepuestosSeeder::class
          TemplateVisitaSeeder::class*/
          
          SolicitudTipoOtrosSeeder::class
          
        ]);
    }
}
