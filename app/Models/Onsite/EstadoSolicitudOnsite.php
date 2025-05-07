<?php

namespace App\Models\Onsite;

use Illuminate\Database\Eloquent\Model;

class EstadoSolicitudOnsite extends Model
{
    protected $table = 'estados_solicitudes_onsite';

    public function company()
    {
        return $this->belongsTo('App\Models\Admin\Company');
    }

    public function plantilla_mail()
    {
        return $this->belongsTo('App\Models\Config\PlantillaMail', 'plantilla_mail_cliente_id');
    }
}
