<?php

namespace App\Console\Commands;

use App\Models\Onsite\SistemaOnsite;
use App\Models\Onsite\SolicitudOnsite;
use App\Models\Onsite\SolicitudVisita;
use App\Models\Onsite\ReparacionOnsite;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class insertSolicitudVisita extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'seeder:insertSolicitudVisita';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'inserta todas las solicitudes visitas';

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
        /*
        Log::info('Inicio => insertSolicitudVisita');
        $bghCompanyId = 2;
        $cont = 0;
        try {
            SolicitudVisita::truncate();
        } catch (\Throwable $th) {
            Log::alert('No se han podido eliminar los registros de la tabla solicitud_visitas');
        }
        
        $sistemas = SistemaOnsite::where('company_id',$bghCompanyId)->get();
        if($sistemas){
            foreach($sistemas as $sistema){
                $solicitudes = $sistema->solicitud_onsite;
                if($solicitudes->count()==1){
                    $solicitud = $solicitudes->first();
                    $visitas = $sistema->reparacion_onsite;
                    foreach($visitas as $visita){
                        SolicitudVisita::create([
                            'solicitud_id' => $solicitud->id,
                            'visita_id' => $visita->id,
                        ]);
                        $cont = $cont + 1;
                    }                    
                }else{
                    $solicitudes = $solicitudes->sortBy('created_at');

                        for ($i = 0; $i < $solicitudes->count() - 1; $i++) {
                            $fechaSolicitudActual = $solicitudes[$i]->created_at;
                            $fechaSolicitudSiguiente = $solicitudes[$i + 1]->created_at;
                            if($sistema->repacion_onsite){
                                $visitas = $sistema->repacion_onsite->whereBetween('created_at', [$fechaSolicitudActual, $fechaSolicitudSiguiente]);
                            
                                foreach ($visitas as $visita) {
                                    SolicitudVisita::create([
                                        'solicitud_id' => $solicitudes[$i]->id,
                                        'visita_id' => $visita->id,
                                    ]);
                                    $cont = $cont + 1;
                                }
                            }
                            
                        }
                }
            }
        }
        */
        
       
        Log::info('Inicio => insertSolicitudVisita');
        $bgh_company_id = 2;
        $cont = 0;
        try {
            SolicitudVisita::truncate();
        } catch (\Throwable $th) {
            Log::alert('No se han podido eliminar los registros de la tabla solicitud_visitas');
        }

        //$reparacion_id = 35023;
        $reparaciones = ReparacionOnsite::where('company_id', $bgh_company_id)->get(); //->where('id', '<',$reparacion_id)->get();

        foreach ($reparaciones as $reparacion) {
            $sistema_id = $reparacion->sistema_onsite_id;
            $sistema = SistemaOnsite::where('id', $sistema_id)->first();

            if ($sistema) {                
                //if ($sistema->obra_onsite) {
                    //if ($sistema->obra_onsite->solicitud_onsite && $sistema->obra_onsite->solicitud_onsite->first()) {
                    if ($sistema->solicitud_onsite) {
                        //$solicitudes = $sistema->obra_onsite->solicitud_onsite;
                        $solicitudes = SolicitudOnsite::where('solicitud_tipo_id', $reparacion->solicitud_tipo_id)
                        ->where('sistema_onsite_id', $sistema->id)
                        ->get();
                        if($solicitudes->count()==1){
                            $solicitud = $solicitudes->first();
                                SolicitudVisita::create([
                                    'solicitud_id' => $solicitud->id,
                                    'visita_id' => $reparacion->id,
                                ]);
                                $cont = $cont + 1;
                            }else{
                                $solicitudes = $solicitudes->sortBy('created_at');
                                $diferenciaFecha = 99999999;
                                $solicitud_id = null;
                                foreach($solicitudes as $solicitud){
                                    if($solicitud->created_at < $reparacion->created_at){
                                        $solicitudFecha =  strtotime($solicitud->created_at);
                                        $visitaFecha =  strtotime($reparacion->created_at);
                                        $fechaDif =  $solicitudFecha - $visitaFecha;
                                        if($fechaDif<$diferenciaFecha){
                                            $diferenciaFecha = $fechaDif;
                                            $solicitud_id = $solicitud->id;
                                        }                                        
                                    }
                                }
                                if($solicitud_id){
                                    SolicitudVisita::create([
                                        'solicitud_id' => $solicitud_id,
                                        'visita_id' => $reparacion->id,
                                    ]);
    
                                    $cont = $cont + 1;
                                }                               
                            }
                    }
                //}
            }
        }
        Log::info('Total registros => Se han creado '.$cont.' registros en la tabla solicitud_visitas');
        Log::info('Fin => insertSolicitudVisita');
    }
}
