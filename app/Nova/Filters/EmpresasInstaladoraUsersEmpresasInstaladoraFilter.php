<?php

namespace App\Nova\Filters;

use App\Models\Admin\Perfil;
use App\Models\Admin\User;
use App\Models\EmpresaInstaladora\EmpresaInstaladoraOnsite;
use App\Models\Onsite\LocalidadOnsite;
use Illuminate\Http\Request;
use Laravel\Nova\Filters\Filter;

class EmpresasInstaladoraUsersEmpresasInstaladoraFilter extends Filter
{
    /**
     * The displayable name of the filter.
     *
     * @var string
     */
    public $name = 'Empresa instaladora';

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
        return $query->where('empresa_instaladora_id', $value);        
    }

    /**
     * Get the filter's available options.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function options(Request $request)
    {
        $users = EmpresaInstaladoraOnsite::pluck('id', 'nombre' );
        return $users;
    }
}
