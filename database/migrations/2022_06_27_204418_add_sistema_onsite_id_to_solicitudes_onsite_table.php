<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSistemaOnsiteIdToSolicitudesOnsiteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('solicitudes_onsite', function (Blueprint $table) {
            $table->foreignId('sistema_onsite_id')->after('obra_onsite_id')->constrained('sistemas_onsite');
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
            $table->dropForeign('sistema_onsite_id');
        });
    }
}
