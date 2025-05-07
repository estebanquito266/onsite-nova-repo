<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTemplateComprobantesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('templates_comprobantes', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->foreignId('company_id');

            $table->string('tipo_comprobante');

            $table->string('nombre');

			$table->text('cuerpo');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('templates_comprobantes');
    }
}
