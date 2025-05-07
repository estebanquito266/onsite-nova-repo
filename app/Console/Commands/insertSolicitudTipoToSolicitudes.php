<?php

namespace App\Console\Commands;

use App\Models\Onsite\EmpresaOnsite;
use App\Models\Onsite\ObraOnsite;
use App\Models\Onsite\SolicitudOnsite;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class insertSolicitudTipoToSolicitudes extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'seeder:insertSolicitudTipoToSolicitudes';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Recorre tabla solicitudes_onsite e inserta tipo de solicitud, tomando relación con tabla obra';

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
        $solicitudes_onsite = SolicitudOnsite::all();

        foreach ($solicitudes_onsite as $solicitud) {
            $idObra = $solicitud->obra_onsite_id;
            $obra_onsite = ObraOnsite::find($idObra);

            if ($obra_onsite) {
                $estado = $obra_onsite->estado;                
                if ($estado && $estado > 0) {
                    
                    if($estado <= 50) $tipo_solicitud = 1;
                    if($estado > 50 && $estado < 90) $tipo_solicitud = 2;
                    if($estado >= 90) $tipo_solicitud = 3;
                    
                    $solicitud->solicitud_tipo_id = $tipo_solicitud;
                    $solicitud->save();

                    $this->info('Actualizada Solicitud: ' . $solicitud->id . ' - Estado: ' . $tipo_solicitud);
                } else{
                    $solicitud->solicitud_tipo_id = 1;
                    $solicitud->save();
                    $this->info('ERROR: no existe avance. Se actualiza a primer estado. Solicitud ID: '. $solicitud->id);
                }
            } else {
                $this->info('ERROR. Solicitud no tiene obra asociada: ' . $solicitud->id);
            }
        }
    }
}
