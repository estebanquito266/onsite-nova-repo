<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Http\Requests\NovaRequest;

class CompradorOnsite extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\Onsite\CompradorOnsite::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'apellido';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'apellido',
    ];

    public static $orderBy = ['apellido' => 'asc'];

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

            BelongsTo::make('company'),
            Text::make('nombre'),
            Text::make('primer_nombre'),
            Text::make('apellido'),
            Text::make('dni'),
            Select::make('pais')->options(
                [
                    'Argentina' => 'Argentina',
                    'Brasil' => 'Brasil',
                    'Bolivia' => 'Bolivia',
                    'Chile' => 'Chile',
                    'Paraguay' => 'Paraguay',
                    'Peru' => 'Peru',
                    'Uruguay' => 'Uruguay',

                ]
            ),            
            
            BelongsTo::make('Provincia'),
            
            BelongsTo::make('LocalidadOnsite'),
            
            Text::make('localidad_texto'),
            Text::make('domicilio'),
            Text::make('codigo_postal'),
            Text::make('email'),
            Text::make('celular'),
            Text::make('telefono'),
            Textarea::make('observaciones'),
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

    /**
     * Build a "relatable" query for the given resource.
     *
     * This query determines which instances of the model may be attached to other resources.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public static function relatableQuery(NovaRequest $request, $query)
    {
        return $query->where('activo', true);
    }    
}
