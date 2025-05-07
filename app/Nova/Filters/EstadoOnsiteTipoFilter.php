<?php

namespace App\Nova\Filters;
use App\Models\Onsite\EstadoOnsite;
use Illuminate\Http\Request;
use Laravel\Nova\Filters\Filter;

class EstadoOnsiteTipoFilter extends Filter
{
    /**
     * The displayable name of the filter.
     *
     * @var string
     */
    public $name = 'Tipo de Estado (id)';

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
        return $query->where('tipo_estado_onsite_id', $value);        
    }

    /**
     * Get the filter's available options.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function options(Request $request)
    {
        $estado_onsite = EstadoOnsite::pluck('tipo_estado_onsite_id', 'tipo_estado_onsite_id' );
        return $estado_onsite;
        
    }
}
