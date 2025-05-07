<?php

namespace App\Nova\Filters;
use App\Models\Equipo\Marca;
use App\Models\Onsite\EmpresaOnsite;
use App\Models\Onsite\LocalidadOnsite;
use Illuminate\Http\Request;
use Laravel\Nova\Filters\Filter;

class SucursalOnsiteLocalidadFilter extends Filter
{
    /**
     * The displayable name of the filter.
     *
     * @var string
     */
    public $name = 'Localidades';

    /**
     * The filter's component.
     *
     * @var string
     */
    public $component = 'select-filter';

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
        return $query->where('localidad_onsite_id', $value);        
    }

    /**
     * Get the filter's available options.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function options(Request $request)
    {
        $localidad_onsite = LocalidadOnsite::pluck('id', 'localidad_estandard');
        return $localidad_onsite;
        
    }
}
