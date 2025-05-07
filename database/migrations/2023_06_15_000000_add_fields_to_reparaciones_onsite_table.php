<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsToReparacionesOnsiteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('reparaciones_onsite', function (Blueprint $table) {
            $table->datetime('fecha_registracion_coordinacion')->nullable()->after('fecha_coordinada');
            $table->datetime('fecha_notificado')->nullable()->after('fecha_coordinada');
            $table->float('tiempo_coordinacion')->nullable()->after('fecha_coordinada');
            $table->float('tiempo_cierre')->nullable()->after('fecha_coordinada');
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
            $table->dropColumn('fecha_registracion_coordinacion');
            $table->dropColumn('fecha_notificado');
            $table->dropColumn('tiempo_coordinacion');
            $table->dropColumn('tiempo_cierre');
        });
    }
}
