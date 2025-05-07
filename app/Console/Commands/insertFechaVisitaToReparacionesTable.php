<?php

namespace App\Console\Commands;

use App\Models\Onsite\EmpresaOnsite;
use App\Models\Onsite\ObraOnsite;
use App\Models\Onsite\ReparacionOnsite;
use App\Models\Onsite\ReparacionVisita;
use App\Models\Onsite\SistemaOnsite;
use App\Models\Onsite\SolicitudOnsite;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class insertFechaVisitaToReparacionesTable extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:insertFechaVisitaToReparacionesTable';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Recorre la tabla visitas e inserta la primer visita y el primer vencimiento en la tabla reparaciones';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->info('inicia proceso');
        $reparaciones = ReparacionOnsite::where('created_at', '>=', '2024-06-01')->get();
        $this->info('Encontradas ' . count($reparaciones) . ' reparaciones');
        $i = 0;
        foreach ($reparaciones as $key => $reparacion) {
            $reparacion_visita = ReparacionVisita::where('reparacion_id', $reparacion->id)->first();
            if ($reparacion_visita) {
                $reparacion->fecha_1_vencimiento = $reparacion_visita->fecha_vencimiento;
                $reparacion->fecha_1_visita = $reparacion_visita->fecha;
                $reparacion->save();
                $i++;
            }
        }

        $this->info('fin proceso. Se procesaron: ' . $i . ' reparaciones');
    }
}
