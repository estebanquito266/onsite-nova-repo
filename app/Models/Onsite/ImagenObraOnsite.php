<?php

namespace App\Models\Onsite;

use Illuminate\Database\Eloquent\Model;

class ImagenObraOnsite extends Model
{
    protected $table = "imagenes_obras_onsite";

    protected $fillable = [

        'company_id',
        'obra_onsite_id',
        'tipo_imagen_onsite_id',
        'archivo',
        'descripcion'

    ];
}
