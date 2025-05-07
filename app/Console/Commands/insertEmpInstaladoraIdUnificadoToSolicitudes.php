<?php

namespace App\Console\Commands;

use App\Models\EmpresaInstaladora\EmpresaInstaladoraOnsite;
use App\Models\Onsite\EmpresaOnsite;
use App\Models\Onsite\ObraOnsite;
use App\Models\Onsite\SistemaOnsite;
use App\Models\Onsite\SolicitudOnsite;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class insertEmpInstaladoraIdUnificadoToSolicitudes extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'seeder:insertEmpInstaladoraIdUnificadoToSolicitudes';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Se inserta el ID único de empresas instaladoras (proceso de eliminar ID repetidas)';

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

        $solicitudes = SolicitudOnsite::all();

        foreach ($solicitudes as $solicitud) {

            $this->info('solicitud consultada correctamente. solicitud ID: ' . $solicitud->id);
            $this->info('');

            $empresaInstaladoraOnsite = EmpresaInstaladoraOnsite::find($solicitud->empresa_instaladora_id);

            if ($empresaInstaladoraOnsite) {
                $idUnificadoEmpresaInst = $empresaInstaladoraOnsite->id_unificado;


                $this->info('Empresa consultada correctamente. Empresa ID: ' . $empresaInstaladoraOnsite->id . ' - Empresa Unificada ID: ' . $empresaInstaladoraOnsite->id_unificado);
                $this->info('');

                $solicitud->empresa_instaladora_id = $idUnificadoEmpresaInst;
                $solicitud->save();

                $this->info('solicitud  actualizado correctamente. solicitud ID: ' . $solicitud->id . ' - Id solicitud Unificado: ' . $solicitud->empresa_instaladora_id);
                $this->info('');
            }

            else
            {
                $this->info('empresa No encontrada ID: ' . $solicitud->empresa_instaladora_id);
                $this->info('');
            }

        }
    }
}
