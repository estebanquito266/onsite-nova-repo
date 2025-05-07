<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class RolPerfil extends Model
{
    protected $table = "roles_perfiles";

    protected $fillable = ['id_perfil', 'id_rol', 'company_id'];

    // RELACIONES
    public function company()
    {
        return $this->belongsTo('App\Models\Admin\Company');
    }
    public function perfil()
    {
        return $this->belongsTo('App\Models\Admin\Perfil', 'id_perfil', 'id');
    }

    public function rol()
    {
        return $this->belongsTo('App\Models\Admin\Rol', 'id_rol', 'id');
    }
}
