<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddVencimientoToPiezasOnsiteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('precios_piezas_repuestos', function (Blueprint $table) {
            $table->date('vencimiento_precio')->default('2022-06-30');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('precios_piezas_repuestos', function (Blueprint $table) {
            //
        });
    }
}
