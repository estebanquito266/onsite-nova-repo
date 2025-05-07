<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Perfil extends Model
{
    protected $table = "perfiles";

    protected $fillable = [
        'company_id',
        'nombre',
        'presupuesto_ver_monto_presupuesto',
        'presupuesto_ver_claim',
        'presupuesto_ver_fee',
        'visualizar_historial_estado_onsite',
        'confirmar_empresa_cerrada_onsite',
        'descuento_respuestos_onsite'
    ];

    /* CONSTANTES */
    const PERFIL_TECNICO_ONSITE = 11;

    /**
     * Get the xxx for the zzz.
     */

    // RELACIONES
    public function company()
    {
        return $this->belongsTo('App\Models\Admin\Company');
    }

    public function usuarios()
    {
        return $this->belongsToMany('App\Models\Admin\User', 'perfiles_usuarios', 'id_perfil', 'id_usuario');
    }

    public function roles()
    {
        return $this->belongsToMany('App\Models\Admin\Rol', 'roles_perfiles', 'id_perfil', 'id_rol');
    }

    public function perfiles_usuarios()
    {
        return $this->hasMany('App\Models\Admin\PerfilUsuario', 'id_perfil');
    }
}
