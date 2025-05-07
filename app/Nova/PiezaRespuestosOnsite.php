<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Laravel\Nova\Fields\BelongsTo;
//use Laravel\Nova\Fields\File;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Laravel\Nova\Fields\BelongsToMany;
use Laravel\Nova\Fields\Currency;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Nova;

class PiezaRespuestosOnsite extends Resource
{

   
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\Respuestos\PiezaRespuestosOnsite::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'part_name';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id',
        'company_id',
        'numero',
        'spare_parts_code',
        'part_name',
        'precio_fob',
        'part_image',
        'description',
        'peso',
        'dimensiones',
        'pia',
        'moneda',
        'stock'
    ];

    /**
     * The logical group associated with the resource.
     *
     * @var string
     */
    public static $group = 'Respuestos';

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
            Text::make('Numero de Pieza', 'numero')
            ->sortable(),
            Text::make('Spare Part Code', 'spare_parts_code')
            ->sortable(),
            Text::make('Part Name', 'part_name')
            ->sortable(),            
            Text::make('Stock', 'stock')
            ->sortable(),
            Textarea::make('Description', 'description')
            ->sortable(),
            /* Currency::make('Precio FOB', 'precio_fob')->locale('en'), */
            Select::make('moneda')->options([
                'dolar' => 'dolar',
                'euro' => 'euro',
                'peso' => 'peso'
            ])
            ->sortable(),
            

            Number::make('Precio FOB', 'precio_fob')
            ->step(0.01)
            ->sortable(),
            
            Image::make('Imágen Pieza', 'part_image')
            ->disk('imagenes')            
            ->storeAs(function (Request $request) {
                $name = $this->getCustomFilename('part_image_respuestos', $request->part_image->getClientOriginalName(), $request->name);
                Storage::disk('ftpSpeedupExportImagenes')->put($name, File::get($request->part_image));
                Storage::disk('ftpSpeedupOnsiteExportImagenes')->put($name, File::get($request->part_image));
                return $name;
            })
            ->sortable(),

            //HasMany::make('Modelo Pieza Onsite', 'modelo_pieza')
            BelongsToMany::make('Modelo Respuestos Onsite'),
            

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
        return [new Actions\ImportPiezas];
    }
}
