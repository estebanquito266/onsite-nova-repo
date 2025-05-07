<?php

namespace App\Nova\Filters;
use App\Models\Onsite\LocalidadOnsite;
use Illuminate\Http\Request;
use Laravel\Nova\Filters\Filter;

class EmpresasInstaladorasLocalidadFilter extends Filter
{
    /**
     * The displayable name of the filter.
     *
     * @var string
     */
    public $name = 'Por localidad';

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
        $provincias = LocalidadOnsite::orderBy('localidad')->pluck('id', 'localidad' );
        return $provincias;
    }
}
