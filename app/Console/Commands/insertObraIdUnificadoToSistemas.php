<?php

namespace App\Console\Commands;

use App\Models\Onsite\EmpresaOnsite;
use App\Models\Onsite\ObraOnsite;
use App\Models\Onsite\SistemaOnsite;
use App\Models\Onsite\SolicitudOnsite;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class insertObraIdUnificadoToSistemas extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'seeder:insertObraIdUnificadoToSistemas';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Se inserta el ID único de obras (proceso de eliminar ID repetidas)';

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

        $sistemas = SistemaOnsite::all();

        foreach ($sistemas as $sistema) {

            $this->info('Sistema consultada correctamente. Sistema ID: ' . $sistema->id);
            $this->info('');

            $obraOnsite = ObraOnsite::find($sistema->obra_onsite_id);

            if ($obraOnsite) {
                $idUnificadoObra = $obraOnsite->id_unificado;


                $this->info('Obra consultada correctamente. Obra ID: ' . $obraOnsite->id . ' - Obra Unificada ID: ' . $obraOnsite->id_unificado);
                $this->info('');

                $sistema->obra_onsite_id_unificado = $idUnificadoObra;
                $sistema->obra_onsite_id = $idUnificadoObra;

                $sistema->save();

                $this->info('Sistema  actualizado correctamente. Sistema ID: ' . $sistema->id . ' - Id Obra Unificado: ' . $sistema->obra_onsite_id_unificado);
                $this->info('');
            }

            else
            {
                $this->info('Obra No encontrada ID: ' . $sistema->obra_onsite_id);
                $this->info('');
            }

        }
    }
}
