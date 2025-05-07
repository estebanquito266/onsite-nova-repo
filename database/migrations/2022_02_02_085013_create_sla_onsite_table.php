<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSlaOnsiteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sla_onsite', function (Blueprint $table) {
            $table->string('codigo')->primary();
            $table->unsignedBigInteger('company_id')->default(1);
            $table->unsignedInteger('id_tipo_servicio');
            $table->unsignedInteger('id_nivel');
            $table->double('horas', 8, 2);
            $table->timestamps();

            $table->foreign('company_id')->references('id')->on('companies');
            $table->foreign('id_tipo_servicio')->references('id')->on('tipos_servicios_onsite');
            $table->foreign('id_nivel')->references('id')->on('niveles_onsite');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sla_onsite');
    }
}
