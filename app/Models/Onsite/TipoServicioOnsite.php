<?php

namespace App\Models\Onsite;

// use App\Models\Traits\HasSorts;
use Illuminate\Database\Eloquent\Model;
use DB;

class TipoServicioOnsite extends Model
{
	// use HasSorts;

	const SEGUIMIENTO_OBRA = 50;
	const PUESTA_MARCHA = 60;

	public $campos_permitidos_para_ordenar = [
		'id',
		'nombre',
		'created_at',
		'updated_at'
	];

	protected $table = "tipos_servicios_onsite";

	protected $fillable = ['nombre', 'company_id'];

	// RELACIONES
	// BELONGS TO
	public function company()
	{
		return $this->belongsTo('App\Models\Admin\Company');
	}

	// HAS MANY
	public function reparaciones_onsite()
	{
		return $this->hasMany('App\Models\Onsite\ReparacionOnsite', 'id_tipo_servicio');
	}

	public function slas_onsites()
	{
		return $this->hasMany('App\Models\Onsite\SlaOnsite', 'id_tipo_servicio');
	}

	public function solicitudes_onsite()
	{
		return $this->hasMany('App\Models\Onsite\TipoServicioOnsite', 'tipo_servicio_onsite_id');
	}
	
	public function empresa_onsite()
	{
		return $this->belongsToMany('App\Models\Onsite\EmpresaOnsite', 'empresas_onsite_tipos_servicios_onsite', 'empresa_onsite_id', 'tipo_servicio_onsite_id')->withPivot('id');
	}
}
