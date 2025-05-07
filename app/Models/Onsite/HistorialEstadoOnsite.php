<?php

namespace App\Models\Onsite;

use Illuminate\Database\Eloquent\Model;

class HistorialEstadoOnsite extends Model
{
    protected $table = "historial_estados_onsite";

    protected $fillable = [
        'id_reparacion',
        'id_estado',
        'fecha',
        'observacion',
        'id_usuario',
        'visible'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'fecha' => 'datetime',
    ];

    // RELACION
    public function estado_onsite()
    {
        return $this->belongsTo('App\Models\Onsite\EstadoOnsite', 'id_estado');
    }

    public function usuario()
    {
        return $this->belongsTo('App\Models\Admin\User', 'id_usuario');
    }
}
