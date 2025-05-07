<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPendienteImputacionToSolicitudesBouchersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('solicitudes_bouchers', function (Blueprint $table) {
            $table->boolean('pendiente_imputacion')->after('sistema_id_consumido')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('solicitudes_bouchers', function (Blueprint $table) {
            $table->dropColumn('pendiente_imputacion');
        });
    }
}
