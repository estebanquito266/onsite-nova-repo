<?php

namespace App\Models\Onsite;

use Illuminate\Database\Eloquent\Model;

class EstadoOnsite extends Model
{
    protected $table = "estados_onsite";

    protected $fillable = [
        'nombre',
        'company_id',
        'activo',
        'cerrado',
        'card_titulo',
        'card_intro',
        'card_icono',
    ];

    public function company()
    {
        return $this->belongsTo('App\Models\Admin\Company');
    }

    // RELACIONES
    public function historial_estado_onsite()
    {
        return $this->hasMany('App\Models\Onsite\HistorialEstadoOnsite', 'id_estado');
    }

    public function reparaciones_onsite()
    {
        return $this->hasMany('App\Models\Onsite\ReparacionOnsite', 'id_estado');
    }

    public function plantilla_mail_responsable()
    {
        return $this->belongsTo('App\Models\Config\PlantillaMail', 'plantilla_mail_responsable_id');
    }

    public function plantilla_mail_admin()
    {
        return $this->belongsTo('App\Models\Config\PlantillaMail', 'plantilla_mail_admin_id');
    }
}
