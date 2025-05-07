<?php

namespace App\Console\Commands;

use App\Models\EmpresaInstaladora\EmpresaInstaladoraOnsite;
use App\Models\Onsite\EmpresaOnsite;
use App\Models\Onsite\ObraOnsite;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class insertActivoToEmpresaInstaladora extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'seeder:insertActivoToEmpresaInstaladora';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Recorre tabla empresa instaladora e inserta activo cuando es id unificado';

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
		$empresas = EmpresaInstaladoraOnsite::all();

        foreach ($empresas as $empresa) {

            $this->info('empresa consultada correctamente. empresa ID: ' . $empresa->id);
            $this->info('');

            
            if ($empresa->id == $empresa->id_unificado) {
                
               
                $empresa->activo = true;
                $empresa->save();

                $this->info('empresa  actualizado correctamente. Estado ACTIVO. empresa ID: ' . $empresa->id);
                $this->info('');
            }

            else
            {
                $empresa->activo = false;
                $empresa->save();

                $this->info('empresa  actualizado correctamente. Estado IN-ACTIVO. empresa ID: ' . $empresa->id);
                $this->info('');
            }

        }

		
	}
}
