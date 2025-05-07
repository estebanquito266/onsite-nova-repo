<?php

namespace App\Models\Onsite;

// use App\Models\Traits\HasSorts;
use Illuminate\Database\Eloquent\Model;

class TerminalOnsite extends Model
{
	// use HasSorts;

	public $campos_permitidos_para_ordenar = [
		'id',
		'nro',
		'sucursal_onsite_id',
		'empresa_onsite_id',
		'marca',
		'modelo',
		'created_at',
		'updated_at'
	];

	protected $primaryKey = "nro";

	public $incrementing = false;

	protected $table = "terminales_onsite";

	protected $fillable = [
		'nro',
		'company_id',
		'all_terminales_sucursal',
		'marca',
		'modelo',
		'serie',
		'rotulo',
		'observaciones',
		'empresa_onsite_id',
		'sucursal_onsite_id',

	];

	// RELACIONES
	// HAS MANY
	public function solicitudes_onsite()
	{
		return $this->hasMany('App\Models\Onsite\SolicitudOnsite', 'terminal_onsite_id');
	}

	public function empresa_onsite()
	{
		return $this->belongsTo('App\Models\Onsite\EmpresaOnsite', 'empresa_onsite_id');
	}

	public function sucursal_onsite()
	{
		return $this->belongsTo('App\Models\Onsite\SucursalOnsite', 'sucursal_onsite_id');
	}
}
