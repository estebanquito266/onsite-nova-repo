<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSistemaIdConsumidoToSolicitudesBouchersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('solicitudes_bouchers', function (Blueprint $table) {
           $table->bigInteger('sistema_id_consumido')->after('consumido')->default(0);
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
            $table->dropColumn('sistema_id_consumido');
        });
    }
}
