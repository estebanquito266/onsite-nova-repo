<?php

namespace App\Models\Onsite;

// use App\Models\Traits\HasSorts;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class SucursalOnsite extends Model
{
	// use HasSorts;

	public $campos_permitidos_para_ordenar = [
		'id',
		'codigo_sucursal',
		'empresa_onsite_id',
		'razon_social',
		'created_at',
		'updated_at'
	];

	protected $table = "sucursales_onsite";

	protected $fillable = [
		'company_id', 'codigo_sucursal', 'empresa_onsite_id', 'razon_social', 'localidad_onsite_id',
		'direccion', 'telefono_contacto', 'nombre_contacto', 'horarios_atencion', 'observaciones'
	];

	// RELACIONES
	// BELONGS TO
	public function empresa_onsite()
	{
		return $this->belongsTo('App\Models\Onsite\EmpresaOnsite', 'empresa_onsite_id');
	}

	public function localidad_onsite()
	{
		return $this->belongsTo('App\Models\Onsite\LocalidadOnsite', 'localidad_onsite_id');
	}

	public function company()
	{
		return $this->belongsTo('App\Models\Admin\Company');
	}

	public function usuarios()
	{
		return $this->belongsToMany('App\Models\Admin\User', 'user_sucursales_onsite', 'sucursal_onsite_id', 'user_id');
	}

	// HAS MANY
	public function solicitudes_onsite()
	{
		return $this->hasMany('App\Models\Onsite\SolicitudOnsite', 'sucursal_onsite_id');
	}
}
