<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class PerfilUsuario extends Model
{
	protected $table = "perfiles_usuarios";

	protected $fillable = [
		'id_usuario',
		'id_perfil',
		'id_tipo_ingreso'
	];

	// RELACIONES
	public function usuario()
	{
		return $this->belongsTo('App\Models\Admin\User', 'id_usuario');
	}

	public function perfil()
	{
		return $this->belongsTo('App\Models\Admin\Perfil', 'id_perfil');
	}

	/* public function tipo_ingreso()
	{
		return $this->belongsTo('App\Models\Reparacion\TipoIngreso', 'id_tipo_ingreso');
	} */

	public function company()
	{
		return $this->belongsTo('App\Models\Admin\Company');
	}
}
