<?php

namespace App\Console\Commands;

use App\Models\EmpresaInstaladora\EmpresaInstaladoraOnsite;
use App\Models\Onsite\EmpresaOnsite;
use App\Models\Onsite\LocalidadOnsite;
use App\Models\Onsite\ObraOnsite;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class editCompany_idToLocalidades extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'seeder:editCompany_idToLocalidades';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Recorre tabla localidades y cuando exista company_id = 1, lo cambia por 2';

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
		$localidades = LocalidadOnsite::all();

        foreach ($localidades as $localidad) {

            $this->info('localidad consultada correctamente. localidad ID: ' . $localidad->id);
            $this->info('');

            
            if ($localidad->company_id == 1) {
                
               
                $localidad->company_id = 2;
                $localidad->save();

                $this->info('localidad  actualizado correctamente.  localidad ID: ' . $localidad->id);
                $this->info('');
            }

            else
            {              

                $this->info('localidad  no fue necesario actualizar.Localidad ID: ' . $localidad->id);
                $this->info('');
            }

        }

		
	}
}
