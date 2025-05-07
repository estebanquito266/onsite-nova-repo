<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use App\Models\Onsite\ReparacionDetalle;
use App\Models\Onsite\ReparacionOnsite;

class CreateReparacionesDetalleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement('ALTER TABLE reparaciones_onsite ENGINE = InnoDB');
        Schema::create('reparaciones_detalle', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->id();
            $table->integer('reparacion_id')->unsigned();
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
            $table->timestamps();
            $table->foreign('reparacion_id')->references('id')->on('reparaciones_onsite');
        });

        // Copiamos los registros de reparaciones_onsite a reparaciones_detalle
        $reparacionesOnsite = ReparacionOnsite::all();

        foreach ($reparacionesOnsite as $reparacionOnsite) {
            $reparacionDetalle = ReparacionDetalle::firstOrNew(['reparacion_id' => $reparacionOnsite->id]);
            $reparacionDetalle->reparacion_id = $reparacionOnsite->id;
            $reparacionDetalle->transacciones_pendientes = $reparacionOnsite->transacciones_pendientes;
            $reparacionDetalle->impresora_termica_scanner = $reparacionOnsite->impresora_termica_scanner;
            $reparacionDetalle->usuario_agentes = $reparacionOnsite->usuario_agentes;
            $reparacionDetalle->usuario_agentes_red_local = $reparacionOnsite->usuario_agentes_red_local;
            $reparacionDetalle->configuracion_impresora = $reparacionOnsite->configuracion_impresora;
            $reparacionDetalle->usuarios_sf2 = $reparacionOnsite->usuarios_sf2;
            $reparacionDetalle->configuracion_pc_servidora = $reparacionOnsite->configuracion_pc_servidora;
            $reparacionDetalle->conectividad_sf2_wut_dns_vnc = $reparacionOnsite->conectividad_sf2_wut_dns_vnc;
            $reparacionDetalle->carpeta_sf2_permisos = $reparacionOnsite->carpeta_sf2_permisos;
            $reparacionDetalle->tension_electrica = $reparacionOnsite->tension_electrica;
            $reparacionDetalle->tipo_conexion_local = $reparacionOnsite->tipo_conexion_local;
            $reparacionDetalle->tipo_conexion_proveedor = $reparacionOnsite->tipo_conexion_proveedor;
            $reparacionDetalle->cableado = $reparacionOnsite->cableado;
            $reparacionDetalle->cableado_cantidad_metros = $reparacionOnsite->cableado_cantidad_metros;
            $reparacionDetalle->cableado_cantidad_fichas = $reparacionOnsite->cableado_cantidad_fichas;
            $reparacionDetalle->instalacion_cartel = $reparacionOnsite->instalacion_cartel;
            $reparacionDetalle->instalacion_cartel_luz = $reparacionOnsite->instalacion_cartel_luz;
            $reparacionDetalle->insumos_banner = $reparacionOnsite->insumos_banner;
            $reparacionDetalle->insumos_folleteria = $reparacionOnsite->insumos_folleteria;
            $reparacionDetalle->insumos_rojos_impresora = $reparacionOnsite->insumos_rojos_impresora;
            $reparacionDetalle->fotos_frente_local = $reparacionOnsite->fotos_frente_local;
            $reparacionDetalle->fotos_modem_enlace_switch = $reparacionOnsite->fotos_modem_enlace_switch;
            $reparacionDetalle->fotos_terminal_red = $reparacionOnsite->fotos_terminal_red;
            $reparacionDetalle->modem_3g_4g_sim_nuevo = $reparacionOnsite->modem_3g_4g_sim_nuevo;
            $reparacionDetalle->modem_3g_4g_sim_retirado = $reparacionOnsite->modem_3g_4g_sim_retirado;
            $reparacionDetalle->codigo_activo_nuevo1 = $reparacionOnsite->codigo_activo_nuevo1;
            $reparacionDetalle->codigo_activo_retirado1 = $reparacionOnsite->codigo_activo_retirado1;
            $reparacionDetalle->codigo_activo_descripcion1 = $reparacionOnsite->codigo_activo_descripcion1;
            $reparacionDetalle->codigo_activo_nuevo2 = $reparacionOnsite->codigo_activo_nuevo2;
            $reparacionDetalle->codigo_activo_retirado2 = $reparacionOnsite->codigo_activo_retirado2;
            $reparacionDetalle->codigo_activo_descripcion2 = $reparacionOnsite->codigo_activo_descripcion2;
            $reparacionDetalle->codigo_activo_nuevo3 = $reparacionOnsite->codigo_activo_nuevo3;
            $reparacionDetalle->codigo_activo_retirado3 = $reparacionOnsite->codigo_activo_retirado3;
            $reparacionDetalle->codigo_activo_descripcion3 = $reparacionOnsite->codigo_activo_descripcion3;
            $reparacionDetalle->codigo_activo_nuevo4 = $reparacionOnsite->codigo_activo_nuevo4;
            $reparacionDetalle->codigo_activo_retirado4 = $reparacionOnsite->codigo_activo_retirado4;
            $reparacionDetalle->codigo_activo_descripcion4 = $reparacionOnsite->codigo_activo_descripcion4;
            $reparacionDetalle->codigo_activo_nuevo5 = $reparacionOnsite->codigo_activo_nuevo5;
            $reparacionDetalle->codigo_activo_retirado5 = $reparacionOnsite->codigo_activo_retirado5;
            $reparacionDetalle->codigo_activo_descripcion5 = $reparacionOnsite->codigo_activo_descripcion5;
            $reparacionDetalle->codigo_activo_nuevo6 = $reparacionOnsite->codigo_activo_nuevo6;
            $reparacionDetalle->codigo_activo_retirado6 = $reparacionOnsite->codigo_activo_retirado6;
            $reparacionDetalle->codigo_activo_descripcion6 = $reparacionOnsite->codigo_activo_descripcion6;
            $reparacionDetalle->codigo_activo_nuevo7 = $reparacionOnsite->codigo_activo_nuevo7;
            $reparacionDetalle->codigo_activo_retirado7 = $reparacionOnsite->codigo_activo_retirado7;
            $reparacionDetalle->codigo_activo_descripcion7 = $reparacionOnsite->codigo_activo_descripcion7;
            $reparacionDetalle->codigo_activo_nuevo8 = $reparacionOnsite->codigo_activo_nuevo8;
            $reparacionDetalle->codigo_activo_retirado8 = $reparacionOnsite->codigo_activo_retirado8;
            $reparacionDetalle->codigo_activo_descripcion8 = $reparacionOnsite->codigo_activo_descripcion8;
            $reparacionDetalle->codigo_activo_nuevo9 = $reparacionOnsite->codigo_activo_nuevo9;
            $reparacionDetalle->codigo_activo_retirado9 = $reparacionOnsite->codigo_activo_retirado9;
            $reparacionDetalle->codigo_activo_descripcion9 = $reparacionOnsite->codigo_activo_descripcion9;
            $reparacionDetalle->codigo_activo_nuevo10 = $reparacionOnsite->codigo_activo_nuevo10;
            $reparacionDetalle->codigo_activo_retirado10 = $reparacionOnsite->codigo_activo_retirado10;
            $reparacionDetalle->codigo_activo_descripcion10 = $reparacionOnsite->codigo_activo_descripcion10;
            $reparacionDetalle->save();
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reparaciones_detalle');
    }
}
