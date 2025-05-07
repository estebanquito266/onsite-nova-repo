<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdenPedidoRespuestosOnsitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ordenes_pedido_respuestos_onsite', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->unsignedBigInteger('company_id')->default(1)->constrained('companies');
            $table->unsignedBigInteger('user_id')->constrained('users');
            $table->unsignedBigInteger('empresa_onsite_id')->constrained('empresas_onsite');
            $table->unsignedBigInteger('estado_id')->constrained('estados_ordenes_pedido_respuestos_onsite');

            $table->float('monto_dolar')->default(0);
            $table->float('monto_euro')->default(0);
            $table->float('monto_peso')->default(0);

            $table->string('nombre_solicitante');
            $table->string('email_solicitante');
            $table->text('comentarios')->nullable();
            
        

            $table->foreign('company_id')->references('id')->on('companies');
            //$table->foreign('empresa_onsite_id')->references('id')->on('empresas_onsite');
            //$table->foreign('user_id')->references('id')->on('users');
            $table->foreign('estado_id')->references('id')->on('estados_ordenes_pedido_respuestos_onsite');
         
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ordenes_pedido_respuestos_onsite');
    }
}
