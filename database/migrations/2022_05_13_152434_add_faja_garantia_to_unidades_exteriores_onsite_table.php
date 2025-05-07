<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFajaGarantiaToUnidadesExterioresOnsiteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('unidades_exteriores_onsite', function (Blueprint $table) {
            $table->text('faja_garantia')->nullable();
            $table->text('direccion')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('unidades_exteriores_onsite', function (Blueprint $table) {
            $table->dropColumn('faja_garantia');
            $table->dropColumn('direccion');
        });
    }
}
