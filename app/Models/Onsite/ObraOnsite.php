<?php

namespace App\Models\Onsite;

use App\Models\EmpresaInstaladora\EmpresaInstaladoraOnsite;
use Illuminate\Database\Eloquent\Model;

class ObraOnsite extends Model
{
    protected $table = 'obras_onsite';

    protected $fillable = [
		'company_id',
		'empresa_instaladora_id',
		'clave',
		'nombre',
		'nro_cliente_bgh_ecosmart',
		'cantidad_unidades_exteriores',
		'cantidad_unidades_interiores',
		'empresa_instaladora_nombre',
		'empresa_instaladora_responsable',
		'responsable_email',
		'responsable_telefono',
		'domicilio',
		'localidad_txt',
		'provincia_txt',
		'pais_txt',
		'estado',
		'estado_detalle',
		'esquema',
	];

	public function obra_checklist_onsite()
	{
		return $this->hasOne('App\Models\Onsite\ObraChecklistOnsite', 'obra_onsite_id', 'id');
	}

    public function company()
    {
        return $this->belongsTo('App\Models\Admin\Company');
    }

	public function empresa_onsite()
	{
		return $this->belongsTo(EmpresaOnsite::class, 'empresa_onsite_id');
	}

	public function empresa_instaladora()
	{
		return $this->belongsTo(EmpresaInstaladoraOnsite::class, 'empresa_instaladora_id');
	}

    public function sistema_onsite()
    {
        return $this->hasMany('App\Models\Onsite\SistemaOnsite', 'obra_onsite_id');
    }

    public function solicitud_onsite()
    {
        return $this->hasMany('App\Models\Onsite\SolicitudOnsite', 'obra_onsite_id');
    }
}
