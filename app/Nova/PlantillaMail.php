<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;
use Emilianotisato\NovaTinyMCE\NovaTinyMCE;


class PlantillaMail extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\Config\PlantillaMail::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    //public static $title = 'subject';

    public function title()
    {
        return '[' . $this->company_id . '] ' . $this->referencia. '[' . $this->id . '] ' ;
    }

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id',
        'referencia',
        'from',
        'from_nombre',
        'subject',
        'body',
        'cc',
        'cc_nombre',
        'plantilla_mail_base',
        'body_txt',
        'company_id'
    ];

    public static $orderBy = ['id' => 'asc'];

    /**
     * The logical group associated with the resource.
     *
     * @var string
     */
    public static $group = 'Mail';

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

            Text::make('Referencia')
                ->sortable()
                ->rules('max:255'),

            Text::make('Subject')
                ->hideFromIndex()
                ->rules('required', 'max:255'),

            Text::make('From')
                ->sortable()
                ->rules('required', 'max:255'),

            Text::make('From nombre')
                ->hideFromIndex()
                ->rules('required', 'max:255'),

            /*
            Text::make('Body')
                ->hideFromIndex()
                ->asHtml(),
                */
            NovaTinyMCE::make('Body'),

            Textarea::make('Body txt', 'body_txt')
                ->rules('required')
                ->hideFromIndex(),

            Text::make('Cc')
                ->hideFromIndex()
                ->rules('required', 'max:255'),

            Text::make('Cc nombre', 'cc_nombre')
                ->hideFromIndex()
                ->rules('required', 'max:255'),



            Boolean::make('Plantilla mail base')->sortable(),


            /* HasMany::make('ProveedorLogistico', 'proveedores_logisticos'), */
            HasMany::make('Parametro', 'parametros'),
            /* HasMany::make('Parametro Sitio Web', 'parametros_sitio_web'),
            HasMany::make('Template Mail', 'templates_mail'),

            HasMany::make('Estado Derivacion', 'estados_derivacion'),
            HasMany::make('Motivo Cancelacion Derivacion', 'motivos_cancelacion_derivacion'),
            HasMany::make('Motivo Interes Derivacion', 'motivos_interes_derivacion'), */

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
        return [];
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
