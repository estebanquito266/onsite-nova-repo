<?php

namespace App\Nova;

use App\Nova\Filters\CompanyFilter;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Fields\Text;
use Emilianotisato\NovaTinyMCE\NovaTinyMCE;

class TemplateComprobante extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\Config\TemplateComprobante::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    //public static $title = 'nombre';
    public static $priority = 2;

    public function title()
    {
        return '[' . $this->company_id . '] '  . $this->nombre.' [' . $this->id . '] ';
    }    

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'company_id', 
        'nombre', 
        'cuerpo', 
        'tipo_comprobante'
    ];

    public static $orderBy = ['tipo_comprobante' => 'asc', 'nombre' => 'asc'];

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
            Text::make('Nombre')
                ->sortable()
                ->rules('required', 'max:255'),

            Select::make('tipo_comprobante')->options([
                'i' => 'ingreso',
                's' => 'salida',
            ])->displayUsingLabels(), 
            
                NovaTinyMCE::make('Cuerpo')
                ->help(
                    '<div class="container-fluid">	
                    <h1>Variables usadas</h1>
                    <div class="row">
                                        <div class="col-sm-4">%IMAGEN_HEADER%</div>
                                        <div class="col-sm-4">%TIPO_INGRESO%</div>
                                        <div class="col-sm-4">%FECHA_INGRESO%</div>
                                        <div class="col-sm-4">%ORDEN_TRABAJO%</div>
                                        <div class="col-sm-4">%ID%</div>
                                        <div class="col-sm-4">%NRO_RECLAMO%</div>
                                        <div class="col-sm-4">%NOMBRE%</div>
                                        <div class="col-sm-4">%DNI_CUIT%</div>
                                        <div class="col-sm-4">%EMAIL%</div>
                                        <div class="col-sm-4">%TELEFONO%</div>
                                        <div class="col-sm-4">%DOMICILIO%</div>
                                        <div class="col-sm-4">%BARRIO%</div>
                                        <div class="col-sm-4">%CODIGO_POSTAL%</div>
                                        <div class="col-sm-4">%LOCALIDAD%</div>
                                        <div class="col-sm-4">%NRO_FACTURA_COMPRA%</div>
                                        <div class="col-sm-4">%MARCA%</div>
                                        <div class="col-sm-4">%FECHA_COMPRA%</div>
                                        <div class="col-sm-4">%MODELO%</div>
                                        <div class="col-sm-4">%CASA_VENDEDORA%</div>
                                        <div class="col-sm-4">%NRO_SERIE%</div>
                                        <div class="col-sm-4">%FALLA_DETECTADA_CLIENTE%</div>
                                        <div class="col-sm-4">%OBSERVACION%</div>
                                        <div class="col-sm-4">%OTROS_ACCESORIOS%</div>
                                        <div class="col-sm-4">%FIRMA_INGRESO%</div>
                                        <div class="col-sm-4">%FIRMA_SALIDA%</div>
                                        <div class="col-sm-4">%QUIEN_RETIRO%</div>
                                        <div class="col-sm-4">%FECHA_SALIDA%</div>
                                        <div class="col-sm-4">%DIAGNOSTICO%</div>
                                        <div class="col-sm-4">%TRABAJO_REALIZADO%</div>
                                        <div class="col-sm-4">%RESUELTO%</div>
                                        <div class="col-sm-4">%FECHA_ENTREGAR%</div>
                                        <div class="col-sm-4">%CODIGO_BARRA%</div>
                                        <div class="col-sm-4">%PANTALLA_ESTADO%</div>
                                        <div class="col-sm-4">%CARCAZA_ESTADO%</div>
                            
                    </div>
                    <p><br></p>
                </div>'
            ),

           
            
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
