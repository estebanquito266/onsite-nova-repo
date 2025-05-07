<?php

namespace App\Console\Commands;

use App\Models\Onsite\EmpresaOnsite;
use App\Models\Onsite\ObraOnsite;
use App\Models\Onsite\ReparacionOnsite;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class insertSolicitudTipoIdToReparaciones extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'seeder:insertSolicitudTipoIdToReparaciones';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Recorre tabla reparaciones_onsite e inserta solicitud_tipo según el informe técnico';

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
        $this->info('###############ACTUALIZACION TIPO 1 ####################');


		
        $reparaciones_onsite = ReparacionOnsite::where('informe_tecnico', 'like', '%inspeccion%')
        ->orWhere('informe_tecnico', 'like', '%auditoria%')
        ->get();

        $this->info('Reparacion tipo 1: '. count($reparaciones_onsite));

		foreach ($reparaciones_onsite as $reparacion ) {

                $reparacion->solicitud_tipo_id = 1;
                $reparacion->save();
				$this->info('Actualiza reparacion a solicitud tipo 1: '. $reparacion->id);
			
		}

        $this->info('###############FIN ACTUALIZACION TIPO 1 ####################');



        $this->info('###############ACTUALIZACION TIPO 2 ####################');
		
        $reparaciones_onsite = ReparacionOnsite::where('informe_tecnico', 'like', '%presurizacion%')
        ->orWhere('informe_tecnico', 'like', '%vacio%')
        ->orWhere('informe_tecnico', 'like', '%estanqueidad%')
        ->get();

        $this->info('Reparacion tipo 2: '. count($reparaciones_onsite));

		foreach ($reparaciones_onsite as $reparacion ) {

                $reparacion->solicitud_tipo_id = 2;
                $reparacion->save();
				$this->info('Actualiza reparacion a solicitud tipo 2: '. $reparacion->id);
			
		}

        $this->info('###############FIN ACTUALIZACION TIPO 2 ####################');

        $this->info('###############ACTUALIZACION TIPO 3 ####################');
		
        $reparaciones_onsite = ReparacionOnsite::where('informe_tecnico', 'like', '%marcha%')       
        ->get();

        $this->info('Reparacion tipo 3: '. count($reparaciones_onsite));

		foreach ($reparaciones_onsite as $reparacion ) {

                $reparacion->solicitud_tipo_id = 3;
                $reparacion->save();
				$this->info('Actualiza reparacion a solicitud tipo 3: '. $reparacion->id);
			
		}

        $this->info('###############FIN ACTUALIZACION TIPO 3 ####################');

		
	}
}
