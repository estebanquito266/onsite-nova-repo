<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class TipoVisibilidad extends Model
{
    protected $table = "tipos_visibilidades";

    protected $fillable = ['nombre', 'company_id'];

    // RELACIONES
    public function users()
    {
        return $this->hasMany('App\Models\Admin\User', 'id_tipo_visibilidad');
    }

    public function company()
    {
      return $this->belongsTo('App\Models\Admin\Company');
    }    
}
