<?php

namespace App\Nova\Filters;

use App\Models\Admin\User;
use App\Models\Onsite\LocalidadOnsite;
use Illuminate\Http\Request;
use Laravel\Nova\Filters\Filter;

class EmpresasInstaladoraUsersUsersFilter extends Filter
{
    /**
     * The displayable name of the filter.
     *
     * @var string
     */
    public $name = 'Users';

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
        return $query->where('user_id', $value);        
    }

    /**
     * Get the filter's available options.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function options(Request $request)
    {
        $users = User::pluck('id', 'name' );
        return $users;
    }
}
