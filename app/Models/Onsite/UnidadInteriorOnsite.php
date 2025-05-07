<?php

namespace App\Models\Onsite;

// use App\Models\Traits\HasSorts;
use Illuminate\Database\Eloquent\Model;

class UnidadInteriorOnsite extends Model
{
	// use HasSorts;

	public $campos_permitidos_para_ordenar = [
		'id',
		'clave',
		'modelo',
		'serie',
		'created_at',
		'updated_at'
	];

	protected $table = "unidades_interiores_onsite";

	protected $fillable = [
		'company_id',
		'clave',
		'modelo',
		'serie',
		'direccion',
		'observaciones',
		'empresa_onsite_id',
		'sucursal_onsite_id',
		'sistema_onsite_id',

	];

	// RELACIONES
	public function company()
	{
		return $this->belongsTo('App\Models\Onsite\Company', 'company_id');
	}

	public function empresa_onsite()
	{
		return $this->belongsTo('App\Models\Onsite\EmpresaOnsite', 'empresa_onsite_id');
	}

	public function sucursal_onsite()
	{
		return $this->belongsTo('App\Models\Onsite\SucursalOnsite', 'sucursal_onsite_id');
	}
	
	public function sistema_onsite()
	{
		return $this->belongsTo('App\Models\Onsite\SistemaOnsite', 'sistema_onsite_id');
	}

	public function imagenes()
	{
		return $this->hasMany('App\Models\Onsite\ImagenUnidadInteriorOnsite' , 'unidad_interior_onsite_id');
	}
}
