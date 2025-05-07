<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldVentanaHorariaCoordinadaToReparacionesOnsiteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('reparaciones_onsite', function (Blueprint $table) {
            $table->string('ventana_horaria_coordinada')->nullable()->after('fecha_coordinada');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('reparaciones_onsite', function (Blueprint $table) {
            $table->dropColumn('ventana_horaria_coordinada');
        });
    }
}
