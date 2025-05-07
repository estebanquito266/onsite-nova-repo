<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetalleOrdenPedidoRespuestosOnsitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalles_respuestos_onsite', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->unsignedBigInteger('company_id')->default(1)->constrained('companies');

            $table->unsignedBigInteger('orden_respuestos_id')->constrained('ordenes_pedido_respuestos_onsite');            
            /* $table->unsignedBigInteger('categoria_respuestos_id')->constrained('categorias_respuestos_onsite');
            $table->unsignedBigInteger('modelo_respuestos_id')->constrained('modelos_respuestos_onsite'); */
            $table->unsignedBigInteger('pieza_respuestos_id')->constrained('piezas_respuestos_onsite');

            $table->integer('cantidad');
            $table->float('precio_fob');
            $table->float('precio_total');           
            $table->float('precio_neto');           

            $table->foreign('company_id')->references('id')->on('companies');
            
            $table->foreign('orden_respuestos_id')->references('id')->on('ordenes_pedido_respuestos_onsite');
            /* $table->foreign('categoria_respuestos_id')->references('id')->on('categorias_respuestos_onsite');
            $table->foreign('modelo_respuestos_id')->references('id')->on('modelos_respuestos_onsite'); */
            $table->foreign('pieza_respuestos_id')->references('id')->on('piezas_respuestos_onsite');

            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detalles_respuestos_onsite');
    }
}
