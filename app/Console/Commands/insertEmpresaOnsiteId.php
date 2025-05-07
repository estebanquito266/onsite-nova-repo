<?php

namespace App\Console\Commands;

use App\Models\Onsite\EmpresaOnsite;
use App\Models\Onsite\ObraOnsite;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class insertEmpresaOnsiteId extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'seeder:insertEmpresaOnsiteId';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Recorre tabla obras_onsite e inserta id, tomando relación de clave';

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
		$obras_onsite = ObraOnsite::all();

		foreach ($obras_onsite as $obra ) {
			$clave = $obra->clave;
			$empresa_onsite = EmpresaOnsite::where('clave', $clave)->first();

			if ($empresa_onsite) {
				$obra->empresa_onsite_id = $empresa_onsite->id;
				$obra->save();

				$this->info('Actualizada obra: ' . $obra->id . ' - Clave: ' . $obra->clave . ' - empresa_onsite_id: ' . $empresa_onsite->id);
			}

			else{
				$this->info('ERROR. Obra no tiene clave asociada: ' . $obra->id . ' - Clave: ' . $obra->clave);
			}
		}

		
	}
}
