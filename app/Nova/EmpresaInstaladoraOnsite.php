<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\BelongsToMany;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Http\Requests\NovaRequest;
use App\Nova\Filters\EmpresasInstaladorasProvinciasFilter;
use App\Nova\Filters\EmpresasInstaladorasLocalidadFilter;

class EmpresaInstaladoraOnsite extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\EmpresaInstaladora\EmpresaInstaladoraOnsite::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'nombre';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'nombre',
    ];

    /**
     * The logical group associated with the resource.
     *
     * @var string
     */
    public static $group = 'INSTALADORA';

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
            Text::make('razon_social'),
            Text::make('cuit'),
            Select::make('tipo_iva')->options([
                'Resp.Inscripto' => 'Resp.Inscripto',
                'Monotributo' => 'Monotributo',
                'Excento' => 'Excento',
                'Otros' => 'Otros'
            ]),
            Text::make('domicilio'),
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

            Text::make('codigo_postal'),

            Text::make('email')->required(),

            Text::make('celular'),
            Text::make('telefono'),
            Text::make('web'),
            Text::make('coordenadas'),
            Textarea::make('observaciones'),

            BelongsToMany::make('user')
                ->fields(function () {
                    return [
                        Select::make('company_id')->options(
                            [
                                1 => 'DEFAULT',
                                2 => 'BGH',

                            ]
                        ),
                    ];
                }),

            BelongsToMany::make('empresa_onsite')->fields(function () {
                return [
                    Select::make('company_id')->options(
                        [
                            1 => 'DEFAULT',
                            2 => 'BGH',

                        ]
                    ),
                ];
            }),


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
            new EmpresasInstaladorasProvinciasFilter,
            new EmpresasInstaladorasLocalidadFilter
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
