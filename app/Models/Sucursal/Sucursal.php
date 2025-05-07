<?php

namespace App\Models\Sucursal;

use Illuminate\Database\Eloquent\Model;

class Sucursal extends Model
{
    protected $table = "sucursales";

    protected $fillable = [
        'nombre',
        'ultimo_id_reparacion',
        'servicio_yolollevo',
        'servicio_adomicilio',
        'servicio_pickup',
        'servicio_elocker',
        'email',
        'latitud',
        'longitud',
        'direccion',
        'direccion_aproximada',
        'direccion_referencia',
        'direccion_mapa',
        'derivacion_automatica',
        'direccion_mapa_vinculo',
        'direccion_mapa_embed',
        'direccion_mapa_imagen',
        'horarios_atencion',
        'direccion_mapa_zonal_imagen',
        'centro_exclusivo',
        'atencion_hora_inicio_lunes',
        'atencion_hora_fin_lunes',
        'atencion_hora_inicio_sabado',
        'atencion_hora_fin_sabado',
        'dias_no_laborables',
        'sucursal_fixup',
        'sucursal_fixup_point',
        'sucursal_inteligente',
        'id_cuenta_vendedor_mp',
    ];

    // RELACIONES
    public function cuenta_vendedor_mercadopago()
    {
        return $this->belongsTo('App\Models\Pagos\CuentaVendedorMercadoPago', 'id_cuenta_vendedor_mp');
    }

    public function sucursales()
    {
        return $this->belongsToMany('App\Models\Reparacion\Estado', 'sucursales_estados', 'id_sucursal', 'id_estado');
    }

    public function marcas()
    {
        return $this->belongsToMany('App\Models\Equipo\Marca', 'sucursales_marcas', 'id_sucursal', 'id_marca');
    }

    public function sucursales_estados()
    {
        return $this->hasMany('App\Models\Reparacion\SucursalEstado', 'id_sucursal');
    }

    public function estados()
    {
        return $this->belongsToMany('App\Models\Reparacion\Estado', 'sucursales_estados', 'id_sucursal', 'id_estado');
    }

    public function sucursales_marcas()
    {
        return $this->hasMany('App\Models\Sucursal\SucursalMarca', 'id_sucursal');
    }

    public function users()
    {
        return $this->belongsToMany('App\Models\Admin\User', 'sucursal_user', 'sucursal_id', 'user_id');
    }

    public function grupos_equipos()
    {
        return $this->belongsToMany('App\Models\Equipo\GrupoEquipo', 'grupos_equipos_sucursales', 'id_sucursal', 'id_grupo_equipo');
    }

    public function grupos_equipos_sucursales()
    {
        return $this->hasMany('App\Models\Equipo\GrupoEquipoSucursal', 'id_sucursal');
    }

   /*  public function tipos_ingresos()
    {
        return $this->belongsToMany('App\Models\Reparacion\TipoIngreso', 'sucursales_tipos_ingresos', 'id_sucursal', 'id_tipo_ingreso');
    } */

    public function sucursales_tipos_ingresos()
    {
        return $this->hasMany('App\Models\Reparacion\SucursalTipoIngreso', 'id_sucursal');
    }

    public function derivaciones()
    {
        return $this->hasMany('App\Models\Derivacion\Derivacion', 'id_sucursal');
    }

    public function reparaciones()
    {
        return $this->hasMany('App\Models\Reparacion\Reparacion', 'id_sucursal');
    }

    public function ordenes_oca()
    {
        return $this->hasMany('App\Models\Retiros\OrdenOca', 'id_sucursal');
    }

    public function company()
    {
        return $this->belongsTo('App\Models\Admin\Company');
    }
}
