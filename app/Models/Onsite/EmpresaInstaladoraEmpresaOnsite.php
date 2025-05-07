<?php

namespace App\Models\Onsite;

use App\Models\EmpresaInstaladora\EmpresaInstaladoraOnsite;
use App\Models\Onsite\EmpresaOnsite;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmpresaInstaladoraEmpresaOnsite extends Model
{
    use HasFactory;

    protected $table = 'empresas_instaladoras_empresas_onsite';

    public function empresa_instaladora_onsite()
    {
      return $this->belongsTo(EmpresaInstaladoraOnsite::class, 'empresa_instaladora_id');
    }
  
    public function empresa_onsite()
    {
      return $this->belongsTo(EmpresaOnsite::class, 'empresa_onsite_id');
    }
  
    public function company()
      {
          return $this->belongsTo('App\Models\Admin\Company');
      }

}
