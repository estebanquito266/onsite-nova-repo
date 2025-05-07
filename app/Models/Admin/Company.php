<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    const COMPANY_ALL = 1;
    const DEFAULT = 1;

    protected $fillable = [
        'nombre', 'derivacion_falla_grupo_equipo_default_id', 'operador_default_id', 'color_default_id',
        'modelo_default_id', 'tipo_equipo_default_id', 'marca_default_id', 'retiro_costos_envios',
        'derivacion_motivo_interes_default_id', 'derivacion_motivo_cancelacion_default_id',
        'derivacion_descuento_default_id', 'reparacion_taller_externo_default_id',
        'reparacion_proveedor_default_id', 'reparacion_falla_default_id', 'derivacion_sucursal_default_id',
        'derivacion_estado_default_id', 'derivacion_servicio_default_id',
        'derivacion_user_default_id', 'derivacion_grupo_equipo_smartphone_default_id', 'logo',
    ];

    public function colores()
    {
        return $this->hasMany('App\Models\Equipo\Color', 'company_id');
    }

    public function cuentas_vendedor_mercadopago()
    {
        return $this->hasMany('App\Models\Pagos\CuentaVendedorMercadoPago');
    }

    public function elockers_etiquetas()
    {
        return $this->hasMany('App\Models\Retiros\ElockerEtiqueta');
    }

    public function empresas_onsite()
    {
        return $this->hasMany('App\Models\Onsite\EmpresaOnsite');
    }

    /* public function estados_derivacion()
    {
        return $this->hasMany('App\Models\Derivacion\EstadoDerivacion');
    } */

    public function estados_onsite()
    {
        return $this->hasMany('App\Models\Onsite\EstadoOnsite');
    }

    public function fallas()
    {
        return $this->hasMany('App\Models\Reparacion\Falla');
    }

    public function localidades()
    {
        return $this->hasMany('App\Models\Config\Localidad');
    }

    public function marcas()
    {
        return $this->hasMany('App\Models\Equipo\Marca');
    }

    public function marcas_oficiales()
    {
        return $this->hasMany('App\Models\Web\MarcaOficial');
    }

    public function mensajes_web()
    {
        return $this->hasMany('App\Models\ConsultaEstado\MensajeWeb');
    }

    public function metodos_cobro()
    {
        return $this->hasMany('App\Models\Reparacion\Presupuesto\MetodoCobro');
    }

    public function modelos()
    {
        return $this->hasMany('App\Models\Equipo\Modelo');
    }

    public function motivos_rechazo_presupuesto()
    {
        return $this->hasMany('App\Models\Reparacion\Presupuesto\MotivoRechazoPresupuesto');
    }

    public function multiplicadores_fee()
    {
        return $this->hasMany('App\Models\Reparacion\Presupuesto\MultiplicadorFee');
    }

    public function niveles_onsite()
    {
        return $this->hasMany('App\Models\Onsite\NivelOnsite');
    }

    public function estados()
    {
        return $this->hasMany('App\Models\Reparacion\Estado');
    }

    public function perfiles()
    {
        return $this->hasMany('App\Models\Admin\Perfil');
    }

    public function roles()
    {
        return $this->hasMany('App\Models\Admin\Rol');
    }

    public function roles_perfiles()
    {
        return $this->hasMany('App\Models\Admin\RolPerfil');
    }

    public function presupuestos_etiquetas()
    {
        return $this->hasMany('App\Models\Reparacion\Presupuesto\PresupuestoEtiqueta');
    }

    public function presupuestos_resoluciones()
    {
        return $this->hasMany('App\Models\Reparacion\Presupuesto\PresupuestoResolucion');
    }

    public function usuario()
    {
        return $this->belongsTo('App\Models\Admin\User', 'id_usuario');
    }

    public function usuarios()
    {
        return $this->belongsToMany('App\Models\Admin\User', 'user_companies', 'company_id', 'user_id');
    }

    public function sucursal_default()
    {
        return $this->belongsTo('App\Models\Sucursal\Sucursal', 'derivacion_sucursal_default_id');
    }

    public function estado_derivacion_default()
    {
        return $this->belongsTo('App\Models\Derivacion\EstadoDerivacion', 'derivacion_estado_default_id');
    }

    public function servicio_default()
    {
        return $this->belongsTo('App\Models\Derivacion\Servicio', 'derivacion_servicio_default_id');
    }

    public function user_default()
    {
        return $this->belongsTo('App\Models\Admin\User', 'derivacion_user_default_id');
    }

    public function grupo_equipo_smartphone_default()
    {
        return $this->belongsTo('App\Models\Equipo\GrupoEquipo', 'derivacion_grupo_equipo_smartphone_default_id');
    }

    public function descuento_default()
    {
        return $this->belongsTo('App\Models\Descuento', 'derivacion_descuento_default_id');
    }

    public function motivo_cancelacion_derivacion_default()
    {
        return $this->belongsTo('App\Models\Derivacion\MotivoCancelacionDerivacion', 'derivacion_motivo_cancelacion_default_id');
    }

    public function motivo_interes_derivacion_default()
    {
        return $this->belongsTo('App\Models\Derivacion\MotivoInteresDerivacion', 'derivacion_motivo_interes_default_id');
    }

    public function falla_default()
    {
        return $this->belongsTo('App\Models\Reparacion\Falla', 'reparacion_falla_default_id');
    }

    public function proveedor_default()
    {
        return $this->belongsTo('App\Models\Reparacion\Proveedor', 'reparacion_proveedor_default_id');
    }

    public function taller_externo_default()
    {
        return $this->belongsTo('App\Models\Reparacion\TallerExterno', 'reparacion_taller_externo_default_id');
    }

    public function operador_default()
    {
        return $this->belongsTo('App\Models\Equipo\Operador', 'operador_default_id');
    }

    public function color_default()
    {
        return $this->belongsTo('App\Models\Equipo\Color', 'color_default_id');
    }

    public function modelo_default()
    {
        return $this->belongsTo('App\Models\Equipo\Modelo', 'modelo_default_id');
    }

    public function marca_default()
    {
        return $this->belongsTo('App\Models\Equipo\Marca', 'marca_default_id');
    }

    public function tipo_equipo_default()
    {
        return $this->belongsTo('App\Models\Equipo\TipoEquipo', 'tipo_equipo_default_id');
    }

    public function falla_grupo_equipo_default()
    {
        return $this->belongsTo('App\Models\Equipo\FallaGrupoEquipo', 'derivacion_falla_grupo_equipo_default_id');
    }
}
