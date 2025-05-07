<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUnidadesInterioresOnsiteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('unidades_interiores_onsite', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('company_id');
            $table->unsignedInteger('empresa_onsite_id');
            $table->unsignedInteger('sucursal_onsite_id');
            $table->unsignedBigInteger('sistema_onsite_id')->default(1);
            $table->string('clave');
            $table->string('modelo')->nullable();
            $table->string('direccion')->nullable();
            $table->string('serie')->nullable();
            $table->string('observaciones')->nullable();
            $table->timestamps();

            $table->foreign('company_id')->references('id')->on('companies');
            $table->foreign('empresa_onsite_id')->references('id')->on('empresas_onsite');
            $table->foreign('sucursal_onsite_id')->references('id')->on('sucursales_onsite');
            $table->foreign('sistema_onsite_id')->references('id')->on('sistemas_onsite');
        });

        // DB::statement("ALTER TABLE unidades_interiores_onsite AUTO_INCREMENT = 5");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('unidades_interiores_onsite');
    }
}
