<?php

namespace App\Console\Commands;

use App\Models\Onsite\EmpresaOnsite;
use App\Models\Onsite\ObraOnsite;
use App\Models\Onsite\SistemaOnsite;
use App\Models\Onsite\SolicitudOnsite;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class insertSistemaIdToSolicitudes extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'seeder:insertSistemaIdToSolicitudes';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Recorre tabla solicitudes_onsite e inserta sistema_onsite_id, tomando relación con tabla obra';

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
            $sistema_onsite = SistemaOnsite::where('obra_onsite_id', $idObra )
            ->first();

            if ($sistema_onsite) {
                $idSistema = $sistema_onsite->id;
                
                if ($idSistema && $idSistema > 0) {
                    $solicitud->sistema_onsite_id = $idSistema;
                    $solicitud->save();

                    $this->info('Actualizada Solicitud: ' . $solicitud->id . ' - Sistema: ' . $sistema_onsite->nombre);
                } else
                    $this->info('ERROR: no existe sistema para esa obra');
            } else {
                $this->info('ERROR. Solicitud no tiene obra asociada: ' . $solicitud->id);
            }
        }
    }
}
