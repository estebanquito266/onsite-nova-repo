<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;

class ObraOnsite extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\Onsite\ObraOnsite::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'id';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id',
    ];

        /**
     * The logical group associated with the resource.
     *
     * @var string
     */
    public static $group = 'Transaction'; 

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
            Text::make('Clave'),
            Text::make('Nombre'),
            Text::make('Domicilio'),
            Number::make('Unidades Exteriores','cantidad_unidades_exteriores'),
            Number::make('Unidades Interiores','cantidad_unidades_interiores'),
            Text::make('Empresa Instaladora','empresa_instaladora_nombre'),
            Text::make('Empresa Instaladora Responsable','empresa_instaladora_responsable'),
            Text::make('Responsable Email','responsable_email'),
            Text::make('Responsable Telefono','responsable_telefono'),
            Text::make('Esquema'),
            Number::make('Estado'),
            Text::make('Estado Detalle','estado_detalle'),
            Number::make('empresa_instaladora_id'),
            Boolean::make('activo')
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
            new Filters\ObraActivo,
            
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
        return [];
    }
}
