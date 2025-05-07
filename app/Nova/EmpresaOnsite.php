<?php

namespace App\Nova;

use App\Nova\Filters\CompanyFilter;
use App\Nova\Filters\EmpresaOnSiteUserFilter;
use App\Nova\Filters\EmpresaOnSiteFilter;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\BelongsToMany;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Panel;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Http\Requests\NovaRequest;

class EmpresaOnsite extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\Onsite\EmpresaOnsite::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public function title()
    {
        return '[' . $this->company_id . '] '  . $this->nombre. ' [' . $this->id . '] ';
    }

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'nombre',
    ];

    public static $orderBy = ['nombre' => 'asc'];

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

            Text::make('Clave')
                ->sortable()
                ->rules('required', 'max:255'),

            Text::make('Nombre')
                ->sortable()
                ->rules('required', 'max:255'),



            Select::make('tipo_terminales')->options([
                1 => 'Terminal',
                2 => 'Unidad Interior / Exterior',
            ])->rules('required'),

            new Panel('Técnico', [
                BelongsTo::make('User', 'tecnico')
                    ->sortable(),
                //TODO filtrar solo por users con perfil de técnico onsite
                BelongsTo::make('Plantilla Mail', 'plantilla_mail_asignacion_tecnico')
                    ->sortable(),
            ]),
            new Panel('Responsable', [
                Text::make('Responsable')
                    ->sortable()->rules('required'),
                Text::make('Email del Responsable', 'email_responsable')
                    ->sortable()->rules('required'),
                BelongsTo::make('Plantilla Mail', 'plantilla_mail_responsable')
                    ->sortable()->rules('required'),
            ]),

            Boolean::make('requiere_tipo_conexion_local')
                ->sortable(),

            Boolean::make('generar_clave_reparacion')
                ->sortable(),

            BelongsToMany::make('Users', 'usuarios'),
            BelongsToMany::make('Tipo Servicio Onsite'),

            BelongsToMany::make('Empresa Instaladora Onsite')->fields(function () {
                return [
                    Select::make('company_id')->options(
                        [
                            1 => 'DEFAULT',
                            2 => 'BGH',

                        ]
                    ),
                ];
            }),

            HasMany::make('ReparacionOnsite', 'reparaciones_onsite'),






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
            new EmpresaOnSiteFilter,
            new CompanyFilter,
            new EmpresaOnSiteUserFilter
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
