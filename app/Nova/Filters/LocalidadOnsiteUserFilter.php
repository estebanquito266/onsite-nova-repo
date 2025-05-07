<?php

namespace App\Nova\Filters;

use App\Models\Admin\Perfil;
use App\Models\Admin\User;
use Illuminate\Http\Request;
use Laravel\Nova\Filters\Filter;

class LocalidadOnsiteUserFilter extends Filter
{
    public $name = 'Tecnico';

    /**
     * The filter's component.
     *
     * @var string
     */
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
        return $query->where('id_usuario_tecnico', $value);        
    }

    /**
     * Get the filter's available options.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function options(Request $request)
    {
        $prefil_id = Perfil::PERFIL_TECNICO_ONSITE;

        $users = User::whereHas('perfiles_usuarios',function($query) use ($prefil_id){
            $query->where('id_perfil',$prefil_id);
        })->orderBy('name', 'asc')->pluck('id', 'name' );
             
        return $users;
    }
}

