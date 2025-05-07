<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddEmpresaYUserToSolicitudesOnsiteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('solicitudes_onsite', function (Blueprint $table) {
            $table->foreignId('user_id')->after('sistema_onsite_id')->constrained('users');
            $table->foreignId('empresa_instaladora_id')->after('user_id')->constrained('empresas_instaladoras_onsite');
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
            $table->dropConstrainedForeignId('user_id');
            $table->dropConstrainedForeignId('empresa_instaladora_id');
        });
    }
}
