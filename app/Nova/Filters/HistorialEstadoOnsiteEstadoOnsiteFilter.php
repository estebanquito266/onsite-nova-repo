<?php

namespace App\Nova\Filters;
use App\Models\Onsite\EstadoOnsite;
use Illuminate\Http\Request;
use Laravel\Nova\Filters\Filter;

class HistorialEstadoOnsiteEstadoOnsiteFilter extends Filter
{
    /**
     * The displayable name of the filter.
     *
     * @var string
     */
    public $name = 'Estado';

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
        return $query->where('id_estado', $value);        
    }

    /**
     * Get the filter's available options.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function options(Request $request)
    {
        $estado_onsite = EstadoOnsite::pluck('tipo_estado_onsite_id', 'nombre' );
        return $estado_onsite;
        
    }
}
