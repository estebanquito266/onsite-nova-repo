<?php

namespace App\Console\Commands;

use App\Models\Config\Parametro;
use App\Models\Config\PlantillaMail;
use App\Models\EmpresaInstaladora\EmpresaInstaladoraOnsite;
use App\Models\Onsite\EmpresaOnsite;
use App\Models\Onsite\LocalidadOnsite;
use App\Models\Onsite\ObraOnsite;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class insertParamPlantillaMailSolicitudes extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'seeder:insertParamPlantillaMailSolicitudes';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Inserta plantilla y parámetros para un email';

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
        $cuerpo = 
        '<html>

           <head>
               <style>
                   .pie_pagina {
                       background-color: #f2f2f2;
                       text-align: center;
       
                   }
       
                   .header_page {
       
                       font-family: Arial, Helvetica, sans-serif;
                       text-align: center;
                       color: dimgray;
                       font-style: oblique;
                   }
       
                   .centrado {
                       text-align: center;
                   }
       
                   .customers {
                       font-family: Arial, Helvetica, sans-serif;
                       border-collapse: collapse;
                       width: 100%;
                   }
       
                   .customers td,
                   .customers th {
                       border: 1px solid #ddd;
                       padding: 8px;
                   }
       
                   .customers tr:nth-child(even) {
                       background-color: #f2f2f2;
                   }
       
                   .customers th {
                       padding-top: 12px;
                       padding-bottom: 12px;
                       text-align: left;
                       background-color: #354a43;
                       color: white;
                   }
               </style>
           </head>
       
           <body>
       
       
               <div class="customers">
                   <br>
                   <p><img style="display: block; margin-left: auto; margin-right: auto;" src="https://onsite.speedup.com.ar/imagenes/logo_local_BGH_22411_BGHEccosmart.png" alt="" width="250" height="43" /></p>
                   <br>
                   <p><strong>Estimado/a</strong></p>
                   <p>Confirmamos la SOLICITUD de inspección de sistema de acuerdo al siguiente detalle.</p>
       
       
                   <table class="customers">
                       <tbody>
                           <tr>
                               <td><strong>ID SOLICITUD</strong></td>
                               <td>%ID_SOLICITUD%</td>
                           </tr>
                           <tr>
                               <td>
                                   <p><strong>FECHA</strong></p>
                               </td>
                               <td>
                                   <p>%FECHA%</p>
                               </td>
                           </tr>
                           <tr>
                               <td>
                                   <p><strong>TIPO SOLICITUD</strong></p>
                               </td>
                               <td>
                                   <p>%TIPO%</p>
                               </td>
                           </tr>
                           <tr>
                               <td>
                                   <p><strong>EMPRESSA INSTALADORA</strong></p>
                               </td>
                               <td>
                                   <p>%EMPRESA_INSTALADORA%</p>
                               </td>
                           </tr>
                           <tr>
                               <td>
                                   <p><strong>OBRA</strong></p>
                               </td>
                               <td>
                                   <p>%OBRA_ONSITE%</p>
                               </td>
                           </tr>
                           <tr>
                               <td>
                                   <p><strong>SISTEMA</strong></p>
                               </td>
                               <td>
                                   <p>%SISTEMA_ONSITE%</p>
                               </td>
                           </tr>
                           <tr>
                               <td>
                                   <p><strong>OBSERVACIONES</strong></p>
                               </td>
                               <td>
                                   <p>%OBSERVACIONES_INTERNAS%</p>
                               </td>
                           </tr>
                       </tbody>
                   </table>
                   <hr />
       
                   <br>
                   <br>
                   <hr>
       
                   <p class="centrado">
                       <br>
                       <a href="https://ecosmart.bgh.com.ar/">
                           <img src="https://onsite.speedup.com.ar/imagenes/logo_local_BGH_22411_BGHEccosmart.png" width="125" height="21" />
                       </a>
                   </p>
                   <div class="header_page">
       
                       <p>Soluciones eficientes de climatización, iluminación y building management, para empresas, gobiernos y personas.</p>
       
                   </div>
                   <div class="pie_pagina">
                       <br>
                       <p><strong>© %ANIO_DERECHOS% BGH | Todos los derechos reservados.</strong></p>
                       <br>
                   </div>
       
       
       
               </div>
       
       
           </body>
       
       </html>' ;

		$plantilla = PlantillaMail::create([
            'company_id'=>2,
            'from'=> 'avisos@speedup.com.ar',
            'from_nombre'=> 'SpeedUpOnsite',
            'subject' => 'SOLICITUD ONSITE Nº: %ID_SOLICITUD%',
            'body' => $cuerpo,
            'cc' => 'avisos@speedup.com.ar',
            'cc_nombre' => 'Avisos',
            'referencia' => 'Solicitudes Onsite - Administrador',
            'plantilla_mail_base' => 0,
            'body_txt' => $cuerpo
        ]);

        

        $this->info('Plantilla: '.$plantilla->referencia. '['. $plantilla->id .']' . ' creada correctamente');

        $parametro_admin = Parametro::create([
            'company_id'=>2,
            'nombre'=> 'MAIL_ADMINISTRADOR_SOLICITUDES_TO',
            'descripcion'=> '(Email) Correo electrónico al cual se envia el mail de la solicitud',
            'id_tipo_parametro' => 2,
            'id_plantilla_mail_base'=> 30,
            'tipo_valor'=>'t',
            'valor_numerico'=>null,
            'valor_cadena'=>'infoadmin@speed.com.ar',
            'valor_texto' => '',
            'valor_fecha' => null,
            'valor_boolean' => null,
            'valor_decimal' => null,

        ]);

        $this->info('Parametros MailTO Admin: '.$parametro_admin->nombre. '['. $parametro_admin->id .']' . ' creado correctamente');


        $parametro_plantilla = Parametro::create([
            'company_id'=>2,
            'nombre'=> 'MAIL_ADMINISTRADOR_SOLICITUDES',
            'descripcion'=> '(Id Plantilla Mail) Plantilla de Mail utilizada para el envío de mail a Users Administrador, por notificación de solicitudes',
            'id_tipo_parametro' => 6,
            'id_plantilla_mail_base'=> 30,
            'tipo_valor'=>'n',
            'valor_numerico'=>$plantilla->id,
            'valor_cadena'=>'',
            'valor_texto' => '',
            'valor_fecha' => null,
            'valor_boolean' => null,
            'valor_decimal' => null,

        ]);

        $this->info('Parametros Plantilla mail Solicitud: '.$parametro_plantilla->nombre. '['. $parametro_plantilla->id .']' . ' creado correctamente');

		
	}
}
