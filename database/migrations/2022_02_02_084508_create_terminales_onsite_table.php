<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTerminalesOnsiteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('terminales_onsite', function (Blueprint $table) {
            $table->string('nro')->primary();
            $table->unsignedBigInteger('company_id')->default(1);
            $table->timestamps();
            $table->unsignedInteger('sucursal_onsite_id')->default(1);
            $table->boolean('all_terminales_sucursal')->default(0);
            $table->text('marca');
            $table->text('modelo');
            $table->text('serie');
            $table->text('rotulo');
            $table->text('observaciones')->nullable();
            $table->unsignedInteger('empresa_onsite_id')->default(1);

            $table->foreign('company_id')->references('id')->on('companies');
            $table->foreign('sucursal_onsite_id')->references('id')->on('sucursales_onsite');
            $table->foreign('empresa_onsite_id')->references('id')->on('empresas_onsite');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('terminales_onsite');
    }
}
