<?php

namespace App\Models\Config;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Provincia extends Model
{
	protected $table = "provincias";

	protected $fillable = [
		'id',
		'nombre',
		'id_provincia_oca',
		'provincia_oca',
		'id_provincia_correo_argentino',
		'id_georef_ar',
		'company_id'
	];

	// RELACIONES
	/* public function clientes()
	{
		return $this->hasMany('App\Models\Cliente\Cliente', 'id_provincia');
	} */

	public function localidadOnsites()
	{
		return $this->hasMany('App\Models\Onsite\LocalidadOnsite', 'id_provincia');
	}

	public function company()
	{
		return $this->belongsTo('App\Models\Admin\Company');
	}
}
