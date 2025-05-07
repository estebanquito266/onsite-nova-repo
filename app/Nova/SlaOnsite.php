<?php

namespace App\Nova;

use App\Nova\Filters\CompanyFilter;
use App\Nova\Filters\SlaOnsiteNivelFilter;
use App\Nova\Filters\SlaOnsiteTipoServicioFilter;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\DateTime;

use Maatwebsite\LaravelNovaExcel\Actions\DownloadExcel;

class SlaOnsite extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\Onsite\SlaOnsite::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'codigo';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'codigo',  'id_tipo_servicio', 'id_nivel', 'horas',
    ];

    public static $orderBy = ['id_tipo_servicio' => 'asc', 'id_nivel' => 'asc',];

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
            ID::make(__('ID'), 'codigo')->sortable(),


            Text::make('codigo')
                ->sortable()
                ->rules('required', 'numeric'),

            BelongsTo::make('TipoServicioOnsite', 'tipo_servicio')
                ->sortable(),

            BelongsTo::make('NivelOnsite', 'nivel')
                ->sortable(),



            Number::make('horas')
                ->sortable(),

            BelongsTo::make('Company'),

            /////////////////////////////////////////////




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
            new SlaOnsiteNivelFilter,
            new SlaOnsiteTipoServicioFilter
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
        ];
    }
}
