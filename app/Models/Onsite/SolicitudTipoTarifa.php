<?php

namespace App\Models\Onsite;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SolicitudTipoTarifa extends Model
{
    use HasFactory;
    protected $table = 'solicitudes_tipos_tarifas';
    protected $fillable = [
        'company_id',
        'solicitud_tipo_id',
        'moneda',
        'version',
        'observaciones'
    ];

}
