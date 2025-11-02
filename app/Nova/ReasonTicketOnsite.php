<?php

namespace App\Nova;

use App\Models\Admin\Company;
use App\Models\Onsite\GroupTicketOnsite;
use App\Models\Onsite\ReasonTicketOnsite as OnsiteReasonTicketOnsite;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;

class ReasonTicketOnsite extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\Onsite\ReasonTicketOnsite::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'name';
    public static $group = 'Ticket';


    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = ['id', 'name'];

    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function fields(Request $request)
    {

        /*
            Caso 1 Si se crea desde el listado de company permite elegir el grupo de ticket porque se conoce el Company y este es solo readOnly.
            Caso 2 Si se crea desde el listado de reasons permite elegir solo el company, luego hay que ir a editar si se quiere asignar un grupo.
            Caso 3 Si se edita desde el listado de company permite elegir el grupo de ticket porque se conoce el Company y este es solo readOnly.

            Caso 4 si se quiere editar un Reason cambiando de company NO esta permitido, es necesario eliminar y crear uno nuevo.
        */
        if($request->editMode=="create" && !empty($request->viaResource) && !empty($request->viaResourceId)){
            $company = Company::find($request->viaResourceId);

            return [
                ID::make()->sortable(),
                
                Select::make('Company', 'company_id')
                    ->options([$company->id => $company->nombre])
                    ->displayUsingLabels()
                    ->withMeta(['value' => $company->id])
                    ->hideWhenUpdating()
                    ->readonly(true)->rules('required'),
    
      
                Select::make('GroupTicketOnsite', 'group_ticket_id')
                    ->options(function () use ($request) {
                                        $companyId = $request->input('viaResourceId') ?? $this->company_id;

                                        if ($companyId) {
                                            return GroupTicketOnsite::where('company_id', $companyId)->get()->pluck('name','id');
                                        }

                                        return [];
                                    })
                    ->displayUsingLabels()
                    ->hideFromIndex(),
             


                Text::make('Name', 'name'),
                Boolean::make('Active', 'active'),
    
            ];
        }

        if ($request->editMode === 'create') {
            return [
                ID::make()->sortable(),
                BelongsTo::make('Company', 'company'),
                Text::make('Name', 'name'),
                Boolean::make('Active', 'active'),
    
            ];
        } elseif ($request->editMode === 'update') {
            return [
                ID::make()->sortable(),
                Select::make('GroupTicketOnsite', 'group_ticket_id')
                    ->options(function () use ($request) {
                                        $companyId = $request->input('viaResourceId') ?? $this->company_id;

                                        if ($companyId) {
                                            return GroupTicketOnsite::where('company_id', $companyId)->get()->pluck('name','id');
                                        }

                                        return [];
                                    })
                    ->displayUsingLabels()
                    ->hideFromIndex(),
                Text::make('Name', 'name'),
                Boolean::make('Active', 'active'),
    
            ];
        }

        return [
                ID::make()->sortable(),
                BelongsTo::make('Company', 'company'),
                Text::make('Name', 'name'),
                Boolean::make('Active', 'active'),
    
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
