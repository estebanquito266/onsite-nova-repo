<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EstadoPedidoRespuestosOnsiteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        DB::table('estados_ordenes_pedido_respuestos_onsite')->insert([
            'nombre' => 'En Revisión'
        ]);

        DB::table('estados_ordenes_pedido_respuestos_onsite')->insert([
            'nombre' => 'Aprobada'
        ]);

        DB::table('estados_ordenes_pedido_respuestos_onsite')->insert([
            'nombre' => 'Rechazada'
        ]);

        DB::table('estados_ordenes_pedido_respuestos_onsite')->insert([
            'nombre' => 'en Proceso'
        ]);
    }
}
