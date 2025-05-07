<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCampoSolicitudTipoIdToTableSolicitudesOnsite extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('solicitudes_onsite', function (Blueprint $table) {
            $table->foreignId('solicitud_tipo_id')->constrained('solicitudes_tipos')->after('obra_onsite_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('solicitudes_onsite', function (Blueprint $table) {
            $table->dropColumn('solicitud_tipo_id');
        });
    }
}
