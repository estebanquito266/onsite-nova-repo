<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateReparacionesOnsiteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reparaciones_onsite', function (Blueprint $table) {
            $table->unsignedInteger('id', true);
            $table->unsignedBigInteger('company_id')->default(1);
            $table->string('clave');
            $table->string('id_terminal');
            $table->string('tarea')->nullable();
            $table->text('tarea_detalle');
            $table->unsignedInteger('id_tipo_servicio');
            $table->unsignedInteger('id_estado');
            $table->dateTime('fecha_ingreso')->nullable();
            $table->string('observacion_ubicacion')->nullable();
            $table->string('nro_caja')->nullable();
            $table->string('informe_tecnico')->nullable();
            $table->boolean('transacciones_pendientes')->nullable();
            $table->boolean('impresora_termica_scanner')->nullable();
            $table->boolean('usuario_agentes')->nullable();
            $table->string('usuario_agentes_red_local')->nullable();
            $table->boolean('configuracion_impresora')->nullable();
            $table->boolean('usuarios_sf2')->nullable();
            $table->boolean('configuracion_pc_servidora')->nullable();
            $table->boolean('conectividad_sf2_wut_dns_vnc')->nullable();
            $table->boolean('carpeta_sf2_permisos')->nullable();
            $table->boolean('tension_electrica')->nullable();
            $table->string('tipo_conexion_local')->nullable();
            $table->string('tipo_conexion_proveedor')->nullable();
            $table->boolean('cableado')->nullable();
            $table->double('cableado_cantidad_metros', 8, 2)->nullable();
            $table->integer('cableado_cantidad_fichas')->nullable();
            $table->boolean('instalacion_cartel')->nullable();
            $table->boolean('instalacion_cartel_luz')->nullable();
            $table->boolean('insumos_banner')->nullable();
            $table->boolean('insumos_folleteria')->nullable();
            $table->boolean('insumos_rojos_impresora')->nullable();
            $table->boolean('fotos_frente_local')->nullable();
            $table->boolean('fotos_modem_enlace_switch')->nullable();
            $table->boolean('fotos_terminal_red')->nullable();
            $table->string('modem_3g_4g_sim_nuevo')->nullable();
            $table->string('modem_3g_4g_sim_retirado')->nullable();
            $table->string('firma_cliente')->nullable();
            $table->string('aclaracion_cliente')->nullable();
            $table->string('firma_tecnico')->nullable();
            $table->string('aclaracion_tecnico')->nullable();
            $table->timestamps();
            $table->string('codigo_activo_nuevo1')->nullable();
            $table->string('codigo_activo_retirado1')->nullable();
            $table->string('codigo_activo_descripcion1')->nullable();
            $table->string('codigo_activo_nuevo2')->nullable();
            $table->string('codigo_activo_retirado2')->nullable();
            $table->string('codigo_activo_descripcion2')->nullable();
            $table->string('codigo_activo_nuevo3')->nullable();
            $table->string('codigo_activo_retirado3')->nullable();
            $table->string('codigo_activo_descripcion3')->nullable();
            $table->string('codigo_activo_nuevo4')->nullable();
            $table->string('codigo_activo_retirado4')->nullable();
            $table->string('codigo_activo_descripcion4')->nullable();
            $table->string('codigo_activo_nuevo5')->nullable();
            $table->string('codigo_activo_retirado5')->nullable();
            $table->string('codigo_activo_descripcion5')->nullable();
            $table->string('codigo_activo_nuevo6')->nullable();
            $table->string('codigo_activo_retirado6')->nullable();
            $table->string('codigo_activo_descripcion6')->nullable();
            $table->string('codigo_activo_nuevo7')->nullable();
            $table->string('codigo_activo_retirado7')->nullable();
            $table->string('codigo_activo_descripcion7')->nullable();
            $table->string('codigo_activo_nuevo8')->nullable();
            $table->string('codigo_activo_retirado8')->nullable();
            $table->string('codigo_activo_descripcion8')->nullable();
            $table->string('codigo_activo_nuevo9')->nullable();
            $table->string('codigo_activo_retirado9')->nullable();
            $table->string('codigo_activo_descripcion9')->nullable();
            $table->string('codigo_activo_nuevo10')->nullable();
            $table->string('codigo_activo_retirado10')->nullable();
            $table->string('codigo_activo_descripcion10')->nullable();
            $table->unsignedInteger('id_tecnico_asignado');
            $table->boolean('liquidado_proveedor')->nullable();
            $table->date('fecha_coordinada')->nullable();
            $table->unsignedInteger('id_empresa_onsite')->default(1);
            $table->boolean('instalacion_buzon')->nullable();
            $table->string('cantidad_horas_trabajo')->nullable();
            $table->boolean('requiere_nueva_visita')->nullable();
            $table->double('monto', 8, 2)->nullable();
            $table->double('monto_extra', 8, 2)->nullable();
            $table->string('nro_factura_proveedor')->nullable();
            $table->dateTime('fecha_vencimiento')->nullable();
            $table->dateTime('fecha_cerrado')->nullable();
            $table->char('sla_status', 3)->nullable();
            $table->boolean('sla_justificado')->nullable();
            $table->boolean('visible_cliente')->default(0);
            $table->boolean('chequeado_cliente')->default(0);
            $table->unsignedInteger('sucursal_onsite_id')->default(1);
            $table->integer('prioridad')->nullable();
            $table->string('doc_link1')->nullable();
            $table->string('doc_link2')->nullable();
            $table->string('doc_link3')->nullable();
            $table->boolean('problema_resuelto')->nullable();
            $table->unsignedInteger('usuario_id')->default(399);
            $table->string('nota_cliente')->nullable();
            $table->unsignedBigInteger('sistema_onsite_id')->nullable();
            $table->text('observaciones_internas')->nullable();
            $table->unsignedInteger('reparacion_onsite_puesta_marcha_id')->nullable();

            $table->foreign('company_id')->references('id')->on('companies');
            $table->foreign('id_estado')->references('id')->on('estados_onsite');
            $table->foreign('id_tecnico_asignado')->references('id')->on('users');
            $table->foreign('id_terminal')->references('nro')->on('terminales_onsite');
            $table->foreign('id_tipo_servicio')->references('id')->on('tipos_servicios_onsite');
            $table->foreign('sucursal_onsite_id')->references('id')->on('sucursales_onsite');
            $table->foreign('usuario_id')->references('id')->on('users');
        });

        // DB::statement("ALTER TABLE reparaciones_onsite AUTO_INCREMENT = 33490");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reparaciones_onsite');
    }
}
