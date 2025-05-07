<?php

namespace App\Models\Config;

use Illuminate\Database\Eloquent\Model;
use DB;

class Parametro extends Model
{
	protected $table = "parametros";

	protected $fillable = [
		'nombre',
		'descripcion',
		'id_tipo_parametro',
		'id_plantilla_mail_base',
		'tipo_valor',
		'valor_numerico',
		'valor_cadena',
		'valor_texto',
		'valor_fecha',
		'valor_boolean',
		'valor_decimal',
		'company_id'
	];

	//Casts of the model dates
	protected $casts = [
		'valor_fecha' => 'date'
	];

	public function company()
	{
		return $this->belongsTo('App\Models\Admin\Company');
	}

	public function tipo_parametro()
	{
		return $this->belongsTo('App\Models\Config\TipoParametroSitioWeb', 'id_tipo_parametro');
	}

	public function plantilla_mail_base()
	{
		return $this->belongsTo('App\Models\Config\PlantillaMail', 'id_plantilla_mail_base');
	}

	public function plantilla_mail_variable()
	{
		return $this->hasMany('App\Models\Config\PlantillaMailVariable', 'id_plantilla_mail', 'id_plantilla_mail_base');
	}
}
