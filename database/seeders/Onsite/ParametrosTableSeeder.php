<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ParametrosTableSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{

		/*
		DB::table('parametros')->insert([
			'nombre' => 'MAIL_REPARACION_INGRESO',
			'descripcion' => '(Id Plantilla Mail) Plantilla de Mail utilizada para informar --> Ingreso de Equipo',
			'id_tipo_parametro' => 6,
			'valor_numerico' => 3,
			'id_plantilla_mail_base' => 3,
		]);
		DB::table('parametros')->insert([
			'nombre' => 'MAIL_REPARACION_SALIDA',
			'descripcion' => '(Id Plantilla Mail) Plantilla de Mail utilizada para informar --> Salida de Equipo',
			'id_tipo_parametro' => 6,
			'valor_numerico' => 4,
			'id_plantilla_mail_base' => 3,
		]);

		DB::table('parametros')->insert([
			'nombre' => 'CANTIDAD_DIAS_ESPERANDO_APROB_PRESUP',
			'descripcion' => '',
			'id_tipo_parametro' => 1,
			'id_plantilla_mail_base' => 0,
			'tipo_valor' => "n",
			'valor_numerico' => 30,
		]);

		DB::table('parametros')->insert([
			'nombre' => 'MAIL_SERVICIOS_EXTRAS',
			'descripcion' => '(Id Plantilla Mail) Plantilla de Mail utilizada para ofrecer Servicios Extras',
			'id_tipo_parametro' => 6,
			'tipo_valor' => "n",
			'valor_numerico' => 70,
			'id_plantilla_mail_base' => 50,
		]);

		DB::table('parametros')->insert([
			'nombre' => 'SERVICIOS_EXTRAS_PRODUCTOS_ID',
			'descripcion' => '(Ids de Servicios Extras) Id de Servicios Extras que son Productos (separados por coma)',
			'id_tipo_parametro' => 2,

			'tipo_valor' => "t",
			'valor_cadena' => '10, 11, 12',
		]);

		DB::table('parametros')->insert([
			'nombre' => 'MAIL_OCA',
			'descripcion' => '(Id Plantilla Mail) Plantilla de Mail utilizada para Orden de Retiro OCA',
			'id_tipo_parametro' => 6,
			'tipo_valor' => "n",
			'valor_numerico' => 80,
			'id_plantilla_mail_base' => 80,
		]);

		DB::table('parametros')->insert([
			'nombre' => 'MAIL_OCA_DEVOLUCION',
			'descripcion' => '(Id Plantilla Mail) Plantilla de Mail utilizada para la Devolución de Equipos por OCA',
			'id_tipo_parametro' => 6,
			'tipo_valor' => "n",
			'valor_numerico' => 81,
			'id_plantilla_mail_base' => 80,
		]);

		DB::table('parametros')->insert([
			'nombre' => 'BGH_ID_MARCAS_SMARTPHONES',
			'descripcion' => '(Ids de Marcas) Id de las Marcas de Smartphones a cargo de BGH (separados por coma)',
			'id_tipo_parametro' => 2,
			'tipo_valor' => "t",
			'valor_cadena' => '21, 22, 128',
		]);

		DB::table('parametros')->insert([
			'nombre' => 'MAIL_ELOCKER',
			'descripcion' => '(Id Plantilla Mail) Plantilla de Mail utilizada para Orden de Elocker',
			'id_tipo_parametro' => 6,
			'tipo_valor' => "n",
			'valor_numerico' => 100,
			'id_plantilla_mail_base' => 100,
		]);

		DB::table('parametros')->insert([
			'nombre' => 'MAIL_CORREO_ARGENTINO',
			'descripcion' => '(Id Plantilla Mail) Plantilla de Mail utilizada para Orden de Correo Argentino',
			'id_tipo_parametro' => 6,
			'tipo_valor' => "n",
			'valor_numerico' => 110,
			'id_plantilla_mail_base' => 110,
		]);

		DB::table('parametros')->insert([
			'nombre' => 'MAIL_CORREO_ARGENTINO_DEVOLUCION',
			'descripcion' => '(Id Plantilla Mail) Plantilla de Mail utilizada para la Devolución de Equipos por Correo Argentino',
			'id_tipo_parametro' => 6,
			'tipo_valor' => "n",
			'valor_numerico' => 115,
			'id_plantilla_mail_base' => 110,
		]);

		DB::table('parametros')->insert([
			'nombre' => 'MAIL_CORREO_ARGENTINO_VAIO',
			'descripcion' => '(Id Plantilla Mail) Plantilla de Mail utilizada para Orden de Correo Argentino - VAIO',
			'id_tipo_parametro' => 6,
			'tipo_valor' => "n",
			'valor_numerico' => 120,
			'id_plantilla_mail_base' => 110,
		]);

		DB::table('parametros')->insert([
			'nombre' => 'MAIL_CORREO_ARGENTINO_DEVOLUCION_VAIO',
			'descripcion' => '(Id Plantilla Mail) Plantilla de Mail utilizada para la Devolución de Equipos por Correo Argentino - VAIO',
			'id_tipo_parametro' => 6,
			'tipo_valor' => "n",
			'valor_numerico' => 125,
			'id_plantilla_mail_base' => 110,
		]);

		DB::table('parametros')->insert([
			'nombre' => 'PORCENTAJE_IMPUESTO_GANANCIAS',
			'descripcion' => '(%) Porcentaje de Impuesto a las Ganancias. Es un promedio. Es progresiva.',
			'id_tipo_parametro' => 5,
			'id_plantilla_mail_base' => 0,
			'tipo_valor' => "n",
			'valor_decimal' => 35,
		]);

		DB::table('parametros')->insert([
			'nombre' => 'PORCENTAJE_INGRESOS_BRUTOS',
			'descripcion' => '(%) Porcentaje de Impuesto a las Ganancias. Es un promedio. Varía según la provincia de venta y si es bienes o servicios.',
			'id_tipo_parametro' => 5,
			'id_plantilla_mail_base' => 0,
			'tipo_valor' => "n",
			'valor_decimal' => 4,
		]);

		DB::table('parametros')->insert([
			'nombre' => 'COSTO_HORA_EMPLEADO',
			'descripcion' => '($) Costo por hora de un empleado',
			'id_tipo_parametro' => 5,
			'id_plantilla_mail_base' => 0,
			'tipo_valor' => "n",
			'valor_decimal' => 278.43,
		]);

		DB::table('parametros')->insert([
			'nombre' => 'PERFILES_MONTO_PRESUPUESTO',
			'descripcion' => '(Ids de Perfiles) Id de los perfiles que pueden visualizar el campo monto_presupuesto en Reparaciones (separados por coma)',
			'id_tipo_parametro' => 2,
			'tipo_valor' => "t",
			'valor_cadena' => '2, 4',
		]);

		DB::table('parametros')->insert([
			'nombre' => 'PRESUPUESTO_FEE_BASE',
			'descripcion' => '($) Fee Base',
			'id_tipo_parametro' => 5,
			'id_plantilla_mail_base' => 0,
			'tipo_valor' => "n",
			'valor_decimal' => 1906,
		]);

		DB::table('parametros')->insert([
			'nombre' => 'PRESUPUESTO_FEE_BASE_Q',
			'descripcion' => '($) Fee Base Q',
			'id_tipo_parametro' => 5,
			'id_plantilla_mail_base' => 0,
			'tipo_valor' => "n",
			'valor_decimal' => 1271,
		]);



		DB::table('parametros')->insert([
			'nombre' => 'PRESUPUESTO_COSTO_FINANCIERO',
			'descripcion' => '(%) Porcentaje de Costo Financiero',
			'id_tipo_parametro' => 5,
			'valor_decimal' => 8,
		]);


		DB::table('parametros')->insert([
			'nombre' => 'WHATSAPP_DERIVACION_EN_DOMICILIO',
			'descripcion' => '(Texto) Plantilla texto para enviar mensaje de bienvenida por Whatsapp, para derivaciones con servicio EN DOMICILIO',
			'id_tipo_parametro' => 2,
			'tipo_valor' => "t",
			'valor_cadena' => 'Hola %DERIVACION_NOMBRE%, gracias por elegir nuestro servicio %SERVICIO_NOMBRE%',
		]);

		DB::table('parametros')->insert([
			'nombre' => 'WHATSAPP_DERIVACION_ENVIO_POR_CORREO',
			'descripcion' => '(Texto) Plantilla texto para enviar mensaje de bienvenida por Whatsapp, para derivaciones con servicio ENVÍO POR CORREO',
			'id_tipo_parametro' => 2,
			'tipo_valor' => "t",
			'valor_cadena' => 'Hola %DERIVACION_NOMBRE%, gracias por elegir nuestro servicio %SERVICIO_NOMBRE%',
		]);

		DB::table('parametros')->insert([
			'nombre' => 'WHATSAPP_DERIVACION_SERVICIO_REMOTO',
			'descripcion' => '(Texto) Plantilla texto para enviar mensaje de bienvenida por Whatsapp, para derivaciones con servicio REMOTO',
			'id_tipo_parametro' => 2,
			'tipo_valor' => "t",
			'valor_cadena' => 'Hola %DERIVACION_NOMBRE%, gracias por elegir nuestro servicio %SERVICIO_NOMBRE%',
		]);

		DB::table('parametros')->insert([
			'nombre' => 'WHATSAPP_DERIVACION_YO_LO_LLEVO',
			'descripcion' => '(Texto) Plantilla texto para enviar mensaje de bienvenida por Whatsapp, para derivaciones con servicio YO LO LLEVO',
			'id_tipo_parametro' => 2,
			'tipo_valor' => "t",
			'valor_cadena' => 'Hola %DERIVACION_NOMBRE%, gracias por elegir nuestro servicio %SERVICIO_NOMBRE%',
		]);

		DB::table('parametros')->insert([
			'nombre' => 'WHATSAPP_DERIVACION_HAGALO_USTED_MISMO',
			'descripcion' => '(Texto) Plantilla texto para enviar mensaje de bienvenida por Whatsapp, para derivaciones con servicio HÁGALO USTED MISMO',
			'id_tipo_parametro' => 2,
			'tipo_valor' => "t",
			'valor_cadena' => 'Hola %DERIVACION_NOMBRE%, gracias por elegir nuestro servicio %SERVICIO_NOMBRE%',
		]);

		DB::table('parametros')->insert([
			'nombre' => 'WHATSAPP_DERIVACION_CONSULTA',
			'descripcion' => '(Texto) Plantilla texto para enviar mensaje de bienvenida por Whatsapp, para derivaciones con servicio CONSULTA',
			'id_tipo_parametro' => 2,
			'tipo_valor' => "t",
			'valor_cadena' => 'Hola %DERIVACION_NOMBRE%, gracias por elegir nuestro servicio %SERVICIO_NOMBRE%',
		]);

		DB::table('parametros')->insert([
			'nombre' => 'WHATSAPP_DERIVACION_RETIRO_DOMICILIO',
			'descripcion' => '(Texto) Plantilla texto para enviar mensaje de bienvenida por Whatsapp, para derivaciones con servicio RETIRO DOMICILIO',
			'id_tipo_parametro' => 2,
			'tipo_valor' => "t",
			'valor_cadena' => 'Hola %DERIVACION_NOMBRE%, gracias por elegir nuestro servicio %SERVICIO_NOMBRE%',
		]);

		DB::table('parametros')->insert([
			'nombre' => 'WHATSAPP_DERIVACION_ELOCKER',
			'descripcion' => '(Texto) Plantilla texto para enviar mensaje de bienvenida por Whatsapp, para derivaciones con servicio ELOCKER',
			'id_tipo_parametro' => 2,
			'tipo_valor' => "t",
			'valor_cadena' => 'Hola %DERIVACION_NOMBRE%, gracias por elegir nuestro servicio %SERVICIO_NOMBRE%',
		]);


		DB::table('parametros')->insert([
			'nombre' => 'DIAS_NO_LABORABLES',
			'descripcion' => '(Fechas) Días no laborables en Argentina (separados por coma)',
			'id_tipo_parametro' => 2,
			'tipo_valor' => "t",
			'valor_cadena' => '20200101, 20200224, 20200225, 20200323, 20200324, 20200331, 20200410, 20200501, 20200525, 20200615, 20200520, 20200709, 20200710, 20200817, 20201012, 20201123, 20201207, 20201208, 20201225',
		]);

		DB::table('parametros')->insert([
			'nombre' => 'CANTIDAD_DIAS_A_DIAGNOSTICAR',
			'descripcion' => '(días) Cantidad de días de una reparación en estado A Diagnosticar para pasar al estado Diagnóstico Demorado con Schedule Task',
			'id_tipo_parametro' => 1,
			'id_plantilla_mail_base' => 0,
			'tipo_valor' => "n",
			'valor_numerico' => 10,
		]);


		DB::table('parametros')->insert([
			'nombre' => 'CANTIDAD_DIAS_PRESUPUESTO_RECHAZADO',
			'descripcion' => '(días) Cantidad de días de una reparación en estado Presupuesto Rechazado para pasar al estado Reparar sin Entregar con Schedule Task',
			'id_tipo_parametro' => 1,
			'id_plantilla_mail_base' => 0,
			'tipo_valor' => "n",
			'valor_numerico' => 7,
		]);


		DB::table('parametros')->insert([
			'nombre' => 'MAIL_ORDEN_RETIRO_DOMICILIO_DEVOLUCION_COSTO',
			'descripcion' => '(Id Plantilla Mail) Plantilla de Mail utilizada al generar preferencia MP por costo de envío, para reparaciones A Entregar Sin Reparar',
			'id_tipo_parametro' => 6,
			'id_plantilla_mail_base' => 50,
			'tipo_valor' => "n",
			'valor_numerico' => 1,
		]);

		DB::table('parametros')->insert([
			'nombre' => 'MAIL_REPARACION_DEMORADA',
			'descripcion' => '(Id Plantilla Mail) Plantilla de Mail utilizada para reparaciones demoradas',
			'id_tipo_parametro' => 6,
			'id_plantilla_mail_base' => 50,
			'tipo_valor' => "n",
			'valor_numerico' => 1,
		]);

		DB::table('parametros')->insert([
			'nombre' => 'MAIL_DIAGNOSTICO_DEMORADO',
			'descripcion' => '(Id Plantilla Mail) Plantilla de Mail utilizada para diagnósticos demorados',
			'id_tipo_parametro' => 6,
			'id_plantilla_mail_base' => 50,
			'tipo_valor' => "n",
			'valor_numerico' => 1,
		]);

		DB::table('parametros')->insert([
			'nombre' => 'MAIL_ORDEN_RETIRO_DOMICILIO_DEVOLUCION_REALIZADA',
			'descripcion' => '(Id Plantilla Mail) Plantilla de Mail utilizada para devoluciones realizadas',
			'id_tipo_parametro' => 6,
			'id_plantilla_mail_base' => 50,
			'tipo_valor' => "n",
			'valor_numerico' => 1,
		]);

		DB::table('parametros')->insert([
			'nombre' => 'MAIL_ORDEN_RETIRO_FIXUP_POINT_RECEPCIONADA',
			'descripcion' => '(Id Plantilla Mail) Plantilla de Mail utilizada al recibir un equipo del taller por parte de la sucursal Tecnocompro',
			'id_tipo_parametro' => 6,
			'id_plantilla_mail_base' => 50,
			'tipo_valor' => "n",
			'valor_numerico' => 1,
		]);

		DB::table('parametros')->insert([
			'nombre' => 'MAIL_TURNO_VENCIDO',
			'descripcion' => '(Id Plantilla Mail) Plantilla de Mail utilizada para las notificaciones automáticas de turnos vencidos',
			'id_tipo_parametro' => 6,
			'id_plantilla_mail_base' => 30,
			'tipo_valor' => "n",
			'valor_numerico' => 1,
		]);


		DB::table('parametros')->insert([
			'nombre' => 'MAIL_MERCADOPAGO_REFUND',
			'descripcion' => '(Id Plantilla Mail) Plantilla de Mail utilizada para notificar un refund de mercadopago',
			'id_tipo_parametro' => 6,
			'id_plantilla_mail_base' => 50,
			'tipo_valor' => "n",
			'valor_numerico' => 1,
		]);


		DB::table('parametros')->insert([
			'nombre' => 'PRESUPUESTO_COSTO_FINANCIERO_USD',
			'descripcion' => '(%) Porcentaje de Costo Financiero en USD',
			'id_tipo_parametro' => 5,
			'id_plantilla_mail_base' => 0,
			'tipo_valor' => "n",
			'valor_decimal' => 10,
		]);

		DB::table('parametros')->insert([
			'nombre' => 'PRESUPUESTO_FEE_BASE_USD',
			'descripcion' => '(%) Fee Base en USD',
			'id_tipo_parametro' => 5,
			'id_plantilla_mail_base' => 0,
			'tipo_valor' => "n",
			'valor_decimal' => 100,
		]);

		DB::table('parametros')->insert([
			'nombre' => 'PRESUPUESTO_FEE_BASE_Q_USD',
			'descripcion' => '(%) Fee Base Q en USD',
			'id_tipo_parametro' => 5,
			'id_plantilla_mail_base' => 0,
			'tipo_valor' => "n",
			'valor_decimal' => 50,
		]);



		DB::table('parametros')->insert([
			'nombre' => 'MAIL_DERIVACION_SIN_SERVICIO_SIRENA',
			'descripcion' => '(Id Plantilla Mail) Plantilla de Mail utilizada para el envío de mail a Sirena, para las derivaciones: Sin Servicio',
			'id_tipo_parametro' => 6,
			'id_plantilla_mail_base' => 30,
			'tipo_valor' => "n",
			'valor_numerico' => 1,
		]);



		DB::table('parametros')->insert([
			'nombre' => 'MAIL_DERIVACION_SIN_SERVICIO_CLIENTE',
			'descripcion' => '(Id Plantilla Mail) Plantilla de Mail utilizada para el envío de mail al cliente, para las derivaciones: Sin Servicio',
			'id_tipo_parametro' => 6,
			'id_plantilla_mail_base' => 30,
			'tipo_valor' => "n",
			'valor_numerico' => 1,
		]);


		DB::table('parametros')->insert([
			'nombre' => 'MAIL_ORDEN_RETIRO_DOMICILIO_CANCELADA',
			'descripcion' => '(Id Plantilla Mail) Plantilla de Mail utilizada al cancelar una orden de retiro a domicilio',
			'id_tipo_parametro' => 6,
			'id_plantilla_mail_base' => 30,
			'tipo_valor' => "n",
			'valor_numerico' => 1,
		]);

		DB::table('parametros')->insert([
			'nombre' => 'MAIL_TURNO_INFORMADO_CLIENTE',
			'descripcion' => '(Id Plantilla Mail) Plantilla de Mail utilizada cuando un cliente informa un ingreso (turno vencido)',
			'id_tipo_parametro' => 6,
			'id_plantilla_mail_base' => 30,
			'tipo_valor' => "n",
			'valor_numerico' => 1,
		]);

		DB::table('parametros')->insert([
			'nombre' => 'MAIL_ONSITE_TECNICO',
			'descripcion' => '(Id Plantilla Mail) Plantilla de Mail utilizada para informar al técnico asignado de una nueva reparación onsite',
			'id_tipo_parametro' => 6,
			'id_plantilla_mail_base' => 1,
			'tipo_valor' => "n",
			'valor_numerico' => 1,
		]);

		DB::table('parametros')->insert([
			'nombre' => 'MAIL_TURNO_RECORDATORIO_HOY',
			'descripcion' => '(Id Plantilla Mail) Plantilla de Mail utilizada para enviar un recordatorio de turno',
			'id_tipo_parametro' => 6,
			'id_plantilla_mail_base' => 1,
			'tipo_valor' => "n",
			'valor_numerico' => 1,
		]);

		DB::table('parametros')->insert([
			'nombre' => 'MAIL_REPARACION_ESPERANDO_APROB_PRESUP_RECORDATORIO',
			'descripcion' => '(Id Plantilla Mail) Plantilla de Mail utilizada para enviar un recordatorio de reparación esperando aprob de presup > 1 día',
			'id_tipo_parametro' => 6,
			'id_plantilla_mail_base' => 1,
			'tipo_valor' => "n",
			'valor_numerico' => 1,
		]);

		DB::table('parametros')->insert([
			'nombre' => 'MAIL_ORDEN_RETIRO_DOMICILIO_GENERADA',
			'descripcion' => '(Id Plantilla Mail) Plantilla de Mail utilizada para notificar que el retiro ha sido generado',
			'id_tipo_parametro' => 6,
			'id_plantilla_mail_base' => 1,
			'tipo_valor' => "n",
			'valor_numerico' => 1,
		]);

		*/
		
		/* DB::table('parametros')->insert([
			'nombre' => 'CUENTA_VENDEDOR_MERCADO_PAGO_FIXUP_MARKETPLACE',
			'descripcion' => '(Id) Id de la Cuenta Vendedor Mercado Pago de Fixup Marketplace',
			'id_tipo_parametro' => 1,
			'id_plantilla_mail_base' => 0,
			'tipo_valor' => "n",
			'valor_numerico' => 99,
		]);

		DB::table('parametros')->insert([
			'nombre' => 'CUENTA_VENDEDOR_MERCADO_PAGO_RA',
			'descripcion' => '(Id) Id de la Cuenta Vendedor Mercado Pago de RA',
			'id_tipo_parametro' => 1,
			'id_plantilla_mail_base' => 0,
			'tipo_valor' => "n",
			'valor_numerico' => 103,
		]); */

		DB::table('parametros')->insert([
			'nombre'=>'MAIL_TURNO_VENCIDO_SIRENA',
			'descripcion'=>'(Id Plantilla Mail) Plantilla de Mail utilizada para el envío de mail a Sirena, por Turno Vencido',
			'id_tipo_parametro'=>6,
			'id_plantilla_mail_base'=>30,
			'tipo_valor'=>"n",
			'valor_numerico'=>1,
		]);

		DB::table('parametros')->insert([
			'nombre' => 'MAIL_TURNO_VENCIDO_SIRENA_TO',
			'descripcion' => '(Email) Correo electrónico al cual se envia el mail de turno vencido, de Sirena',
			'id_tipo_parametro' => 2,
			'id_plantilla_mail_base'=>0,
			'tipo_valor' => "t",
			'valor_cadena' => 'fixup-derivaciones@leads.getsirena.com',
		]);

	}
}
