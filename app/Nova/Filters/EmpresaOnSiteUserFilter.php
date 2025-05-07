<?php

namespace App\Nova\Filters;

use App\Models\Admin\Perfil;
use App\Models\Onsite\EmpresaOnsite;
use Illuminate\Http\Request;
use Laravel\Nova\Filters\BooleanFilter;
use App\Models\Admin\User;

class EmpresaOnSiteUserFilter extends BooleanFilter
{
    
    /**
     * The displayable name of the filter.
     *
     * @var string
     */
    public $name = 'Tecnico';
    public $component = 'select-filter';

    /**
     * Apply the filter to the given query.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @param  mixed  $value
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function apply(Request $request, $query, $value)
    {
        return $query->where('tecnico_id', $value);
        
    }

    /**
     * Get the filter's available options.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function options(Request $request)
    {
        /*$users = User::pluck('id', 'name' );*/
        
        $prefil_id = Perfil::PERFIL_TECNICO_ONSITE;;
        
        $users = User::whereHas('perfiles_usuarios',function($query) use ($prefil_id){
            $query->where('id_perfil',$prefil_id);
        })->orderBy('name', 'asc')->pluck('id', 'name' );
             
        return $users;
    }
    
    /**
     * The default value of the filter.
     *
     * @var string
     */
    public function default()
    {
        
    }

}
