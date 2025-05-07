<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class insertsPuestaMarchaOnsite extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'seeder:insertsPuestaMarchaOnsite';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        
        DB::table('parametros')->insert([
            
            [
                'nombre' => 'MAIL_ONSITE_SOLICITUD_TECNICO',
                'descripcion' => '(Id Plantilla Mail) Plantilla de Mail utilizada para informar al técnico asignado de una nueva reparación onsite a partir de una solicitud onsite',
                'id_tipo_parametro' => 6,
                'id_plantilla_mail_base' => 1,
                'tipo_valor' => "n",
                'valor_numerico' => 1,
                'valor_texto' => ''
		    ],
            [
                'nombre' => 'ONSITE_TERMINOS_CONDICIONES',
                'descripcion' => '(Texto) Texto de términos y condiciones, utilizado en la App de Puesta en Marcha Onsite',
                'id_tipo_parametro' => 3,
                'id_plantilla_mail_base' => 1,
                'tipo_valor' => "t",
                'valor_numerico' => 0,
                'valor_texto' => '<h1>Términos y Condiciones</h1>',
            ],
            

            [
                'nombre' => 'MAIL_ONSITE_SOLICITUD_ADMIN',
                'descripcion' => '(Id Plantilla Mail) Plantilla de Mail utilizada para informar aladministrador de una nueva solicitud onsite',
                'id_tipo_parametro' => 6,
                'id_plantilla_mail_base' => 1,
                'tipo_valor' => "n",
                'valor_numerico' => 1,
                'valor_texto' => ''
		    ],

            [
                'nombre' => 'ONSITE_SOLICITUD_ADMIN_EMAIL_TO',
                'descripcion' => '(Email To) Correo Electrónico del responsable de Solicitudes (Onsite)',
                'id_tipo_parametro' => 2,
                'id_plantilla_mail_base' => 1,
                'tipo_valor' => "t",
                'valor_numerico' => 0,
                'valor_texto' => '',
            ]
        ]);
        

        
        DB::table('tipos_servicios_onsite')->insert([
            [
                'id'    =>  50,
                'company_id' => 2,
			    'nombre' => 'Seguimiento de Obra',
		    ],
            [
                'id'    =>  60,
                'company_id' => 2,
                'nombre' => 'Puesta en Marcha',
            ],
            [
                'id'    =>  99,
                'company_id' => 2,
                'nombre' => 'Ninguno',
            ]
        ]);

        

        
        DB::table('tipos_imagenes_onsite')->insert([
            
            [
                'id'    =>  16,
                'company_id' => 2,
			    'nombre' => 'Equipo',
            ],
            [
                'id'    =>  18,
                'company_id' => 2,
			    'nombre' => 'Trabajo',
            ],
            [
                'id'    =>  20,
                'company_id' => 2,
			    'nombre' => 'Unidad Interior',
            ],
            [
                'id'    =>  22,
                'company_id' => 2,
			    'nombre' => 'Corte de cañeria',
            ],
            [
                'id'    =>  24,
                'company_id' => 2,
			    'nombre' => 'Anomalías',
            ],
            [
                'id'    =>  26,
                'company_id' => 2,
			    'nombre' => 'Presurización',
            ],
            [
                'id'    =>  28,
                'company_id' => 2,
			    'nombre' => 'Comprobante de servicio firmado',
            ],
            [
                'id'    =>  30,
                'company_id' => 2,
			    'nombre' => 'Trabajo realizado',
            ],
            

            [
                'id'    =>  50,
                'company_id' => 2,
			    'nombre' => 'Unidades Interiores',
            ],

            [
                'id'    =>  60,
                'company_id' => 2,
			    'nombre' => 'Unidades Exteriores',
            ]

        ]);
        
    }
}
