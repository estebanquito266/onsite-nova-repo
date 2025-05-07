<?php

namespace App\Nova\Actions;

use App\Models\Onsite\HistorialEstadoOnsite;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Laravel\Nova\Actions\Action;
use Laravel\Nova\Fields\ActionFields;
use Laravel\Nova\Fields\Date;

class AddHistorialEstadoOnsiteVisible extends Action
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
            if ($usuario->perfiles) {
                $perfilOnsite = $usuario->perfiles->where('visualizar_historial_estado_onsite', true)->first();

                if ($perfilOnsite) {
                    if ($usuario->companies && $usuario->companies->first()) {
                        $companyUser = $usuario->companies->first();
                        $historiales_estado_onsite = HistorialEstadoOnsite::where('company_id', $companyUser->id)
                            ->where('fecha', '>=', $fields->fecha_desde)
                            ->where('fecha', '<=', $fields->fecha_hasta);

                        $sysdate = date('Y-m-d H:i:s');

                        $countUsersUpdate++;

                        foreach ($historiales_estado_onsite->get() as $historial_estado_onsite) {
                            $historialEstadoOnsiteVisible = DB::table('historial_estados_onsite_visible_por_user')
                                ->where('users_id', $usuario->id)
                                ->where('historial_estados_onsite_id', $historial_estado_onsite->id)
                                ->first();

                            if (!$historialEstadoOnsiteVisible) {
                                DB::table('historial_estados_onsite_visible_por_user')->insert([
                                    'users_id' => $usuario->id,
                                    'historial_estados_onsite_id' => $historial_estado_onsite->id,
                                    'created_at' => $sysdate,
                                    'updated_at' => $sysdate
                                ]);

                                $count++;
                            }
                        }

                        
                    } else {
                        if ($countUsers == 1) {
                            return Action::danger('Error: usuario sin company');
                        }
                    }
                } else {
                    if ($countUsers == 1) {
                        return Action::danger('Error: usuario sin perfil onsite requerido');
                    }
                }
            } else {
                if ($countUsers == 1) {
                    return Action::danger('Error: usuario sin perfil');
                }
            }
        }

        return Action::message('Historiales Estado Onsite asignados correctamente! Asignadas: ' . $count . ' | Users afectados: ' . $countUsersUpdate);
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
