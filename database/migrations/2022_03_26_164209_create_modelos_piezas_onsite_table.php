<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModelosPiezasOnsiteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('modelos_piezas_onsite', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->timestamp('deleted_at')->nullable();
            $table->unsignedBigInteger('company_id')->default(1);

            $table->unsignedBigInteger('modelo_respuestos_id')->constrained('modelos_respuestos_onsite');
            $table->unsignedBigInteger('pieza_respuestos_id')->constrained('piezas_respuestos_onsite');

            $table->string('numero')->nullable();


            $table->foreign('company_id')->references('id')->on('companies');
            /* $table->foreign('modelo_respuestos_id')->references('id')->on('modelos_respuestos_onsite');
            $table->foreign('pieza_respuestos_id')->references('id')->on('piezas_respuestos_onsite'); */


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('modelos_piezas_onsite');
    }
}
