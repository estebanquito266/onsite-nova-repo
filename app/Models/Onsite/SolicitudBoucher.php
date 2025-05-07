<?php

namespace App\Models\Onsite;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SolicitudBoucher extends Model
{
    use HasFactory;

    protected $table = 'solicitudes_bouchers';
    protected $fillable = [
        'id',
        'company_id',
        'obra_id',
        'solicitud_id',
        'solicitud_tarifa_id',
        'codigo',
        'precio',
        'consumido',
        'fecha_expira',
        'observaciones',

    ];
}
