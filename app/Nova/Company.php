<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Laravel\Nova\Fields\BelongsToMany;
use Illuminate\Support\Facades\File;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Panel;

class Company extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\Admin\Company::class;

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

    public static $orderBy = ['nombre' => 'asc'];

    /**
     * The logical group associated with the resource.
     *
     * @var string
     */
    public static $group = 'Company';

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

            Image::make('Logo', 'logo')
                ->help('Dimensión del logo: 136x23px')
                ->disk('imagenes')
                ->storeAs(function (Request $request) {
                    $name = $this->getCustomFilename('logo', $request->logo->getClientOriginalName(), $request->nombre);
                    Storage::disk('ftpSpeedupOnsiteExportImagenes')->put($name, File::get($request->logo));
                    return $name;
                }),

            /* new Panel('Derivacion', [
                BelongsTo::make('Sucursal', 'sucursal_default'),
                BelongsTo::make('Estado Derivacion', 'estado_derivacion_default'),
                BelongsTo::make('Servicio', 'servicio_default'),
                BelongsTo::make('User', 'user_default'),
                BelongsTo::make('Grupo Equipo', 'grupo_equipo_smartphone_default'),
                BelongsTo::make('Falla Grupo Equipo', 'falla_grupo_equipo_default'),
                BelongsTo::make('Descuento', 'descuento_default'),
                BelongsTo::make('Motivo Cancelacion Derivacion', 'motivo_cancelacion_derivacion_default'),
                BelongsTo::make('Motivo Interes Derivacion', 'motivo_interes_derivacion_default'),
            ]), */

            /* new Panel('Reparacion', [
                BelongsTo::make('Falla', 'falla_default'),
                BelongsTo::make('Proveedor', 'proveedor_default'),
                BelongsTo::make('Taller Externo', 'taller_externo_default'),
                BelongsTo::make('Marca', 'marca_default'),
                BelongsTo::make('Tipo Equipo', 'tipo_equipo_default'),
                BelongsTo::make('Modelo', 'modelo_default'),
                BelongsTo::make('Color', 'color_default'),
                BelongsTo::make('Operador', 'operador_default'),
            ]), */

            new Panel('Retiro', [
                /* Text::make('Costos Envios', 'retiro_costos_envios')
                ->withMeta(['extraAttributes' => ['placeholder' => 'Ingrese montos enteros separados por coma. Por ej. 999,899,799']]), */
            ]),

            BelongsToMany::make('Users', 'usuarios'),

            /* HasMany::make('Color', 'colores'),
            HasMany::make('Cuenta Vendedor MercadoPago', 'cuentas_vendedor_mercadopago'), */
            //HasMany::make('Elockers Etiqueta', 'elockers_etiquetas', ElockerEtiqueta::class),
            HasMany::make('Empresa Onsite', 'empresas_onsite'),
            /* HasMany::make('Estado Derivacion', 'estados_derivacion'), */

            HasMany::make('Estado Onsite', 'estados_onsite'),
            /* HasMany::make('Falla', 'fallas'),
            HasMany::make('Localidad', 'localidades'),
            HasMany::make('Marca', 'marcas'),
            HasMany::make('Marca Oficial', 'marcas_oficiales'), */

            /* HasMany::make('Mensaje Web', 'mensajes_web'),
            HasMany::make('Metodo Cobro', 'metodos_cobro'),
            HasMany::make('Modelo', 'modelos'),
            HasMany::make('Motivo Rechazo Presupuesto', 'motivos_rechazo_presupuesto'),
            HasMany::make('Multiplicador Fee', 'multiplicadores_fee'), */

            HasMany::make('Nivel Onsite', 'niveles_onsite'),
            /* HasMany::make('Estado', 'estados'),
            HasMany::make('Perfil', 'perfiles'), */

            HasMany::make('Rol Perfil', 'roles_perfiles'),
            /* HasMany::make('Presupuestos Etiquetas', 'presupuestos_etiquetas', PresupuestoEtiqueta::class),
            HasMany::make('Presupuestos Resoluciones', 'presupuestos_resoluciones', PresupuestoResolucion::class), */
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
