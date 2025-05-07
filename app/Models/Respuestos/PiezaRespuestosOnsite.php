<?php

namespace App\Models\Respuestos;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PiezaRespuestosOnsite extends Model
{
    use HasFactory;


    protected $table = "piezas_respuestos_onsite";

    protected $fillable = [
        'id',
        'company_id',
        'numero',
        'spare_parts_code',
        'part_name',
        'precio_fob',
        'part_image',
        'description',
        'peso',
        'dimensiones',
        'pia',
        'moneda',
        'stock'

    ];

    public function modelo_respuestos_onsite()
  {
    return $this->belongsToMany(ModeloRespuestosOnsite::class,
    'modelos_piezas_onsite', 'pieza_respuestos_id', 'modelo_respuestos_id');
  }

 /*  public function categoria_respuestos_onsite()
  {
    return $this->belongsTo(CategoriaRespuestosOnsite::class);
  } */

  

  public function company()
	{
		return $this->belongsTo('App\Models\Admin\Company');
	}

  public function modelo_pieza()
    {
        return $this->hasMany(ModeloPiezaOnsite::class, 'pieza_respuestos_id');
    }

    

}
