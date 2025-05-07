<?php

namespace App\Console\Commands;

use App\Models\Config\PlantillaMail;
use App\Models\EmpresaInstaladora\EmpresaInstaladoraOnsite;
use App\Models\Onsite\EmpresaOnsite;
use App\Models\Onsite\LocalidadOnsite;
use App\Models\Onsite\ObraOnsite;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class editPlantillaMailRepuestos extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'seeder:editPlantillaMailRepuestos';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Ajusta el body de la Plantilla de repuestos';

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
                            <p><strong>Estimado/a Cliente: %NOMBRE_SOLICITANTE%</strong></p>
                            <p>Confirmamos la realizaci&oacute;n de un nuevo pedido de Repuestos. El mismo se ha procesado correctamente y se encuentra en <strong>%ESTADO_PEDIDO%</strong>.</p>
                            <p>Se env&iacute;a a continuaci&oacute;n el detalle para su constancia.</p>
                    
                    
                            <table class="customers">
                                <tbody>
                                    <tr>
                                        <td><strong>Orden de Pedido N&ordm;</strong></td>
                                        <td>%ID_ORDEN_PEDIDO%</td>
                                    </tr>
                                    <tr>
                                        <td>
                    
                                            <p><strong>Fecha</strong></p>
                                        </td>
                                        <td>
                    
                                            <p>%FECHA_PEDIDO%</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                    
                                            <p><strong>Monto</strong></p>
                                        </td>
                                        <td>
                    
                                            <p>%MONTO_ORDEN_PEDIDO%</p>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <hr />
                            <p style="text-align: left;"><strong>Detalle de las piezas solicitadas</strong></p>
                            <table class="customers">
                                <tr>
                                    <th>Código</th>
                                    <th>Pieza</th>
                                    <th>Cant</th>
                                    <th>Precio Unit.</th>
                                    <th>Total</th>
                                    <th>Neto</th>
                                </tr>
                    
                    
                                %PIEZAS_ORDEN_PEDIDO%
                            </table>
                            <br>
                            <br>
                            <hr>
                                <small>%TERMINOS_CONDICIONES%</small>
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
                    
                </html>';

		$plantilla = PlantillaMail::find(PlantillaMail::REPUESTOS_TECNICOS);

        $plantilla->body = $cuerpo;
        $plantilla->save();

        $this->info('Plantilla: '.$plantilla->referencia. '['. $plantilla->id .']' . ' actualizada correctamente');

		
	}
}
