<?php

namespace App\Nova;

use App\Nova\Filters\CompanyFilter;
use App\Nova\Filters\EstadoOnsiteFilter;
use App\Nova\Filters\EstadoOnsiteTipoFilter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\BelongsTo;
use Illuminate\Support\Facades\File;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Panel;

class EstadoOnsite extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\Onsite\EstadoOnsite::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    //public static $title = 'nombre';

    public function title()
    {
        return '[' . $this->company_id . '] ' . $this->nombre. ' [' . $this->id . '] ' ;
    }

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'nombre',
        'company_id',
        'card_titulo',
        'card_intro',
        'card_icono',
    ];

    public static $orderBy = [
        'nombre' => 'asc'
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

            Text::make('Nombre')
                ->sortable()
                ->rules('required', 'max:255'),

            Boolean::make('activo')
                ->sortable()
                ->rules('required', 'max:255'),

            Boolean::make('cerrado')
                ->sortable()
                ->rules('required', 'max:255'),

            Select::make('tipo_estado_onsite_id')->options([
                1 => '-Ninguna-',
                2 => 'Coordinada',
                3 => 'Notificada',
                10 => 'Nuevo',
                20 => 'Pendiente de aprobación',
            ])
                ->sortable(),

            Text::make('Card_Titulo')
                ->sortable()
                ->rules('max:255'),

            Text::make('Card_Intro')
                ->hideFromIndex()
                ->rules('max:255'),



            /*
            Image::make('card_icono')
                ->hideFromIndex()
                ->disk('imagenes')
                ->storeAs(function (Request $request) {
                    $name = $this->getCustomFilename('card_icono', $request->card_icono->getClientOriginalName(), $request->nombre);
                    Storage::disk('ftpOnsiteExportImagenes')->put($name, File::get($request->card_icono));
                    return $name;
                }),
                */
            Text::make('Card_Icono')
                ->hideFromIndex()
                ->rules('max:255')
                ->help(
                    '<a href="https://gogo-react.coloredstrategies.com/app/ui/components/icons">gogo-react.coloredstrategies.com</a>'
                ),

            BelongsTo::make('Company')
                ->sortable(),
            HasMany::make('HistorialEstadoOnsite', 'historial_estado_onsite'),
            HasMany::make('ReparacionOnsite', 'reparaciones_onsite'),

            
            new Panel('Plantilla Mail Responsable', [               
                //TODO filtrar solo por users con perfil de técnico onsite
                BelongsTo::make('PlantillaMail',  'plantilla_mail_responsable')
                    ->sortable(),
            ]),

            new Panel('Plantilla Mail Admin', [               
                //TODO filtrar solo por users con perfil de técnico onsite
                BelongsTo::make('PlantillaMail',  'plantilla_mail_admin')
                    ->sortable(),
            ]),


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
            new EstadoOnsiteFilter,
            new EstadoOnsiteTipoFilter,
            new CompanyFilter,
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
