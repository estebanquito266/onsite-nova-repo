<?php

namespace App\Nova;

use App\Nova\Filters\PerfilPresMontoFilter;
/* use App\Nova\Filters\PerfilPresClaimFilter;
use App\Nova\Filters\PerfilPresFeeFilter; */
use Illuminate\Http\Request;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;

use Laravel\Nova\Http\Requests\NovaRequest;

use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\BelongsToMany;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\Number;
use Maatwebsite\LaravelNovaExcel\Actions\DownloadExcel;

class Perfil extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\Admin\Perfil::class;

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
        'id', 
        'nombre',
        'presupuesto_ver_monto_presupuesto',
        'presupuesto_ver_claim',
        'presupuesto_ver_fee',
        'visualizar_historial_estado_onsite',
        'confirmar_empresa_cerrada_onsite',
    ];

    public static $orderBy = [
        'nombre' => 'asc'
    ];

    /**
     * The logical group associated with the resource.
     *
     * @var string
     */
    public static $group = 'Admin';

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
            Boolean::make('Presupuesto Ver Monto Presupuesto', 'presupuesto_ver_monto_presupuesto')
                ->sortable(),
            Boolean::make('Presupuesto Ver Claim', 'presupuesto_ver_claim')
                ->sortable(),
            Boolean::make('Presupuesto Ver Fee', 'presupuesto_ver_fee')
                ->sortable(),
            Boolean::make('Confirmar Empresa Cerrada Onsite', 'confirmar_empresa_cerrada_onsite')
                ->sortable(),
            Boolean::make('Visualizar Historial Estado Onsite', 'visualizar_historial_estado_onsite')
                ->sortable(),
            Number::make('Descuento respuestos Onsite' , 'descuento_respuestos_onsite')
            ->min(0)
            ->step(0.01),

            BelongsToMany::make('User', 'usuarios'),
            BelongsToMany::make('Rol', 'roles'),
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
            new PerfilPresMontoFilter,
            /* new PerfilPresClaimFilter, */
            /* new PerfilPresFeeFilter */
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
