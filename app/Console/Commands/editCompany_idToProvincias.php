<?php

namespace App\Console\Commands;

use App\Models\Config\Provincia;
use App\Models\EmpresaInstaladora\EmpresaInstaladoraOnsite;
use App\Models\Onsite\EmpresaOnsite;
use App\Models\Onsite\LocalidadOnsite;
use App\Models\Onsite\ObraOnsite;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class editCompany_idToProvincias extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'seeder:editCompany_idToProvincias';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Recorre tabla provincias y cuando exista company_id = 1, lo cambia por 2';

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
		$provincias = Provincia::all();

        foreach ($provincias as $provincia) {

            $this->info('provincia consultada correctamente. provincia ID: ' . $provincia->id);
            $this->info('');

            
            if ($provincia->company_id == 1) {
                
               
                $provincia->company_id = 2;
                $provincia->save();

                $this->info('provincia  actualizado correctamente.  provincia ID: ' . $provincia->id);
                $this->info('');
            }

            else
            {              

                $this->info('provincia  no fue necesario actualizar.provincia ID: ' . $provincia->id);
                $this->info('');
            }

        }

		
	}
}
