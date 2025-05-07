<?php

namespace App\Nova\Filters;

use App\Models\Onsite\EmpresaOnsite;
use Illuminate\Http\Request;
use Laravel\Nova\Filters\BooleanFilter;

class EmpresaOnSiteFilter extends BooleanFilter
{
    
    /**
     * The displayable name of the filter.
     *
     * @var string
     */
    public $name = 'Generar Clave';

    /**
     * Apply the filter to the given query.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @param  mixed  $value
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function apply(Request $request, $query, $value)
    {
        return $query->where('generar_clave_reparacion', $value['generar_clave_reparacion']);
        
    }

    /**
     * Get the filter's available options.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function options(Request $request)
    {
        return [
            'Generar Clave Rep.' => 'generar_clave_reparacion',            
        ];
    }
    
    /**
     * The default value of the filter.
     *
     * @var string
     */
    public function default()
    {
        
    }

}
