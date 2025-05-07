<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUserRepuestosIdToEmpresasOnsiteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('empresas_onsite', function (Blueprint $table) {
            $table->unsignedBigInteger('user_repuestos_id')->after('tecnico_id')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('empresas_onsite', function (Blueprint $table) {
            $table->dropColumn('user_repuestos_id');
        });
    }
}
