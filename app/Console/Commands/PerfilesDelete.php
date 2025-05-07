<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class PerfilesDelete extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:PerfilesDelete';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete profiles whose name does not include ONSITE';

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

        $this->info("Comenzamos eliminación de perfiles");

        // Confirmar
        if ($this->confirm('¿Deseas continuar con la eliminación de perfiles?')) {

            $notDeleteArrayNames = [
                'Puesta en Marcha', 
                'Repuestos', 
                'Carga Obra Nueva'
            ];
            
            $filterDataCount = DB::table('perfiles')
                        ->where('nombre', 'not like', "%onsite%")
                        ->whereNotIn('nombre', $notDeleteArrayNames)
                        ->count();

            DB::table('perfiles')
            ->where('nombre', 'not like', "%onsite%")
            ->whereNotIn('nombre', $notDeleteArrayNames)->delete();

            $this->info("Eliminación terminada - Registros eliminados {$filterDataCount}");

        }


    }
}
