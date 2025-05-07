<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIdUnificadoToEmpresasInstaladorasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('empresas_instaladoras_onsite', function (Blueprint $table) {
            $table->bigInteger('id_unificado')->after('id');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('empresas_instaladoras_onsite', function (Blueprint $table) {
            $table->dropColumn('id_unificado');
        });
    }
}
