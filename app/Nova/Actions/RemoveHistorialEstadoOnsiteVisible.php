<?php

namespace App\Nova\Actions;

use App\Models\Onsite\HistorialEstadoOnsiteVisiblePorUser;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Collection;
use Laravel\Nova\Actions\DestructiveAction;
use Laravel\Nova\Fields\ActionFields;
use Laravel\Nova\Fields\Date;

class RemoveHistorialEstadoOnsiteVisible extends DestructiveAction
{
    use InteractsWithQueue, Queueable;

    /**
     * Perform the action on the given models.
     *
     * @param  \Laravel\Nova\Fields\ActionFields  $fields
     * @param  \Illuminate\Support\Collection  $models
     * @return mixed
     */
    public function handle(ActionFields $fields, Collection $usuarios)
    {
        $count = 0;
        $countUsersUpdate = 0;
        $countUsers = $usuarios->count();

        //$usuario = $usuarios[0];
        foreach ($usuarios as $usuario) {
            $historiales_estado_onsite_visible = HistorialEstadoOnsiteVisiblePorUser::join('historial_estados_onsite', 'historial_estados_onsite.id', '=', 'historial_estados_onsite_visible_por_user.historial_estados_onsite_id')
            ->select('historial_estados_onsite_visible_por_user.*')
            ->where('historial_estados_onsite_visible_por_user.users_id', $usuario->id)
            ->where('historial_estados_onsite.fecha', '>=', $fields->fecha_desde)
            ->where('historial_estados_onsite.fecha', '<=', $fields->fecha_hasta)
            ->get();

            if ($historiales_estado_onsite_visible->count()) {
                $countUsersUpdate++;
                foreach ($historiales_estado_onsite_visible as $historial_estado_onsite_visible) {
                    $historialEstadoOnsiteVisible = HistorialEstadoOnsiteVisiblePorUser::where('id', $historial_estado_onsite_visible->id)->first();
                    if ($historialEstadoOnsiteVisible) {
                        $historialEstadoOnsiteVisible->delete();
                        $count++;
                    }
                    
                }
            } else {
                if ($countUsers == 1) {
                    return DestructiveAction::danger('No existen Historiales estado onsite visible para el usuario');
                }
            }
        }

        return DestructiveAction::message('Historiales Estado Onsite visibles borrados!. Borrados: ' . $count . ' | Users afectados: ' . $countUsersUpdate);
    }

    /**
     * Get the fields available on the action.
     *
     * @return array
     */
    public function fields()
    {
        return [
            Date::make('Fecha Desde', 'fecha_desde')
                ->rules('required'),
            Date::make('Fecha Hasta', 'fecha_hasta')
                ->rules('required'),
        ];
    }
}
