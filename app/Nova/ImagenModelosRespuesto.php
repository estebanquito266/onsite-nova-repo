<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Laravel\Nova\Fields\BelongsTo;

use Illuminate\Support\Facades\File;

use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;

class ImagenModelosRespuesto extends Resource
{
    public static $canImportResource = true;

    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\Respuestos\ImagenModelosRepuestos::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'imagen_despiece';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'imagen_despiece',
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

            BelongsTo::make('Modelo Respuestos Onsite', 'modelo'),     
            
            
            Image::make('Imágen Despiece', 'imagen_despiece')
            ->disk('imagenes')            
            ->storeAs(function (Request $request) {
                $name = $this->getCustomFilename('respuestos', $request->imagen_despiece->getClientOriginalName(), $request->name);
                Storage::disk('ftpSpeedupExportImagenes')->put($name, File::get($request->imagen_despiece));
                Storage::disk('ftpSpeedupOnsiteExportImagenes')->put($name, File::get($request->imagen_despiece));
                return $name;
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
        return [new Actions\ImportImagenesModelos];
    }



}
