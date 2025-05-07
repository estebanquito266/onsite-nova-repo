<?php

namespace App\Nova\Filters;

use App\Models\Admin\Company;
use Illuminate\Http\Request;
use Laravel\Nova\Filters\Filter;

class CompanyFilter extends Filter
{
    
    /**
     * The displayable name of the filter.
     *
     * @var string
     */
    public $name = 'Company';

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
        return $query->where('company_id', $value);;
    }

    /**
     * Get the filter's available options.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function options(Request $request)
    {
        $companies = Company::pluck('id', 'nombre' );
        return $companies;
    }
}
