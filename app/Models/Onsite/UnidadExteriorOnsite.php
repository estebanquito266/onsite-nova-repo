<?php

namespace App\Models\Onsite;

// use App\Models\Traits\HasSorts;
use Illuminate\Database\Eloquent\Model;

class UnidadExteriorOnsite extends Model
{
	// use HasSorts;

	public $campos_permitidos_para_ordenar = [
		'id',
		'sistemas_onsite_id',
		'created_at',
		'updated_at'
	];

	protected $table = "unidades_exteriores_onsite";

	protected $fillable = [
		'company_id',
		'empresa_onsite_id',
		'sucursal_onsite_id',
		'clave',
		'modelo',
		'serie',
		'sistema_onsite_id',
		'medida_figura_1_a',
		'medida_figura_1_b',
		'medida_figura_1_c',
		'medida_figura_1_d',
		'medida_figura_2_a',
		'medida_figura_2_b',
		'medida_figura_2_c',
		'anclaje_piso',
		'contra_sifon',
		'mm_500_ultima_derivacion_curva',
		'observaciones',
	];

	// RELACIONES
	public function company()
	{
		return $this->belongsTo('App\Models\Admin\Company', 'company_id');
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
		return $this->hasMany('App\Models\Onsite\ImagenUnidadExteriorOnsite' , 'unidad_exterior_onsite_id');
	}
}
