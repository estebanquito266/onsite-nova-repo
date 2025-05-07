<?php

namespace App\Nova;

use App\Nova\Filters\CompanyFilter;
use App\Models\Config\TipoParametroSitioWeb;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\Date;
use Laravel\Nova\Fields\DateTime;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;

use Epartment\NovaDependencyContainer\HasDependencies;
use Epartment\NovaDependencyContainer\NovaDependencyContainer;
use Laravel\Nova\Fields\Select;

class Parametro extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\Config\Parametro::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'id';

    public static $priority = 10;

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'nombre',
        'descripcion',
        'id_tipo_parametro',
        'id_plantilla_mail_base',
        'tipo_valor',
        'valor_numerico',
        'valor_cadena',
        'valor_texto',
        'valor_fecha',
        'valor_boolean',
        'valor_decimal',
        'company_id'
    ];

    public static $orderBy = ['nombre' => 'asc'];

    /**
     * The logical group associated with the resource.
     *
     * @var string
     */
    public static $group = 'Company';

    use HasDependencies;

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

            Select::make('tipo_valor')->options([
                'n' => 'n',
                't' => 't',
                
            ]),

            Text::make('Nombre')
                ->sortable()
                ->rules('required', 'max:255'),
            Text::make('Descripcion')
                ->sortable()
                ->rules('required', 'max:255'),
            /* BelongsTo::make('Tipo Parametro Sitio Web', 'tipo_parametro')
                ->sortable(), */

            Number::make('valor_numerico')
                ->hideFromIndex(),
            Number::make('valor_decimal')
                ->hideFromIndex(),
            Text::make('valor_cadena')
                ->hideFromIndex(),
            Text::make('valor_texto')
                ->hideFromIndex(),
            Date::make('valor_fecha')
                ->hideFromIndex(),
            Boolean::make('valor_boolean')
                ->hideFromIndex(),
                
            /*
            NovaDependencyContainer::make([
                Number::make('Valor Numérico', 'valor_numerico')
                    ])->dependsOn('tipo_parametro.id', 1),

            NovaDependencyContainer::make([
                Text::make('Valor Cadena', 'valor_cadena')
                    ])->dependsOn('tipo_parametro.id', 2),    
            
            NovaDependencyContainer::make([
                Text::make('Valor Texto', 'valor_texto')
                    ])->dependsOn('tipo_parametro.id', 3),
            
            NovaDependencyContainer::make([
                Boolean::make('Valor Booleano', 'valor_boolean')
                    ])->dependsOn('tipo_parametro.id', 4),
            
            NovaDependencyContainer::make([
                Number::make('Valor Decimal', 'valor_decimal')
                    ])->dependsOn('tipo_parametro.id', 5),
            
            NovaDependencyContainer::make([
                Date::make('Valor Fecha', 'valor_fecha')
                    ])->dependsOn('tipo_parametro.id', 7),            

            NovaDependencyContainer::make([
            BelongsTo::make('PlantillaMail', 'plantilla_mail_base')
                ->help('Plantilla Mail Base - Variables')
                ->hideFromIndex()
                ])->dependsOn('tipo_parametro.id', 6),
 */
                BelongsTo::make('PlantillaMail', 'plantilla_mail_base')
            ->sortable(),

               
     

            /* HasMany::make('PlantillaMailVariable', 'plantilla_mail_variable'), */
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
            new CompanyFilter
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
