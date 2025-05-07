<?php

namespace App\Models\Onsite;

use Illuminate\Database\Eloquent\Model;
use DB;

class SistemaOnsite extends Model
{
    protected $table = "sistemas_onsite";

    protected $fillable = [
        'id',
        'company_id',
        'empresa_onsite_id',
        'obra_onsite_id',
        'obra_onsite_id_unificado',
        'sucursal_onsite_id',
        'comprador_onsite_id',
        'nombre',
        'fecha_compra',
        'numero_factura',
        'comentarios',
        'created_at',
        'updated_at',
    ];

    protected $casts = [
        'fecha_compra' => 'datetime',
    ];

    public function company_onsite()
    {
        return $this->belongsTo('App\Models\Admin\Company', 'company_id');
    }

    public function empresa_onsite()
    {
        return $this->belongsTo('App\Models\Onsite\EmpresaOnsite', 'empresa_onsite_id');
    }

    public function obra_onsite()
    {
        return $this->belongsTo('App\Models\Onsite\ObraOnsite', 'obra_onsite_id');
    }

    public function sucursal_onsite()
    {
        return $this->belongsTo('App\Models\Onsite\SucursalOnsite', 'sucursal_onsite_id');
    }

    public function comprador_onsite()
    {
        return $this->belongsTo('App\Models\Onsite\CompradorOnsite', 'comprador_onsite_id');
    }

    public function reparacion_onsite()
    {
        return $this->hasMany('App\Models\Onsite\ReparacionOnsite', 'sistema_onsite_id');
    }

    public function unidades_exteriores()
    {
        return $this->hasMany('App\Models\Onsite\UnidadExteriorOnsite', 'sistema_onsite_id');
    }

    public function unidades_interiores()
    {
        return $this->hasMany('App\Models\Onsite\UnidadInteriorOnsite', 'sistema_onsite_id');
    }

    public function solicitud_onsite()
    {
        return $this->hasMany('App\Models\Onsite\SolicitudOnsite', 'sistema_onsite_id');
    }
}
