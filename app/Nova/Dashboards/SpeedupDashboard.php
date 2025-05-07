<?php

namespace App\Nova\Dashboards;

use Laravel\Nova\Dashboard;

use App\Models\Admin\User;

class SpeedupDashboard extends Dashboard
{
    /**
     * Get the cards for the dashboard.
     *
     * @return array
     */
    public function cards()
    {
        return [
            //
        ];
    }


    /**
     * Get the displayable name of the dashboard.
     *
     * @return string
     */
    public static function label()
    {
        return 'Speedup Dashboard';
    }

    /**
     * Get the URI key for the dashboard.
     *
     * @return string
     */
    public static function uriKey()
    {
        return 'speedup-dashboard';
    }


    /**
     * Get the extra dashboards that should be displayed on the Nova dashboard.
     *
     * @return array
     */
    /*
    protected function dashboards()
    {
        return [
            (new SpeedupDashboard)->canSee(function ($request) {
                return $request->user()->can('viewSpeedupDashboard', User::class);
            }),
        ];
    } 
    */   
}
