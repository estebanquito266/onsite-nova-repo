<?php

namespace App\Console\Commands;

use App\Models\Onsite\EmpresaOnsite;
use App\Models\Onsite\ObraOnsite;
use App\Models\Onsite\SistemaOnsite;
use App\Models\Onsite\SolicitudOnsite;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class insertActivoToObrasUnificadas extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'seeder:insertActivoToObrasUnificadas';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Se recorren las obras y se da true a las unificadas';

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

            $this->info('Obra consultada correctamente. Obra ID: ' . $obra->id);
            $this->info('');

            
            if ($obra->id == $obra->id_unificado) {
                
               
                $obra->activo = true;
                $obra->save();

                $this->info('Obra  actualizado correctamente. Estado ACTIVO. Obra ID: ' . $obra->id);
                $this->info('');
            }

            else
            {
                $obra->activo = false;
                $obra->save();

                $this->info('Obra  actualizado correctamente. Estado IN-ACTIVO. Obra ID: ' . $obra->id);
                $this->info('');
            }

        }
    }
}
