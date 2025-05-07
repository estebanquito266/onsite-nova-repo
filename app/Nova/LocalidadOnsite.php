<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\DateTime;

use Maatwebsite\LaravelNovaExcel\Actions\DownloadExcel;

use App\Nova\Filters\CompanyFilter;
use App\Nova\Filters\LocalidadOnsiteUserFilter;
use App\Nova\Filters\ProvinciaFilter;
use App\Nova\Filters\NivelFilter;

class LocalidadOnsite extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\Onsite\LocalidadOnsite::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'localidad';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id', 'id_provincia', 'localidad', 'localidad_estandard', 'codigo', 'km', 'id_nivel', 'atiende_desde', 'id_usuario_tecnico'
    ];

    public static $orderBy = ['id_provincia' => 'asc', 'localidad' => 'asc'];

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
            ID::make(__('ID'), 'id')
                ->sortable(),

            BelongsTo::make('Company')
                ->sortable(),

            BelongsTo::make('provincias')
                ->sortable(),

            Text::make('localidad')
                ->sortable(),

            Text::make('localidad_estandard')
                ->sortable(),

            Number::make('Codigo')
                ->sortable()
                ->rules('required', 'max:255'),

            Number::make('km')
                ->sortable(),

            BelongsTo::make('NivelOnsite', 'nivel')
                ->sortable(),

            Text::make('atiende_desde')
                ->sortable(),

            BelongsTo::make('User', 'usuario_tecnico')
                ->sortable(),

            /////////////////////////////////////////////
            /*
            DateTime::make('created_at')->hideFromIndex(),

            DateTime::make('updated_at')->hideFromIndex(),
            */
            HasMany::make('Comprador Onsite', 'comprador_onsite'),
            HasMany::make('Empresa Instaladora Onsite', 'empresa_instaladora_onsite'),
            HasMany::make('Empresa Onsite', 'empresa_onsite'),
            HasMany::make('Obra Onsite', 'obras_onsite'),
            HasMany::make('Sucursal Onsite', 'sucursal_onsite'),

            /* HasMany::make('TerminalOnsite', 'terminales_onsite'), */
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
            new ProvinciaFilter,
            new LocalidadOnsiteUserFilter,
            new NivelFilter
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
            (new DownloadExcel)->withHeadings()->allFields(),
            new Actions\ImportLocalidadesOnsite
        ];
    }
}
