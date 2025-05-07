<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\DateTime;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;
use App\Nova\Filters\CompanyFilter;
use App\Nova\Filters\UserFilter;
use App\Nova\Filters\HistorialEstadoOnsiteEstadoOnsiteFilter;

class HistorialEstadoOnsite extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\Onsite\HistorialEstadoOnsite::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    //public static $title = 'id';

    public function title()
    {
        return '[' . $this->id . '] Reparac ' . $this->id_reparacion . ' | Estad ' . $this->id_estado;
    }

    /**
     * Get the displayble label of the resource.
     *
     * @return string
     */
    public static function label()
    {
        return __('Historial Estado Onsite');
    }

    /**
     * Get the displayble singular label of the resource.
     *
     * @return string
     */
    public static function singularLabel()
    {
        return __('Historial Estado Onsite');
    }    


    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id',
        'id_reparacion',
        'id_estado',
        'fecha',
        'observacion',
        'id_usuario',
    ];

    //public static $orderBy = ['nombre' => 'asc'];

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

            Text::make('id_reparacion')
                ->sortable()
                ->rules('required'),

            BelongsTo::make('EstadoOnsite', 'estado_onsite')
                ->sortable(),
            DateTime::make('Fecha')
                ->sortable()
                ->rules('required'),

                Text::make('Observacion', 'observacion'),
            BelongsTo::make('User', 'usuario')
                ->sortable()
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
            new UserFilter,
            new HistorialEstadoOnsiteEstadoOnsiteFilter
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
