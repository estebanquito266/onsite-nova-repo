<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    protected $table = "roles";

    protected $fillable = ['nombre', 'ruta', 'company_id'];

    /**
     * Get the xxx for the zzz.
     */

    // RELACIONES
    public function company()
    {
        return $this->belongsTo('App\Models\Admin\Company');
    }

    public function perfiles()
    {
        return $this->belongsToMany('App\Models\Admin\Perfil', 'roles_perfiles', 'id_rol', 'id_perfil');
    }
}
