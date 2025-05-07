<?php

namespace App\Console\Commands;

use App\Models\EmpresaInstaladora\EmpresaInstaladoraOnsite;
use App\Models\Onsite\EmpresaOnsite;
use App\Models\Onsite\ObraOnsite;
use App\Models\Onsite\SistemaOnsite;
use App\Models\Onsite\SolicitudOnsite;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class insertEmpInstaladoraIdUnificadoToObras extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'seeder:insertEmpInstaladoraIdUnificadoToObras';

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

        $obras = ObraOnsite::all();

        foreach ($obras as $obra) {

            $this->info('obra consultada correctamente. obra ID: ' . $obra->id);
            $this->info('');

            $empresaInstaladoraOnsite = EmpresaInstaladoraOnsite::find($obra->empresa_instaladora_id);

            if ($empresaInstaladoraOnsite) {
                $idUnificadoEmpresaInst = $empresaInstaladoraOnsite->id_unificado;


                $this->info('Empresa consultada correctamente. Empresa ID: ' . $empresaInstaladoraOnsite->id . ' - Empresa Unificada ID: ' . $empresaInstaladoraOnsite->id_unificado);
                $this->info('');

                $obra->empresa_instaladora_id = $idUnificadoEmpresaInst;
                $obra->save();

                $this->info('obra  actualizado correctamente. obra ID: ' . $obra->id . ' - Id Obra Unificado: ' . $obra->empresa_instaladora_id);
                $this->info('');
            }

            else
            {
                $this->info('Obra No encontrada ID: ' . $obra->obra_onsite_id);
                $this->info('');
            }

        }
    }
}
