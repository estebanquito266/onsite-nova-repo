<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePiezasRespuestosOnsitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('piezas_respuestos_onsite', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            
            $table->unsignedBigInteger('company_id')->default(1)->constrained('companies');
            //$table->unsignedBigInteger('categoria_respuestos_onsite_id')->constrained('categorias_respuestos_onsite');
            //$table->unsignedBigInteger('modelo_respuestos_onsite_id')->constrained('modelos_respuestos_onsite');

            $table->string('numero');
            $table->string('spare_parts_code');
            $table->string('part_name');
            $table->string('stock')->nullable();
            $table->string('moneda')->default('dolar');
            $table->float('precio_fob');
            $table->text('description')->nullable();
            $table->string('part_image')->nullable();
            $table->string('peso')->nullable();
            $table->string('dimensiones')->nullable();
            $table->string('pia')->nullable();

            $table->foreign('company_id')->references('id')->on('companies');
            //$table->foreign('categoria_respuestos_onsite_id')->references('id')->on('categorias_respuestos_onsite');
            //$table->foreign('modelo_respuestos_onsite_id')->references('id')->on('modelos_respuestos_onsite');
  

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('piezas_respuestos_onsite');
    }
}
