<?php

namespace App\Models\Onsite;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\Company;

class CompradorOnsite extends Model
{
    use HasFactory;


    protected $table = 'compradores_onsite';
    protected $fillable = [

        'company_id',
        'nombre',
        'primer_nombre',
        'apellido',
        'pais',
        'provincia',
        'localidad',
        'domicilio',
        'codigo_postal',
        'email',
        'telefono',
        'celular',
        'observaciones',
        'activo',
    ];

    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id');
    }

    public function Provincia()
	{
		return $this->belongsTo('App\Models\Config\Provincia', 'provincia_onsite_id');
	}

    public function LocalidadOnsite()
    {
        return $this->belongsTo(LocalidadOnsite::class, 'localidad_onsite_id');
    }

    public function sistema_onsite()
    {
        return $this->hasMany('App\Models\Onsite\SistemaOnsite', 'sistema_onsite_id');
    }

}
