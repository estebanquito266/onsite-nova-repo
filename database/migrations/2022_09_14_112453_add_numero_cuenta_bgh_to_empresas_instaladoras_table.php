<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNumeroCuentaBghToEmpresasInstaladorasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('empresas_instaladoras_onsite', function (Blueprint $table) {
            $table->integer('numero_cuenta_bgh')->after('nombre')->nullable();
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
            $table->dropColumn('numero_cuenta_bgh');
        });
    }
}
