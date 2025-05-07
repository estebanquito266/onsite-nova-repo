<?php

namespace App\Console\Commands;

use App\Models\EmpresaInstaladora\EmpresaInstaladoraUser;
use App\Models\Onsite\EmpresaOnsite;
use App\Models\Onsite\ObraOnsite;
use App\Models\Onsite\SolicitudOnsite;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class insertUserIdToSolicitudes extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'seeder:insertUserIdToSolicitudes';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Recorre tabla solicitudes_onsite e inserta user_id, tomando relación con empresa_instaladora_id';

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
            $idEmpresaInstaladora = $solicitud->empresa_instaladora_id;
            $empresa_instaladora_user = EmpresaInstaladoraUser::where('empresa_instaladora_id', $idEmpresaInstaladora)
                                                                ->first();

            if ($empresa_instaladora_user) {
                $idUser = $empresa_instaladora_user->user_id;
                if ($idUser && $idUser > 0) {
                    $solicitud->user_id = $idUser;
                    $solicitud->save();

                    $this->info('Actualizada Solicitud: ' . $solicitud->id . ' - Empresa: ' . $solicitud->empresa_instaladora->nombre . ' - User: ' . $solicitud->user->name);
                } else
                    $this->info('ERROR: no existe usuario para esa empresa instaladora');
            } else {
                $this->info('ERROR. Solicitud no tiene empresa asociada: ' . $solicitud->id);
            }
        }
    }
}
