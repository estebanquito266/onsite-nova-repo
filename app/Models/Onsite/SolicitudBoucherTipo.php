<?php

namespace App\Models\Onsite;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SolicitudBoucherTipo extends Model
{
    use HasFactory;

    protected $table = 'solicitudes_bouchers_tipos';

    protected $fillable = [
        'id',
        'company_id',
        'nombre',
        'observaciones'
    ];
}
