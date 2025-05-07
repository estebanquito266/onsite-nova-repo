<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->unsignedInteger('derivacion_falla_grupo_equipo_default_id')->nullable()->constrained('fallas_grupos_equipos');
            $table->unsignedInteger('operador_default_id')->nullable()->constrained('operadores');
            $table->unsignedInteger('color_default_id')->nullable()->constrained('colores');
            $table->unsignedInteger('modelo_default_id')->nullable()->constrained('modelos');
            $table->unsignedInteger('tipo_equipo_default_id')->nullable()->constrained('tipos_equipos');
            $table->unsignedInteger('marca_default_id')->nullable()->constrained('marcas');
            $table->string('retiro_costos_envios')->nullable();
            $table->unsignedBigInteger('derivacion_motivo_interes_default_id')->nullable()->constrained('motivos_interes_derivaciones');
            $table->unsignedBigInteger('derivacion_motivo_cancelacion_default_id')->nullable()->constrained('motivos_cancelacion_derivacion');
            $table->unsignedInteger('derivacion_descuento_default_id')->nullable()->constrained('descuentos');
            $table->unsignedInteger('reparacion_taller_externo_default_id')->nullable()->constrained('talleres_externos');
            $table->unsignedInteger('reparacion_proveedor_default_id')->nullable()->constrained('proveedores');
            $table->unsignedInteger('reparacion_falla_default_id')->nullable()->constrained('fallas');
            $table->unsignedInteger('derivacion_sucursal_default_id')->nullable()->constrained('sucursales');
            $table->unsignedInteger('derivacion_estado_default_id')->nullable()->constrained('estados_derivaciones');
            $table->unsignedInteger('derivacion_servicio_default_id')->nullable()->constrained('servicios');
            $table->unsignedInteger('derivacion_user_default_id')->nullable()->constrained('users');
            $table->unsignedInteger('derivacion_grupo_equipo_smartphone_default_id')->nullable()->constrained('grupos_equipos');
            $table->string('logo')->default('default.png');
            $table->timestamps();

            // $table->foreign('derivacion_falla_grupo_equipo_default_id')->references('id')->on('fallas_grupos_equipos');
            // $table->foreign('operador_default_id')->references('id')->on('operadores');
            // $table->foreign('color_default_id')->references('id')->on('colores');
            // $table->foreign('modelo_default_id')->references('id')->on('modelos');
            // $table->foreign('tipo_equipo_default_id')->references('id')->on('tipos_equipos');
            // $table->foreign('marca_default_id')->references('id')->on('marcas');
        });

        // DB::statement("ALTER TABLE companies AUTO_INCREMENT = 8");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('companies');
    }
}
