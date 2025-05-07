<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateSucursalesOnsiteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sucursales_onsite', function (Blueprint $table) {
            $table->unsignedInteger('id', true);
            $table->unsignedBigInteger('company_id')->default(1)->constrained('companies');
            $table->string('codigo_sucursal');
            $table->string('razon_social');
            $table->unsignedInteger('empresa_onsite_id')->default(1)->constrained('empresas_onsite');
            $table->unsignedInteger('localidad_onsite_id')->default(1)->constrained('localidades_onsite');
            $table->string('direccion')->nullable();
            $table->string('telefono_contacto')->nullable();
            $table->string('nombre_contacto')->default('.');
            $table->string('horarios_atencion')->nullable();
            $table->string('observaciones')->nullable();
            $table->timestamps();

            $table->foreign('company_id')->references('id')->on('companies');
            $table->foreign('empresa_onsite_id')->references('id')->on('empresas_onsite');
        });

        // DB::statement("ALTER TABLE sucursales_onsite AUTO_INCREMENT = 19066");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sucursales_onsite');
    }
}
