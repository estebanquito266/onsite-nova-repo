<?php

namespace App\Console\Commands;

use App\Models\EmpresaInstaladora\EmpresaInstaladoraOnsite;
use App\Models\Onsite\EmpresaOnsite;
use App\Models\Onsite\LocalidadOnsite;
use App\Models\Onsite\ObraOnsite;
use App\Models\Onsite\SistemaOnsite;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class insertSistemasToObras extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'seeder:insertSistemasToObras';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Recorre tabla obras y si NO existe sistema, lo crea';

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
        $obras = ObraOnsite::where('activo', true)->get();
        $obrasConSistema = [];
            $obrasSinSistema = [];

        foreach ($obras as $obra) {

            $this->info('obra consultada correctamente. obra ID: ' . $obra->id);
            $this->info('');

            $sistema_onsite = SistemaOnsite::where('obra_onsite_id', $obra->id)->get();

            

            if (count($sistema_onsite) > 0) {

                $obrasConSistema [] = [
                    'id' => $obra->id,
                    'nombre' => $obra->nombre,
                    'sistemas' => $sistema_onsite
                ];

                $this->info('obra  con sistema.  obra ID: ' . $obra->id);
                $this->info('');

            } else {
                $obrasSinSistema [] = [
                    'id' => $obra->id,
                    'nombre' => $obra->nombre
                ];

                $this->info('obra  sin sistema.  obra ID: ' . $obra->id);
                $this->info('');
                $this->info('Creando Sistema:');
                $sistema = SistemaOnsite::create([
                    'company_id' => $obra->company_id,
                    'empresa_onsite_id' => $obra->empresa_onsite_id,
                    'sucursal_onsite_id' => 1,
                    'obra_onsite_id' => $obra->id,
                    'obra_onsite_id_unificado' => $obra->id_unificado,
                    'nombre' => ('SIS(1) - '.$obra->nombre),
                    'comentarios' => 'Sistema creado mediante el proceso seeder:insertSistemasToObras'

                ]);

                $this->info('Sistemas Creado correctamente: - ' . $sistema->id . '-' . $sistema->nombre);
                $this->info('');

            }
        }

        
        $this->info('###########obras con sismtema#############');
        foreach ($obrasConSistema as $obra) {
            $this->info($obra['id'] . '-' . $obra['nombre']);
            $this->info('');
        }
        

        $this->info('###############obras sin sistema###############');
        foreach ($obrasSinSistema as $obra) {
            $this->info($obra['id'] . '-' . $obra['nombre']);
            $this->info('');
        }
    }
}
