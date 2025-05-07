<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class ParametrosDelete extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:ParametrosDelete';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete parameters whose name does not include ONSITE';

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

        $this->info("Comenzamos eliminación de parametros");

        // Confirmar
        if ($this->confirm('¿Deseas continuar con la eliminación de parametros?')) {

            $notDeleteArrayNames = [
                'MAIL_ADMINISTRADOR_REPUESTOS', 
                'MAIL_SOLICITANTE_REPUESTOS', 
                'MAIL_ADMINISTRADOR_REPUESTOS_TO', 
                'MAIL_ADMINISTRADOR_REPARACIONES', 
                'MAIL_ADMINISTRADOR_REPARACIONES_TO', 
                'MAIL_ADMINISTRADOR_SOLICITUDES_TO', 
                'MAIL_ADMINISTRADOR_SOLICITUDES'
            ];
            
            $filterDataCount = DB::table('parametros')
                        ->where('nombre', 'not like', "%ONSITE%")
                        ->whereNotIn('nombre', $notDeleteArrayNames)
                        ->count();

            DB::table('parametros')
            ->where('nombre', 'not like', "%ONSITE%")
            ->whereNotIn('nombre', $notDeleteArrayNames)->delete();

            $this->info("Eliminación terminada - Registros eliminados {$filterDataCount}");

        }


    }
}
