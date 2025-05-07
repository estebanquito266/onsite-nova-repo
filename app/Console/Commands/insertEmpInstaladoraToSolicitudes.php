<?php

namespace App\Console\Commands;

use App\Models\Onsite\EmpresaOnsite;
use App\Models\Onsite\ObraOnsite;
use App\Models\Onsite\SolicitudOnsite;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class insertEmpInstaladoraToSolicitudes extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'seeder:insertEmpInstaladoraToSolicitudes';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Recorre tabla solicitudes_onsite e inserta empresa_instaladora_id, tomando relación con tabla obra';

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
                $idEmpresaInstaladora = $obra_onsite->empresa_instaladora_id;
                if ($idEmpresaInstaladora && $idEmpresaInstaladora > 0) {
                    $solicitud->empresa_instaladora_id = $idEmpresaInstaladora;
                    $solicitud->save();

                    $this->info('Actualizada Solicitud: ' . $solicitud->id . ' - Empresa: ' . $obra_onsite->empresa_instaladora->nombre . ' - Obra: ' . $obra_onsite->nombre);
                } else
                    $this->info('ERROR: no existe empresa instaladora para esa obra');
            } else {
                $this->info('ERROR. Solicitud no tiene obra asociada: ' . $solicitud->id);
            }
        }
    }
}
