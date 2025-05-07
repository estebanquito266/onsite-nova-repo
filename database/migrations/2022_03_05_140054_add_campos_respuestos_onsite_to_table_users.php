<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCamposRespuestosOnsiteToTableUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('numero_cuenta_respuestos_onsite')->nullable()->after('foto_perfil');
            $table->float('descuento_respuestos_onsite')->nullable()->after('numero_cuenta_respuestos_onsite');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {

            $table->dropIfExists('numero_cuenta_respuestos_onsite');
            $table->dropIfExists('descuento_respuestos_onsite');

        });
    }
}
