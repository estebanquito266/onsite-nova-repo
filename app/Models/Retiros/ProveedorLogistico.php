<?php

namespace App\Models\Retiros;

use Illuminate\Database\Eloquent\Model;

class ProveedorLogistico extends Model
{
  protected $table = "proveedores_logisticos";

  protected $fillable = ['nombre', 'plantilla_mail_id', 'plantilla_mail_devolucion_id',];

  // RELECIONES
  public function plantilla_mail()
  {
    return $this->belongsTo('App\Models\Config\PlantillaMail', 'plantilla_mail_id');
  }

  public function plantilla_mail_devolucion()
  {
    return $this->belongsTo('App\Models\Config\PlantillaMail', 'plantilla_mail_devolucion_id');
  }

  public function company()
  {
    return $this->belongsTo('App\Models\Admin\Company');
  }
}
