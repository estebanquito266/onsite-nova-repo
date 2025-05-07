<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddActivoToEmpresasInstaladorasOnsiteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('empresas_instaladoras_onsite', function (Blueprint $table) {
            $table->boolean('activo')->after('id_unificado')->default(true);
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
            $table->dropColumn('activo');
        });
    }
}
