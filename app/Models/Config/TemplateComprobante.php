<?php

namespace App\Models\Config;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TemplateComprobante extends Model
{
    use HasFactory;

    protected $table = "templates_comprobantes";

  protected $fillable = ['id', 'company_id', 'nombre', 'cuerpo', 'tipo_comprobante'];


  public function company()
  {
      return $this->belongsTo('App\Models\Admin\Company');
  }
}
