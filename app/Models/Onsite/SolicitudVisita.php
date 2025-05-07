<?php

namespace App\Models\Onsite;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SolicitudVisita extends Model
{
    protected $table = 'solicitud_visitas';

    protected $fillable = [
        'visita_id',
        'solicitud_id',
    ];

    public function visita()
    {
        return $this->belongsTo('App\Models\Onsite\ReparacionOnsite', 'visita_id');
    }

    public function solicitud()
    {
        return $this->belongsTo('App\Models\Onsite\SolicitudOnsite', 'solicitud_id');
    }
}
