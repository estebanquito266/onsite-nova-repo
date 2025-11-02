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

           

            new Panel('Retiro', [
              
            ]),

            BelongsToMany::make('Users', 'usuarios'),

   
            HasMany::make('Empresa Onsite', 'empresas_onsite'),
       

            HasMany::make('Estado Onsite', 'estados_onsite'),

            HasMany::make('Nivel Onsite', 'niveles_onsite'),


            HasMany::make('Rol Perfil', 'roles_perfiles'),

            HasMany::make('Reason Ticket Onsite', 'reasons_ticket_onsite', ReasonTicketOnsite::class),
      
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
