<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ParametrosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         /* DB::table('parametros')->insert([
			'nombre'=>'MAIL_ADMINISTRADOR_RESPUESTOS',
			'descripcion'=>'(Id Plantilla Mail) Plantilla de Mail utilizada para el envío de mail a Users Administrador, por Solicitud de Respuetos',
			'id_tipo_parametro'=>6,
			'id_plantilla_mail_base'=>30,
			'tipo_valor'=>"n",
			'valor_numerico'=>1,
			'valor_texto'=>''
		]);
        
        DB::table('parametros')->insert([
			'nombre'=>'MAIL_SOLICITANTE_RESPUESTOS',
			'descripcion'=>'(Id Plantilla Mail) Plantilla de Mail utilizada para el envío de mail a Users, por Solicitud de Respuetos',
			'id_tipo_parametro'=>6,
			'id_plantilla_mail_base'=>30,
			'tipo_valor'=>"n",
			'valor_numerico'=>1,
			'valor_texto'=>''
		]);

		DB::table('parametros')->insert([
			'nombre' => 'MAIL_ADMINISTRADOR_RESPUESTOS_TO',
			'descripcion' => '(Email) Correo electrónico al cual se envia el mail de solicitud de respuestos al administrador',
			'id_tipo_parametro' => 2,
			'id_plantilla_mail_base'=>30,
			'tipo_valor' => "t",
			'valor_cadena' => 'infoadmin@speed.com.ar',
			'valor_texto'=>''
		]); */ 
		/* ---- */

		DB::table('parametros')->insert([
			'company_id'=>2,
			'nombre'=>'MAIL_ADMINISTRADOR_REPARACIONES',
			'descripcion'=>'(Id Plantilla Mail) Plantilla de Mail utilizada para el envío de mail a Users Administrador, por notificación de visitas',
			'id_tipo_parametro'=>6,
			'id_plantilla_mail_base'=>30,
			'tipo_valor'=>"n",
			'valor_numerico'=>266, //id de la plantilla email
			'valor_texto'=>''
		]);

		DB::table('parametros')->insert([
			'company_id'=>2,
			'nombre' => 'MAIL_ADMINISTRADOR_REPARACIONES_TO',
			'descripcion' => '(Email) Correo electrónico al cual se envia el mail de la notificación',
			'id_tipo_parametro' => 2,
			'id_plantilla_mail_base'=>30,
			'tipo_valor' => "t",
			'valor_cadena' => 'patricio.gervasi@bgh.com.ar',
			'valor_texto'=>''
		]); 
    }
}
