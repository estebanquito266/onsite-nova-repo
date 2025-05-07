<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrecioPiezaRepuestosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('precios_piezas_repuestos', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->foreignId('company_id');
            $table->foreignId('piezas_respuestos_onsite_id');
            $table->string('spare_parts_code');
            $table->float('precio_fob');
            $table->integer('version');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('precios_piezas_repuestos');
    }
}
