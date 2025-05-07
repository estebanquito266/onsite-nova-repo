<?php

namespace App\Models\Onsite;

use Illuminate\Database\Eloquent\Model;

class ImagenOnsite extends Model
{
    protected $table = "imagenes_onsite";

    protected $fillable = [
        'company_id', 'reparacion_onsite_id', 'archivo',
        'tipo', 'descripcion',
    ];

    // RELACIONES
    public function reparacion_onsite()
    {
        return $this->belongsTo('App\Models\Onsite\ReparacionOnsite', 'reparacion_onsite_id');
    }

    public function company()
    {
        return $this->belongsTo('App\Models\Admin\Company', 'company_id');
    }

    public function tipo_imagen_onsite()
    {
        return $this->belongsTo('App\Models\Onsite\TipoImagenOnsite', 'tipo_imagen_onsite_id');
    }
}
