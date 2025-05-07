<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldCantidadVisitasReparacionesDetalle extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('reparaciones_detalle', function (Blueprint $table) {
            $table->integer('cantidad_visitas')->nullable()->after('codigo_activo_descripcion10');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('reparaciones_detalle', function (Blueprint $table) {
            $table->dropColumn('cantidad_visitas');
        });
    }
}
