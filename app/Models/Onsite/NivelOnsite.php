<?php

namespace App\Models\Onsite;

use Illuminate\Database\Eloquent\Model;

class NivelOnsite extends Model
{
    protected $table = "niveles_onsite";
	
    protected $fillable = ['nombre', 'company_id'];

    public static function listar()
    {
        return NivelOnsite::select('niveles_onsite.*')
            ->orderBy('nombre', 'asc')
            ->get();
    }

    public static function listado()
    {
        return NivelOnsite::select("id", "nombre")
            ->orderBy('nombre', 'asc')
            ->pluck('nombre', 'id');
    }
    
    // RELACIONES
    public function company()
    {
        return $this->belongsTo('App\Models\Admin\Company');
    }
    
    public function localicad_onsite()
    {
        return $this->hasMany('App\Models\Onsite\LocalidadOnsite', 'id_nivel');
    }

    public function slas_onsites()
    {
        return $this->hasMany('App\Models\Onsite\SlaOnsite', 'id_nivel');
    }
}
