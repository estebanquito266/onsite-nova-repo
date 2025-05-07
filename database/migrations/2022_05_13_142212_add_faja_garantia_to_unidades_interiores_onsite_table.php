<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFajaGarantiaToUnidadesInterioresOnsiteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('unidades_interiores_onsite', function (Blueprint $table) {
           $table->text('faja_garantia')->nullable()->after('direccion');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('unidades_interiores_onsite', function (Blueprint $table) {
            $table->dropColumn('faja_garantia');
        });
    }
}
