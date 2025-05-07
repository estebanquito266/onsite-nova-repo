<?php

namespace App\Models\Respuestos;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModeloRespuestosOnsite extends Model
{
    use HasFactory;

    
    protected $table = "modelos_respuestos_onsite";

  protected $fillable = [
      'id',
    'company_id',
    'categoria_respuestos_onsite_id',
    'nombre',
    'imagen_despiece',
    'campo_padre'
   
  ];

  public function categoria_respuestos_onsite()
  {
    return $this->belongsTo(CategoriaRespuestosOnsite::class);
  }

  public function imagen()
	{
		return $this->hasMany(ImagenModelosRepuestos::class, 'modelo_respuestos_id');
	}

  public function pieza_respuestos_onsite()
  {
    return $this->belongsToMany(PiezaRespuestosOnsite::class, 'modelos_piezas_onsite', 'modelo_respuestos_id', 'pieza_respuestos_id');
  }

  public function company()
	{
		return $this->belongsTo('App\Models\Admin\Company');
	}

  public function modelo_pieza()
    {
        return $this->hasMany(ModeloPiezaOnsite::class, 'modelo_respuestos_id');
    }
}
