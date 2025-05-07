<?php

namespace App\Models\Admin;

use App\Models\EmpresaInstaladora\EmpresaInstaladoraOnsite;
use App\Models\EmpresaInstaladora\EmpresaInstaladoraUser;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name', 'email', 'password','domicilio', 'cuit', 'telefono',
        'id_sucursal', 'id_tipo_visibilidad', 'foto_perfil', 'numero_cuenta_respuestos_onsite',
        'descuento_respuestos_onsite'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // RELACIONES
    public function perfiles()
    {
        return $this->belongsToMany('App\Models\Admin\Perfil', 'perfiles_usuarios', 'id_usuario', 'id_perfil');
    }

    public function perfiles_usuarios()
    {
        return $this->hasMany('App\Models\Admin\PerfilUsuario', 'id_usuario');
    }

    public function clientes()
    {
        return $this->belongsToMany('App\Models\Cliente\Cliente', 'clientes_usuarios', 'id_usuario', 'id_cliente');
    }

    public function historial_estado_derivacion()
    {
        return $this->hasMany('App\Models\Derivacion\HistorialEstadoDerivacion', 'id_usuario');
    }

    public function horarios()
    {
        return $this->hasMany('App\Models\Horario\Horario', 'id_usuario');
    }

    public function historial_estado_onsite()
    {
        return $this->hasMany('App\Models\Onsite\HistorialEstadoOnsite', 'id_usuario');
    }

    public function historial_estado()
    {
        return $this->hasMany('App\Models\Reparacion\HistorialEstado', 'id_usuario');
    }

    public function notas()
    {
        return $this->hasMany('App\Models\Reparacion\Nota', 'id_usuario');
    }

    public function reparaciones()
    {
        return $this->hasMany('App\Models\Reparacion\Reparacion', 'id_usuario');
    }

    public function reparaciones_tecnicos()
    {
        return $this->hasMany('App\Models\Reparacion\ReparacionesTecnico', 'id_usuario');
    }

    public function localidad_onsite()
    {
        return $this->hasMany('App\Models\Onsite\LocalidadOnsite', 'id_usuario_tecnico');
    }

    public function ordenes_retiro_fixup_point()
    {
        return $this->hasMany('App\Models\Retiros\OrdenRetiroFixupPoint', 'usuario_id');
    }

    public function sucursales()
    {
        return $this->belongsToMany('App\Models\Sucursal\Sucursal', 'sucursal_user', 'user_id', 'sucursal_id');
    }

    public function sucursales_user()
    {
        return $this->hasMany('App\Models\Admin\SucursalUser', 'user_id');
    }

    public function tipo_visibilidad()
    {
        return $this->belongsTo('App\Models\Admin\TipoVisibilidad', 'id_tipo_visibilidad');
    }

    public function companies()
    {
        return $this->belongsToMany('App\Models\Admin\Company', 'user_companies', 'user_id', 'company_id');
    }

    public function user_companies()
    {
        return $this->hasMany('App\Models\Admin\UserCompany', 'user_id');
    }

    public function empresas_onsite()
    {
        return $this->belongsToMany('App\Models\Onsite\EmpresaOnsite', 'user_empresas_onsite', 'user_id', 'empresa_onsite_id');
    }

    public function user_empresas_onsite()
    {
        return $this->hasMany('App\Models\Onsite\UserEmpresaOnsite', 'user_id');
    }

    public function sucursales_onsite()
    {
        return $this->belongsToMany('App\Models\Onsite\SucursalOnsite', 'user_sucursales_onsite', 'user_id', 'sucursal_onsite_id');
    }

    public function user_sucursales_onsite()
    {
        return $this->hasMany('App\Models\Onsite\UserSucursalOnsite', 'user_id');
    }

    public function historiales_estados_onsite()
    {
        return $this->belongsToMany('App\Models\Onsite\HistorialEstadoOnsite', 'historial_estados_onsite_visible_por_user', 'users_id', 'historial_estados_onsite_id');
    }

    public function empresa_instaladora()
    {
        return $this->belongsToMany(EmpresaInstaladoraOnsite::class, 'empresas_instaladoras_users', 'user_id', 'empresa_instaladora_id');
    }
}
