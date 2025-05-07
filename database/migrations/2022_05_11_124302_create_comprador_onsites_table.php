<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompradorOnsitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('compradores_onsite', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->foreignId('company_id')->default(2);
            $table->string('nombre')->nullable();
            $table->string('primer_nombre');
            $table->string('apellido');
            $table->integer('dni');
            $table->string('pais')->nullable();
            $table->foreignId('provincia_onsite_id')->default(1);
            $table->foreignId('localidad_onsite_id')->default(1);
            $table->string('localidad_texto')->nullable();

            $table->string('domicilio')->nullable();
            $table->string('codigo_postal')->nullable();
            $table->string('email')->nullable();
            $table->string('telefono')->nullable();
            $table->string('celular')->nullable();
            $table->text('observaciones')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('compradores_onsite');
    }
}
