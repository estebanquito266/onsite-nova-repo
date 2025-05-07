<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPrimerVisitaToReparacionesOnsiteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('reparaciones_onsite', function (Blueprint $table) {
            $table->dateTime('fecha_1_vencimiento')->after('fecha_vencimiento')->nullable();
            $table->dateTime('fecha_1_visita')->after('fecha_1_vencimiento')->nullable();
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
            $table->dropColumn('fecha_1_vencimiento');
            $table->dropColumn('fecha_1_visita');
        });
    }
}
