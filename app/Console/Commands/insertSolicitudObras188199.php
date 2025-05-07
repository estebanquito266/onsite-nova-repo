<?php

namespace App\Console\Commands;

use App\Models\Onsite\EmpresaOnsite;
use App\Models\Onsite\ObraOnsite;
use App\Models\Onsite\SistemaOnsite;
use App\Models\Onsite\SolicitudOnsite;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class insertSolicitudObras188199 extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'seeder:insertSolicitudObras188199';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fix obras sin solicitud';

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

        $obrasOnsite = ObraOnsite::where(
            [
                ['id', '>=', 188],
                ['id', '<=', 199]
            ]
        )->get();

        foreach ($obrasOnsite as $obra) {

            $this->info('Obra consultada correctamente. Obra ID: ' . $obra->id);
            $this->info('');

            $sistema_onsite = SistemaOnsite::create([
                'company_id' => 2,
                'empresa_onsite_id' => $obra->empresa_onsite_id,
                'sucursal_onsite_id' => 1,
                'obra_onsite_id' => $obra->id,
                'nombre' => 'SIS(1) - ' . $obra->nombre,
            ]);


            $this->info('Sistema creada correctamente. Sistema ID: ' . $sistema_onsite->id);
            $this->info('');

            $solicitud = SolicitudOnsite::create([
                'company_id' => 2,
                'obra_onsite_id' => $obra->id,
                'sistema_onsite_id' => $sistema_onsite->id,
                'user_id' => 399,
                'empresa_instaladora_id' => 21,
                'estado_solicitud_onsite_id' => 1,
                'solicitud_tipo_id' => 1

            ]);

            $this->info('Solicitud creada correctamente. Solicitud ID: ' . $solicitud->id);
            $this->info('');
        }
    }
}
