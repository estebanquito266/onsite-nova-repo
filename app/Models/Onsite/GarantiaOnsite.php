<?php

namespace App\Models\Onsite;

use App\Models\Admin\Company;
use App\Models\Onsite\CompradorOnsite;
use App\Models\EmpresaInstaladora\EmpresaInstaladoraOnsite;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GarantiaOnsite extends Model
{
    use HasFactory;
    
    protected $table = 'garantias_onsite';

    protected $fillable = [
        'id',
        'company_id',
        'nombre',
        'empresa_instaladora_id',
        'user_id',
        'obra_onsite_id',
        'sistema_onsite_id',
        'comprador_onsite_id',
        'fecha_compra',
        'numero_factura',
        'observaciones',
        'fecha',
        'tipo'
    ];

public function company()
{
    return $this->belongsTo(Company::class, 'company_id');
}

public function empresa_instaladora()
{
    return $this->belongsTo(EmpresaInstaladoraOnsite::class, 'empresa_instaladora_id');
}

public function obra_onsite()
{
    return $this->belongsTo(ObraOnsite::class, 'obra_onsite_id');
}

public function sistema_onsite()
{
    return $this->belongsTo(SistemaOnsite::class, 'sistemas_onsite_id');
}

public function comprador_onsite()
{
    return $this->belongsTo(CompradorOnsite::class, 'comprador_onsite_id');
}


}
