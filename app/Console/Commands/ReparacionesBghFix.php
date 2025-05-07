<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use App\Models\Onsite\ReparacionOnsite;
use App\Models\Onsite\HistorialEstadoOnsite;

class ReparacionesBghFix extends Command
{
    protected $signature = 'reparaciones:bgh-fix';

    protected $description = 'Verificar cantidad total de reparaciones BGH y cantidad de reparaciones BGH modificadas';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $this->info('ReparacionesBghFix - inicio');
        Log::info('ReparacionesBghFix - inicio');

        // Obtener todas las reparaciones con company_id = 2 (BGH)
        $reparaciones = ReparacionOnsite::where('company_id', 2)->get();
        $totalReparaciones = $reparaciones->count();
        $reparacionesModificadas = 0;

        foreach ($reparaciones as $reparacion) {
            // Validar fecha_registracion_coordinacion nula
            if ($reparacion->fecha_registracion_coordinacion === null) {
                // Buscar historial de estado para id_estado = 29
                $historial = HistorialEstadoOnsite::where('id_reparacion', $reparacion->id)
                    ->where('id_estado', 29)
                    ->first();

                if ($historial) {
                    // Establecer el valor de fecha en fecha_registracion_coordinacion
                    $reparacion->fecha_registracion_coordinacion = $historial->fecha;
                    $reparacion->save();
                    $reparacionesModificadas++;
                }
            }

            // Validar fecha_notificado nula
            if ($reparacion->fecha_notificado === null) {
                // Buscar historial de estado para id_estado = 27
                $historial = HistorialEstadoOnsite::where('id_reparacion', $reparacion->id)
                    ->where('id_estado', 27)
                    ->first();

                if ($historial) {
                    // Establecer el valor de fecha en fecha_notificado
                    $reparacion->fecha_notificado = $historial->fecha;
                    $reparacion->save();
                    $reparacionesModificadas++;
                }
            }
        }

        $this->info('Cantidad total de reparaciones: ' . $totalReparaciones);
        $this->info('Cantidad de reparaciones modificadas: ' . $reparacionesModificadas);
        Log::info('Cantidad total de reparaciones: ' . $totalReparaciones);
        Log::info('Cantidad de reparaciones modificadas: ' . $reparacionesModificadas);

        $this->info('ReparacionesBghFix - fin');
        Log::info('ReparacionesBghFix - fin');
    }
}
