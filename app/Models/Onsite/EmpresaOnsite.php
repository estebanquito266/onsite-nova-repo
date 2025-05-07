<?php

namespace App\Models\Onsite;

use App\Models\EmpresaInstaladora\EmpresaInstaladoraOnsite;
use Illuminate\Database\Eloquent\Model;

class EmpresaOnsite extends Model
{
  protected $table = "empresas_onsite";

  protected $fillable = [
    'company_id',
    'clave',
    'nombre',
    'primer_nombre',
    'apellido',
    'razon_social',
    'cuit',
    'tipo_iva',
    'pais',
    'provincia_onsite_id',
    'localidad_onsite_id',
    'localidad_texto',
    'codigo_postal',
    'email',
    'celular',
    'telefono',
    'web',
    'coordenadas',
    'observaciones',

    'plantilla_mail_asignacion_tecnico_id',
    'plantilla_mail_responsable_id',
    'tecnico_id',
    'responsable',
    'email_responsable',
    'requiere_tipo_conexion_local',
    'tipo_terminales'
  ];

  // RELACIONES
  // BELONGS TO
  public function company()
  {
    return $this->belongsTo('App\Models\Admin\Company');
  }

  // HAS MANY
  public function reparaciones_onsite()
  {
    return $this->hasMany('App\Models\Onsite\ReparacionOnsite', 'id_empresa_onsite');
  }

  public function solicitudes_onsite()
  {
    return $this->hasMany('App\Models\Onsite\SolicitudOnsite', 'empresa_onsite_id');
  }

  // BELONGS TO MANY
  public function usuarios()
  {
    return $this->belongsToMany('App\Models\Admin\User', 'user_empresas_onsite', 'empresa_onsite_id', 'user_id');
  }

  public function plantilla_mail_asignacion_tecnico()
  {
    return $this->belongsTo('App\Models\Config\PlantillaMail', 'plantilla_mail_asignacion_tecnico_id');
  }

  public function plantilla_mail_responsable()
  {
    return $this->belongsTo('App\Models\Config\PlantillaMail', 'plantilla_mail_responsable_id');
  }

  public function tecnico()
  {
    return $this->belongsTo('App\Models\Admin\User', 'tecnico_id');
  }

  public function tipo_servicio_onsite()
  {
    return $this->belongsToMany('App\Models\Onsite\TipoServicioOnsite', 'empresas_onsite_tipos_servicios_onsite', 'tipo_servicio_onsite_id', 'empresa_onsite_id')->withPivot('id');
  }

  public function empresa_instaladora_onsite()
  {
    return $this->belongsToMany(EmpresaInstaladoraOnsite::class,
    'empresas_instaladoras_empresas_onsite', 'empresa_onsite_id', 'empresa_instaladora_id');
  } 

  public function empresa_instaladora_empresa_onsite()
    {
        return $this->hasMany(EmpresaInstaladoraEmpresaOnsite::class, 'empresa_onsite_id');
    }
}
