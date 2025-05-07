<?php

namespace App\Console\Commands;

use App\Models\Onsite\EmpresaOnsite;
use App\Models\Onsite\ObraOnsite;
use App\Models\Onsite\SistemaOnsite;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class insertObraOnsiteIdToSistemasOnsite extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'seeder:insertObraOnsiteId';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Recorre tabla sistemas_onsite e inserta obra_onsite_id, tomando relación de empresa_onsite';

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
		$sistemasOnsite = SistemaOnsite::all();

		foreach ($sistemasOnsite as $sistema ) {
			$idEmpresaOnsite = $sistema->empresa_onsite_id;
			
            $obra_onsite = ObraOnsite::where('empresa_onsite_id', $idEmpresaOnsite)->first();

			if ($obra_onsite) {
				$sistema->obra_onsite_id = $obra_onsite->id;
				$sistema->save();

				$this->info('Actualizado sistema: ' . $sistema->id . ' - Nombre: ' . $sistema->nombre . ' - Obra Onsite ID: ' .$obra_onsite->id. ' - ' . $obra_onsite->nombre . ' - Empresa Ons : ' . $obra_onsite->empresa_onsite->nombre);
			}

			else{
				$this->info('ERROR. sistema no tiene empresa asociada: ' . $sistema->id . ' - nombre: ' . $sistema->nombre);
			}
		}

		
	}
}
