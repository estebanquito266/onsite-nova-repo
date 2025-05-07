<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateReparacionChecklistOnsiteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reparacion_checklist_onsite', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('company_id')->default(1);
            $table->unsignedInteger('reparacion_onsite_id')->default(1);
            $table->boolean('alimentacion_definitiva')->default(0);
            $table->boolean('unidades_tension_definitiva')->default(0);
            $table->boolean('cable_alimentacion_comunicacion_seccion_ok')->default(0);
            $table->boolean('minimo_conexiones_frigorificas_exteriores')->default(0);
            $table->boolean('sistema_presurizado_41_5_kg')->default(0);
            $table->integer('sistema_presurizado_41_5_kg_tiempo_horas')->default(0);
            $table->boolean('operacion_vacio')->default(0);
            $table->boolean('unidad_exterior_tension_12_horas')->default(0);
            $table->boolean('llave_servicio_odu_abiertos')->default(0);
            $table->boolean('carga_adicional_introducida')->default(0);
            $table->double('carga_adicional_introducida_kg_final', 8, 2)->default(0.00);
            $table->double('carga_adicional_introducida_kg_adicional', 8, 2)->default(0.00);
            $table->boolean('sistema_funcionando_15_min_carga_adicional')->default(0);
            $table->boolean('puesta_marcha_satisfactoria')->default(0);
            $table->timestamps();

            $table->foreign('company_id')->references('id')->on('companies');
            $table->foreign('reparacion_onsite_id')->references('id')->on('reparaciones_onsite');
        });

        // DB::statement("ALTER TABLE reparacion_checklist_onsite AUTO_INCREMENT = 52");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reparacion_checklist_onsite');
    }
}
