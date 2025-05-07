<?php

namespace App\Nova\Filters;

use Illuminate\Http\Request;
use Laravel\Nova\Filters\BooleanFilter;

class EstadoOnsiteFilter extends BooleanFilter
{
    /**
     * The displayable name of the filter.
     *
     * @var string
     */
    public $name = 'Activos/Cerrados';

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
        // Mediante base64_decode se decodifica el request para poder evaluar 
        // la selección del usuario
        // ver: https://github.com/Maatwebsite/Laravel-Nova-Excel/issues/80
        if ($request->has('filters')) 
        {           
            $filters = json_decode(base64_decode($request->filters));
            $filtro_activo = 0;
            $filtro_cerrado = 0;            
            foreach ($filters as $filter) 
            {                
                if (isset($filter->value->activo) && $filter->value->activo == true)
                $filtro_activo = 1;                               
                
                if (isset($filter->value->cerrado) && $filter->value->cerrado == true)
                $filtro_cerrado = 1;                                               
                
                if (empty($filter->value)) {
                    continue;
                }
            }            
                if (($filtro_activo == 1) && ($filtro_cerrado == 1) )
                return  $query->where('activo', $value['activo'])
                              ->orWhere('cerrado', $value['cerrado']);                              
                
                if (($filtro_activo == 1) && ($filtro_cerrado == 0))
                return  $query->where('activo', $value['activo']);                           
                               
                if (($filtro_cerrado == 1) && ($filtro_activo == 0 ))
                return  $query->where('cerrado', $value['cerrado']);                            
        }
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
            'Activos' => 'activo',
            'Cerrados' => 'cerrado',            
        ];    
    }
}
