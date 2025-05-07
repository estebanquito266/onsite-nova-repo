<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropDatosFacturasFromGarantiasOnsiteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('garantias_onsite', function (Blueprint $table) {
            
            $table->dropForeign('garantias_onsite_comprador_onsite_id_foreign');
            $table->dropColumn('comprador_onsite_id');
            $table->dropColumn('fecha_compra');
            $table->dropColumn('numero_factura');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('compradores_onsite', function (Blueprint $table) {
            //
        });
    }
}
