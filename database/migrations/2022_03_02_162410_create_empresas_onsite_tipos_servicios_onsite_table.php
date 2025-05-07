<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpresasOnsiteTiposServiciosOnsiteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empresas_onsite_tipos_servicios_onsite', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id')->default(1)->constrained('companies');
            $table->unsignedInteger('empresa_onsite_id')->constrained('empresas_onsite');
            $table->unsignedInteger('tipo_servicio_onsite_id')->constrained('tipos_servicion_onsite');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('empresas_onsite_tipos_servicios_onsite');
    }
}
