<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDatosFacturaToSistemasOnsiteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sistemas_onsite', function (Blueprint $table) {
            $table->date('fecha_compra')->after('nombre')->nullable();
            $table->string('numero_factura')->after('fecha_compra')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sistemas_onsite', function (Blueprint $table) {
            $table->dropColumn('fecha_compra');
            $table->dropColumn('numero_factura');
        });
    }
}
