<?php

namespace App\Console\Commands;

use App\Models\Onsite\EmpresaOnsite;
use App\Models\Onsite\ObraOnsite;
use App\Models\Onsite\SistemaOnsite;
use App\Models\Onsite\SolicitudOnsite;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class insertSistemaOnsiteIdToSolicitudes extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'seeder:insertSistemas';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Recorre tabla solicitudes onsite e inserta el first sistema de cada obra encontrada en el campo nuevo';

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

		foreach ($solicitudes_onsite as $solicitud ) {
			$obraOnsite = $solicitud->obra_onsite_id;
			$sistema_onsite = SistemaOnsite::where('obra_onsite_id', $obraOnsite)->first();

			if ($sistema_onsite) {
				$solicitud->sistema_onsite_id = $sistema_onsite->id;
				$solicitud->save();

				$this->info('Actualizada solicitud: ' . $solicitud->id . ' - Obra: ' . $obraOnsite . ' - solicitud_onsite_id: ' . $sistema_onsite->id);
			}

			else{
				$this->info('ERROR. Solicitud no tiene obra asociada: ' . $solicitud->id );
			}
		}

		
	}
}
