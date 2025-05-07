<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImagenesModelosRepuestosOnsite extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('imagenes_modelos_repuestos', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('company_id')->default(1);
            $table->unsignedBigInteger('modelo_respuestos_id')->constrained('modelos_respuestos_onsite');
            $table->string('imagen_despiece');
            $table->foreign('modelo_respuestos_id')->references('id')->on('modelos_respuestos_onsite');
            $table->foreign('company_id')->references('id')->on('companies');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('imagenes_modelos_repuestos_onsite');
    }
}
