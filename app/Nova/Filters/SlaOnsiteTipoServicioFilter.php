<?php

namespace App\Nova\Filters;
use App\Models\Equipo\Marca;
use App\Models\Onsite\NivelOnsite;
use App\Models\Onsite\TipoServicioOnsite;
use Illuminate\Http\Request;
use Laravel\Nova\Filters\Filter;

class SlaOnsiteTipoServicioFilter extends Filter
{
    
    /**
     * The displayable name of the filter.
     *
     * @var string
     */
    public $name = 'Tipo de Servicio';

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
        return $query->where('id_tipo_servicio', $value);        
    }

    /**
     * Get the filter's available options.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function options(Request $request)
    {
        $tipoServicio = TipoServicioOnsite::pluck('id', 'nombre' );
        return $tipoServicio;
        
    }
}
