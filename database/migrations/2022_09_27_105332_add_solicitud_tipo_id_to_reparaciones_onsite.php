<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSolicitudTipoIdToReparacionesOnsite extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('reparaciones_onsite', function (Blueprint $table) {
            $table->foreignId('solicitud_tipo_id')->default(5)->after('tarea_detalle')->constrained('solicitudes_tipos');
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
            
            $table->dropConstrainedForeignId('solicitud_tipo_id');
        });
    }
}
