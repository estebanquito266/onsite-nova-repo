<?php

namespace App\Models\Onsite;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Riparazione\Models\Onsite\EstadoOnsite;

class ReparacionOnsite extends Model
{
	protected $table = "reparaciones_onsite";

	protected $fillable = [
		'clave',
		'company_id',
		'id_empresa_onsite',
		'sucursal_onsite_id',
		'id_terminal',
		'tarea',
		'tarea_detalle',
		'id_tipo_servicio',
		'id_estado',
		'fecha_ingreso',
		'observacion_ubicacion',
		'nro_caja',
		'informe_tecnico',
		'prioridad',
		'transacciones_pendientes',
		'impresora_termica_scanner',
		'usuario_agentes',
		'usuario_agentes_red_local',
		'configuracion_impresora',
		'usuarios_sf2',
		'configuracion_pc_servidora',
		'conectividad_sf2_wut_dns_vnc',
		'carpeta_sf2_permisos',
		'tension_electrica',
		'tipo_conexion_local',
		'tipo_conexion_proveedor',
		'cableado',
		'cableado_cantidad_metros',
		'cableado_cantidad_fichas',
		'instalacion_cartel',
		'instalacion_cartel_luz',
		'insumos_banner',
		'insumos_folleteria',
		'insumos_rojos_impresora',
		'fotos_frente_local',
		'fotos_modem_enlace_switch',
		'fotos_terminal_red',
		'instalacion_buzon',
		'cantidad_horas_trabajo',
		'requiere_nueva_visita',
		'codigo_activo_nuevo1',
		'codigo_activo_retirado1',
		'codigo_activo_descripcion1',
		'codigo_activo_nuevo2',
		'codigo_activo_retirado2',
		'codigo_activo_descripcion2',
		'codigo_activo_nuevo3',
		'codigo_activo_retirado3',
		'codigo_activo_descripcion3',
		'codigo_activo_nuevo4',
		'codigo_activo_retirado4',
		'codigo_activo_descripcion4',
		'codigo_activo_nuevo5',
		'codigo_activo_retirado5',
		'codigo_activo_descripcion5',
		'codigo_activo_nuevo6',
		'codigo_activo_retirado6',
		'codigo_activo_descripcion6',
		'codigo_activo_nuevo7',
		'codigo_activo_retirado7',
		'codigo_activo_descripcion7',
		'codigo_activo_nuevo8',
		'codigo_activo_retirado8',
		'codigo_activo_descripcion8',
		'codigo_activo_nuevo9',
		'codigo_activo_retirado9',
		'codigo_activo_descripcion9',
		'codigo_activo_nuevo10',
		'codigo_activo_retirado10',
		'codigo_activo_descripcion10',
		'modem_3g_4g_sim_nuevo',
		'modem_3g_4g_sim_retirado',
		'firma_cliente',
		'aclaracion_cliente',
		'firma_tecnico',
		'aclaracion_tecnico',
		'id_tecnico_asignado',
		'fecha_coordinada',
		'fecha_registracion_coordinacion',
		'fecha_notificado',
		'tiempo_coordinacion',
		'tiempo_cierre',
		'fecha_vencimiento',
		'fecha_cerrado',
		'sla_status',
		'sla_justificado',
		'monto',
		'monto_extra',
		'liquidado_proveedor',
		'nro_factura_proveedor',
		'visible_cliente',
		'chequeado_cliente',
		'doc_link1',
		'doc_link2',
		'doc_link3',
		'problema_resuelto',
		'usuario_id',
		'sistema_onsite_id',
		'nota_cliente',
		'observaciones_internas',
		'reparacion_onsite_puesta_marcha_id',
		'solicitud_tipo_id',
	];

	protected $dates = [
		'fecha_registracion_coordinacion',
		'fecha_notificado',
	];

	// RELACIONS
	public function empresa_onsite()
	{
		return $this->belongsTo('App\Models\Onsite\EmpresaOnsite', 'id_empresa_onsite');
	}

	public function estado_onsite()
	{
		return $this->belongsTo('App\Models\Onsite\EstadoOnsite', 'id_estado');
	}

	public function terminal_onsite()
	{
		return $this->belongsTo('App\Models\Onsite\TerminalOnsite', 'id_terminal');
	}

	public function tipo_servicio_onsite()
	{
		return $this->belongsTo('App\Models\Onsite\TipoServicioOnsite', 'id_tipo_servicio');
	}

	public function sucursal_onsite()
	{
		return $this->belongsTo('App\Models\Onsite\SucursalOnsite', 'sucursal_onsite_id');
	}

	public function sistema_onsite()
	{
		return $this->belongsTo('App\Models\Onsite\SistemaOnsite', 'sistema_onsite_id');
	}

	public function reparacion_detalle()
	{
		return $this->hasMany('App\Models\Onsite\ReparacionDetalle', 'reparacion_id');
	}

	public function historial_estados_onsite()
	{
		return $this->hasMany('App\Models\Onsite\HistorialEstadoOnsite', 'id_reparacion');
	}

	public function usuarios_que_confirmaron()
	{
		return $this->belongsToMany('App\Models\User', 'reparaciones_onsite_confirmadas_por_users', 'user_id', 'reparacion_onsite_id');
	}

  	public function reparacion_checklist_onsite()
  	{
    	return $this->hasMany('App\Models\Onsite\ReparacionChecklistOnsite', 'reparacion_onsite_id');
  	}
}
