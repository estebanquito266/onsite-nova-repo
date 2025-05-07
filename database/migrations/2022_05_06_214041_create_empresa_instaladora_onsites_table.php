<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpresaInstaladoraOnsitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empresas_instaladoras_onsite', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->foreignId('company_id');
            $table->string('nombre');
            $table->string('primer_nombre')->nullable();
            $table->string('apellido')->nullable();
            $table->string('razon_social')->nullable();
            $table->string('cuit')->nullable();
            $table->string('tipo_iva')->nullable();
            $table->string('pais');
            $table->foreignId('provincia_onsite_id');
            $table->foreignId('localidad_onsite_id');
            $table->string('codigo_postal')->nullable();
            $table->string('email');
            $table->string('celular');
            $table->string('telefono')->nullable();
            $table->string('web')->nullable();
            $table->string('coordenadas')->nullable();
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
        Schema::dropIfExists('empresas_instaladoras_onsite');
    }
}
