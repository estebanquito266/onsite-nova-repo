<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddObraIdToSolicitudesTiposTarifasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('solicitudes_tipos_tarifas', function (Blueprint $table) {
            $table->bigInteger('obra_id')->after('solicitud_tipo_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('solicitudes_tipos_tarifas', function (Blueprint $table) {
            $table->dropColumn('obra_id');
        });
    }
}
