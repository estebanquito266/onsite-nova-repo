<?php

namespace App\Models\Onsite;

use App\Models\Admin\User;
use App\Models\EmpresaInstaladora\EmpresaInstaladoraOnsite;
use Illuminate\Database\Eloquent\Model;

class SolicitudOnsite extends Model
{
	protected $table = "solicitudes_onsite";

	protected $fillable = [
		'company_id',
		'empresa_onsite_id',
		'sucursal_onsite_id',
		'terminal_onsite_id',
		'tipo_servicio_onsite_id',
		'obra_onsite_id',
		'estado_solicitud_onsite_id',
		'detalle',
		'solicitante_nombre',
		'solicitante_dni',
		'solicitante_telefono',
		'urgencia',
		'terminos_condiciones',
		'observaciones_internas',
		'nota_cliente',
		'comentarios',
		'empresa_instaladora_id',
		'user_id',
		'sistema_onsite_id',
		'solicitud_tipo_id'
	];

    public function sistema_onsite()
    {
        return $this->belongsTo('App\Models\Onsite\SistemaOnsite', 'sistema_onsite_id');
    }

	public function empresa_onsite()
	{
		return $this->belongsTo('App\Models\Onsite\EmpresaOnsite', 'empresa_onsite_id');
	}

	public function sucursal_onsite()
	{
		return $this->belongsTo('App\Models\Onsite\SucursalOnsite', 'sucursal_onsite_id');
	}

	public function terminal_onsite()
	{
		return $this->belongsTo('App\Models\Onsite\TerminalOnsite', 'terminal_onsite_id');
	}

	public function tipo_servicio_onsite()
	{
		return $this->belongsTo('App\Models\Onsite\TipoServicioOnsite', 'tipo_servicio_onsite_id');
	}

	public function obra_onsite()
	{
		return $this->belongsTo('App\Models\Onsite\ObraOnsite', 'obra_onsite_id');
	}

	public function estado_solicitud_onsite()
	{
		return $this->belongsTo('App\Models\Onsite\EstadoSolicitudOnsite', 'estado_solicitud_onsite_id');
	}

	public function empresa_instaladora()
	{
		return $this->belongsTo(EmpresaInstaladoraOnsite::class, 'empresa_instaladora_id');
	}

	public function user()
	{
		return $this->belongsTo(User::class, 'user_id');
	}
}
