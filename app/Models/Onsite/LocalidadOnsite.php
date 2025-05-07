<?php

namespace App\Models\Onsite;

use Illuminate\Database\Eloquent\Model;
use DB;

class LocalidadOnsite extends Model
{

	protected $table = "localidades_onsite";

	protected $fillable = ['id_provincia', 'localidad', 'localidad_estandard', 'codigo', 'km', 'id_nivel', 'atiende_desde', 'id_usuario_tecnico'];


	// RELACIONES
	public function nivel()
	{
		return $this->belongsTo('App\Models\Onsite\NivelOnsite', 'id_nivel');
	}

	public function provincias()
	{
		return $this->belongsTo('App\Models\Config\Provincia', 'id_provincia');
	}

	public function usuario_tecnico()
	{
		return $this->belongsTo('App\Models\Admin\User', 'id_usuario_tecnico');
	}


	public function comprador_onsite()
	{
		return $this->belongsTo('App\Models\Onsite\CompradorOnsite', 'localidad_onsite_id');
	}
	public function empresa_instaladora_onsite()
	{
		return $this->belongsTo('App\Models\EmpresaInstaladora\EmpresaInstaladoraOnsite', 'localidad_onsite_id');
	}
	public function empresa_onsite()
	{
		return $this->belongsTo('App\Models\Onsite\EmpresaOnsite', 'localidad_onsite_id');
	}
	public function obras_onsite()
	{
		return $this->belongsTo('App\Models\Onsite\ObraOnsite', 'localidad_onsite_id');
	}
	public function sucursal_onsite()
	{
		return $this->belongsTo('App\Models\Onsite\SucursalOnsite', 'localidad_onsite_id');
	}	
	/* public function terminales_onsite()
	{
		return $this->hasMany('App\Models\Onsite\TerminalOnsite', 'id_localidad');
	} */

	public function company()
	{
		return $this->belongsTo('App\Models\Admin\Company');
	}
}
