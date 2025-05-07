<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Config;

class PlantillaMailDelete extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:plantillaMailDelete';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete plantilla mail, according to the PLANTILLAS_MAILS_DELETE_ID variable(.env)';

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
        $plantillasIdsStr = Config::get('app.plantillas_mails_delete_id');
        $plantillasIdsArray = explode(",", $plantillasIdsStr);
        
        if(empty($plantillasIdsStr) || empty($plantillasIdsArray))
        {
            $this->info('No encontramos IDs de plantillas de email a eliminar');
        }
        else
        {
            $this->info("Comenzamos eliminación de registros para las siguientes plantillas {$plantillasIdsStr}");

            // Confirmar
            if ($this->confirm('¿Deseas continuar con la eliminación de plantillas?')) {

                DB::table('plantillas_mails')->whereIn('id', $plantillasIdsArray)->delete();

            }

            $this->info("Eliminación terminada");
        }
    }
}
