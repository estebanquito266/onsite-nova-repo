<?php

namespace App\Models\Config;

use Illuminate\Database\Eloquent\Model;

class PlantillaMail extends Model
{
    CONST REPUESTOS_ADMIN = 265;
    CONST REPUESTOS_TECNICOS = 264;

    protected $table = "plantillas_mails";

    protected $fillable = [
        'id',
        'referencia',
        'from',
        'from_nombre',
        'subject',
        'body',
        'cc',
        'cc_nombre',
        'plantilla_mail_base',
        'body_txt',
        'company_id'
    ];

    // RELACIONES
    public function proveedores_logisticos()
    {
        return $this->hasMany('App\Models\Retiros\ProveedorLogistico', 'plantilla_mail_id');
    }

    public function parametros()
    {
        return $this->hasMany('App\Models\Config\Parametro', 'id_plantilla_mail_base');
    }

    public function parametros_sitio_web()
    {
        return $this->hasMany('App\Models\Config\ParametroSitioWeb', 'id_plantilla_mail_base');
    }

    public function templates_mail()
    {
        return $this->hasMany('App\Models\Reparacion\TemplateMail', 'id_plantilla_mail');
    }

    public function estados_derivacion()
    {
        return $this->hasMany('App\Models\Derivacion\EstadoDerivacion', 'id_plantilla_mail');
    }

    public function company()
    {
        return $this->belongsTo('App\Models\Admin\Company');
    }

    public function plantilla_mail_variable()
    {
        return $this->hasMany('App\Models\Config\PlantillaMailVariable', 'id_plantilla_mail');
    }

    public function motivos_cancelacion_derivacion()
    {
        return $this->hasMany('App\Models\Derivacion\MotivoCancelacionDerivacion', 'plantilla_mail_id');
    }

    public function motivos_interes_derivacion()
    {
        return $this->hasMany('App\Models\Derivacion\MotivoInteresDerivacion', 'plantilla_mail_id');
    }

    public function estados()
    {
        return $this->hasMany('App\Models\Reparacion\Estado', 'plantilla_mail_sirena_id');
    }

    public function servicios()
    {
        return $this->hasMany('App\Models\Reparacion\Servicio', 'plantilla_mail_sirena_id');
    }
}
