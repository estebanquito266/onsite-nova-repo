<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterDescripcionToImagenesUnidadesInterioresOnsiteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('imagenes_unidades_interiores_onsite', function (Blueprint $table) {
            $table->binary('archivo')->nullable()->change();
            $table->string('descripcion')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('imagenes_unidades_interiores_onsite', function (Blueprint $table) {
            $table->binary('archivo')->change();
            $table->string('descripcion')->change();
        });
    }
}
