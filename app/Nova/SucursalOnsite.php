<?php

namespace App\Nova;

use App\Nova\Filters\CompanyFilter;
use App\Nova\Filters\SucursalOnsiteEmpresaFilter;
use App\Nova\Filters\SucursalOnsiteLocalidadFilter;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\BelongsToMany;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;

class SucursalOnsite extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\Onsite\SucursalOnsite::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    //public static $title = 'razon_social';

    public function title()
    {
        return '[' . $this->company_id . ']'.'[' . $this->id . '] ' . $this->razon_social. ' - '.$this->codigo_sucursal;
    }    

    

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id', 'company_id', 'codigo_sucursal', 'empresa_onsite_id', 'razon_social', 'localidad_onsite_id',
        'direccion', 'telefono_contacto', 'nombre_contacto', 'horarios_atencion', 'observaciones'
    ];

    /**
     * The logical group associated with the resource.
     *
     * @var string
     */
    public static $group = 'Onsite';

    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function fields(Request $request)
    {
        return [
            ID::make(__('ID'), 'id')->sortable(),

            BelongsTo::make('Company')
            ->sortable(),

            Text::make('codigo_sucursal')
                ->sortable()
                ->rules('required', 'max:255'),

            Text::make('razon_social')
                ->sortable()
                ->rules('required', 'max:255'),

            BelongsTo::make('EmpresaOnsite', 'empresa_onsite')
            ->sortable(),

            BelongsTo::make('LocalidadOnsite', 'localidad_onsite')
            ->sortable(),

            BelongsToMany::make('Users', 'usuarios'),
        ];
    }

    /**
     * Get the cards available for the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function cards(Request $request)
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function filters(Request $request)
    {
        return [
            new CompanyFilter,
            new SucursalOnsiteEmpresaFilter,
            new SucursalOnsiteLocalidadFilter
        ];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function lenses(Request $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function actions(Request $request)
    {
        return [
            new Actions\ImportSucursalesOnsite
        ];
    }
}
