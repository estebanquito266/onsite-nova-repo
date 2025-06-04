<?php
namespace Database\Seeders\Onsite;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolTableSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		/*
				//1RA FASE

		DB::table('roles')->insert([
			'id'=> '5',
			'nombre'=> 'HORARIOS-> Horarios',
			'ruta'=> 'horario',
		]);
		DB::table('roles')->insert([
			'id'=> '6',
			'nombre'=> 'HORARIOS-> Registrar',
			'ruta'=> 'registrarHorario',
		]);
		*/
		//-------------------------------------------------------------------//
		/*	
				//2DA FASE
		DB::table('roles')->insert([
			'id'=> '7',
			'nombre'=> 'CLIENTES-> Clientes',
			'ruta'=> 'cliente',
		]);
		DB::table('roles')->insert([
			'id'=> '8',
			'nombre'=> 'CLIENTES-> Equipos',
			'ruta'=> 'equipo',
		]);
		*/

		//-------------------------------------------------------------------//
		/*
				//5TA FASE
		DB::table('roles')->insert([
			'id'=> '21',
			'nombre'=> 'CONFIGURACION-FRONT->Mensajes Web',
			'ruta'=> 'mensajeWeb',
		]);
		DB::table('roles')->insert([
			'id'=> '22',
			'nombre'=> 'CONFIGURACION-FRONT->Mensajes Web x Tipos de Ingresos y Estados',
			'ruta'=> 'mensajeWebTipoIngresoEstado',
		]);
		*/
		//-------------------------------------------------------------------//
		/*
				//6TA FASE
		DB::table('roles')->insert([
			'id'=> '23',
			'nombre'=> 'OPERATORIA->Reparación',
			'ruta'=> 'reparacion',
		]);
		
		DB::table('roles')->insert([
			'id'=> '24',
			'nombre'=> 'OPERATORIA->Historial de Estados',
			'ruta'=> 'historialEstado',
		]);
		
		DB::table('roles')->insert([
			'id'=> '45',
			'nombre'=> 'OPERATORIA->Reparaciones Mercado Pago',
			'ruta'=> 'reparacionMercadoPago',
		]);			
		
		DB::table('roles')->insert([
			'id'=> '25',
			'nombre'=> 'OPERATORIA->Notas',
			'ruta'=> 'nota',
		]);
		
		DB::table('roles')->insert([
			'id'=> '26',
			'nombre'=> 'OPERATORIA->Listar Reparaciones x Tecnicos',
			'ruta'=> 'reparacionTecnico',
		]);
		*/

		//-------------------------------------------------------------------//
		/*
		DB::table('roles')->insert([
			'id'=> '50',
			'nombre'=> 'OPERATORIA->Listar Órdenes de Retiro OCA',
			'ruta'=> 'ordenOca',
		]);		
		
		
		DB::table('roles')->insert([
			'id'=> '60',
			'nombre'=> 'OPERATORIA->Listar Órdenes de Retiro Elocker',
			'ruta'=> 'ordenElocker',
		]);	
		
		
		DB::table('roles')->insert([
			'id'=> '70',
			'nombre'=> 'OPERATORIA->Listar Órdenes de Retiro Correo Argentino',
			'ruta'=> 'ordenCorreoArgentino',
		]);	
		
		
		DB::table('roles')->insert([
			'id'=> '75',
			'nombre'=> 'OPERATORIA->Form Correo Argentino',
			'ruta'=> 'ordenRetiroCorreoArgentino',
		]);			
		

		DB::table('roles')->insert([
			'id'=> '80',
			'nombre'=> 'OPERATORIA->Listar Órdenes de Retiro Domicilio',
			'ruta'=> 'ordenesRetiroDomicilio',
		]);	


		DB::table('roles')->insert([
			'id' => '81',
			'nombre' => 'RETIRO -> Reparaciones Ordenes Retiro Domicilio',
			'ruta' => 'reparacionesAEntregarConOrdenRetiroDomicilio',
		]);

		DB::table('roles')->insert([
			'id' => '82',
			'nombre' => 'RETIRO -> Devolución Ordenes Retiro Domicilio',
			'ruta' => 'ordenesRetiroDomicilioDevolucion',
		]);		
		
		//-------------------------------------------------------------------//	
		
		DB::table('roles')->insert([
			'id'=> '27',
			'nombre'=> 'OPERATORIA->Listar Reparaciones a Diagnosticar',
			'ruta'=> 'reparacionEstadoDiagnosticar',
		]);
		
		DB::table('roles')->insert([
			'id'=> '28',
			'nombre'=> 'OPERATORIA->Listar Reparaciones a Reparar',
			'ruta'=> 'reparacionEstadoReparar',
		]);	
		
		//-------------------------------------------------------------------//
		
		DB::table('roles')->insert([
			'id'=> '29',
			'nombre'=> 'OPERATORIA->Listar Reparaciones a Presupuestar',
			'ruta'=> 'reparacionEstadoPresupuestar',
		]);

		DB::table('roles')->insert([
			'id'=> '30',
			'nombre'=> 'OPERATORIA->Listar Reparaciones Esperando Aproación Presupuesto',
			'ruta'=> 'reparacionEstadoEsperandoAprob',
		]);	

		DB::table('roles')->insert([
			'id'=> '31',
			'nombre'=> 'OPERATORIA->Listar Reparaciones Presupuesto aprobado',
			'ruta'=> 'reparacionEstadoPresupuestoAprob',
		]);		

		DB::table('roles')->insert([
			'id'=> '32',
			'nombre'=> 'OPERATORIA->Listar Reparaciones Pedir repuesto',
			'ruta'=> 'reparacionEstadoPedirRepuesto',
		]);		

		DB::table('roles')->insert([
			'id'=> '33',
			'nombre'=> 'OPERATORIA->Listar Reparaciones Esperando repuesto',
			'ruta'=> 'reparacionEstadoEsperandoRep',
		]);	
	
		DB::table('roles')->insert([
			'id'=> '34',
			'nombre'=> 'OPERATORIA->Listar Reparaciones Canjear',
			'ruta'=> 'reparacionEstadoCanjear',
		]);	

		DB::table('roles')->insert([
			'id'=> '35',
			'nombre'=> 'OPERATORIA->Listar Reparaciones Enviar a Taller Externo',
			'ruta'=> 'reparacionEstadoEnviarTallerExt',
		]);	

		DB::table('roles')->insert([
			'id'=> '36',
			'nombre'=> 'OPERATORIA->Listar Reparaciones Taller Externo',
			'ruta'=> 'reparacionEstadoTallerExterno',
		]);	

		DB::table('roles')->insert([
			'id'=> '37',
			'nombre'=> 'OPERATORIA->Listar Reparaciones Activar',
			'ruta'=> 'reparacionEstadoActivar',
		]);	


		DB::table('roles')->insert([
			'id'=> '38',
			'nombre'=> 'OPERATORIA->Listar Reparaciones Entregar',
			'ruta'=> 'reparacionEstadoEntregar',
		]);					
	
	
		DB::table('roles')->insert([
            'id'=> '40',
            'nombre'=> 'OPERATORIA->Listar Reparaciones Presupuesto rechazado',
            'ruta'=> 'presupuestoRechazado',
        ]);      
		
		
		DB::table('roles')->insert([
            'id'=> '43',
            'nombre'=> 'OPERATORIA->Listar Reparaciones con Servicios Extras pendientes',
            'ruta'=> 'reparacionServicioExtra',
        ]); 	
	
		*/
		//===================================================================//
		/*
		DB::table('roles')->insert([
			'id'=> '339',
			'nombre'=> 'INFORMES->Reporte cliente',
			'ruta'=> 'reporteCliente',
		]);
		
		DB::table('roles')->insert([
			'id'=> '340',
			'nombre'=> 'INFORMES->Reporte reparación',
			'ruta'=> 'reporteReparacion',
		]);	
	
		DB::table('roles')->insert([
			'id'=> '341',
			'nombre'=> 'INFORMES->Reporte estadística técnico',
			'ruta'=> 'reporteEstadisticaTecnico',
		]);			


		DB::table('roles')->insert([
			'id'=> '342',
			'nombre'=> 'INFORMES->Reporte técnico',
			'ruta'=> 'reporteTecnico',
		]);	
	*/
		//===================================================================//
		/*
		DB::table('roles')->insert([
			'id'=> '209',
			'nombre'=> 'CONFIGURACION->Tipos de Ingresos',
			'ruta'=> 'tipoIngreso',
		]);
		DB::table('roles')->insert([
			'id'=> '210',
			'nombre'=> 'CONFIGURACION->Marcas',
			'ruta'=> 'marca',
		]);
		DB::table('roles')->insert([
			'id'=> '211',
			'nombre'=> 'CONFIGURACION->Modelos',
			'ruta'=> 'modelo',
		]);
		DB::table('roles')->insert([
			'id'=> '212',
			'nombre'=> 'CONFIGURACION->Tipos de Equipos',
			'ruta'=> 'tipoEquipo',
		]);		
		
		DB::table('roles')->insert([
			'id'=> '213',
			'nombre'=> 'CONFIGURACION->Repuestos',
			'ruta'=> 'repuesto',
		]);
		DB::table('roles')->insert([
			'id'=> '214',
			'nombre'=> 'CONFIGURACION->Fallas',
			'ruta'=> 'falla',
		]);	
		
		DB::table('roles')->insert([
			'id'=> '215',
			'nombre'=> 'CONFIGURACION->Proveedores',
			'ruta'=> 'proveedor',
		]);
		DB::table('roles')->insert([
			'id'=> '216',
			'nombre'=> 'CONFIGURACION->Talleres Externos',
			'ruta'=> 'tallerExterno',
		]);
		
		DB::table('roles')->insert([
			'id'=> '217',
			'nombre'=> 'CONFIGURACION->Estado',
			'ruta'=> 'estado',
		]);
		
		DB::table('roles')->insert([
			'id'=> '218',
			'nombre'=> 'CONFIGURACION->Tipos Ingresos y Marcas',
			'ruta'=> 'marcaTipoIngreso',
		]);

		DB::table('roles')->insert([
			'id'=> '243',
			'nombre'=> 'CONFIGURACION->Servicios Extras',
			'ruta'=> 'servicioExtra',
		]);				
		*/
		//===================================================================//
		/*
		DB::table('roles')->insert([
			'id'=> '701',
			'nombre'=> 'ADMINISTRACION->Perfiles - Roles y perfil',
			'ruta'=> 'rolPerfil',
		]);
		DB::table('roles')->insert([
			'id'=> '702',
			'nombre'=> 'ADMINISTRACION->Perfiles - Usuario y perfil',
			'ruta'=> 'perfilUsuario',
		]);
		DB::table('roles')->insert([
			'id'=> '703',
			'nombre'=> 'ADMINISTRACION->Sucursales',
			'ruta'=> 'sucursal',
		]);
		DB::table('roles')->insert([
			'id'=> '704',
			'nombre'=> 'ADMINISTRACION->Usuarios',
			'ruta'=> 'usuario',
		]);		
		
		DB::table('roles')->insert([
			'id'=> '719',
			'nombre'=> 'ADMINISTRACION->Templates de Mails',
			'ruta'=> 'templateMail',
		]);	
		
		DB::table('roles')->insert([
			'id'=> '720',
			'nombre'=> 'ADMINISTRACION->Templates de Comprobantes',
			'ruta'=> 'templateComprobante',
		]);			
		
		DB::table('roles')->insert([
			'id'=> '744',
			'nombre'=> 'ADMINISTRACIÓN->Parámetros',
			'ruta'=> 'parametro',
		]);			
		
		DB::table('roles')->insert([
			'id'=> '746',
			'nombre'=> 'ADMINISTRACIÓN->Clientes - Usuarios',
			'ruta'=> 'clienteUsuario',
		]);	

		DB::table('roles')->insert([
			'id'=> '747',
			'nombre'=> 'ADMINISTRACIÓN->Perfiles',
			'ruta'=> 'perfil',
		]);

		DB::table('roles')->insert([
			'id'=> '748',
			'nombre'=> 'ADMINISTRACIÓN->Sucursales x Tipo de Ingresos',
			'ruta'=> 'sucursalTipoIngreso',
		]);				
		
		DB::table('roles')->insert([
			'id'=> '749',
			'nombre'=> 'ADMINISTRACIÓN->Sucursales x Estados',
			'ruta'=> 'sucursalEstado',
		]);				
		
		
		DB::table('roles')->insert([
			'id'=> '751',
			'nombre'=> 'ADMINISTRACIÓN->Multiplicadores Fee',
			'ruta'=> 'multiplicadorFee',
		]);	
		

		DB::table('roles')->insert([
			'id' => '753',
			'nombre' => 'ADMINISTRACIÓN->Descuentos',
			'ruta' => 'descuento',
		]);


		

		DB::table('roles')->insert([
			'id' => '755',
			'nombre' => 'ADMINISTRACIÓN-> Mercado Pago Payments',
			'ruta' => 'mercadoPagoPayments',
		]);
		*/




		//===================================================================//

		/*
		DB::table('roles')->insert([
			'id'=> '901',
			'nombre'=> 'REPARACIONES ONSITE->Localidades Onsite',
			'ruta'=> 'localidadOnsite',
		]);			
		
		
		DB::table('roles')->insert([
			'id'=> '902',
			'nombre'=> 'REPARACIONES ONSITE->Sla Onsite',
			'ruta'=> 'slaOnsite',
		]);			
		
		
		DB::table('roles')->insert([
			'id'=> '903',
			'nombre'=> 'REPARACIONES ONSITE->Reparaciones Onsite',
			'ruta'=> 'reparacionOnsite',
		]);			
		
		DB::table('roles')->insert([
			'id'=> '904',
			'nombre'=> 'REPARACIONES ONSITE->Historial Estados Onsite',
			'ruta'=> 'historialEstadoOnsite',
		]);					
		 
		DB::table('roles')->insert([
			'id'=> '905',
			'nombre'=> 'REPARACIONES ONSITE->Reporte Repaciones Onsite',
			'ruta'=> 'reporteReparacionOnsite',
		]);	
		
		


		
		DB::table('roles')->insert([
			'id'=> '907',
			'nombre'=> 'REPARACIONES ONSITE->Empresa Onsite',
			'ruta'=> 'empresaOnsite',
		]);			
		
		
		DB::table('roles')->insert([
			'id'=> '909',
			'nombre'=> 'REPARACIONES ONSITE->Reparaciones Onsite Facturadas No Liquidadas',
			'ruta'=> 'reparacionOnsiteFacturada',
		]);				
		
		
		
		DB::table('roles')->insert([
			'id'=> '911',
			'nombre'=> 'REPARACIONES ONSITE->Terminal Onsite',
			'ruta'=> 'terminalOnsite',
		]);	
		


		DB::table('roles')->insert([
			'id'=> '915',
			'nombre'=> 'REPARACIONES ONSITE ->Sucursal Onsite',
			'ruta'=> 'sucursalesOnsite',
		]);	
		

		DB::table('roles')->insert([
			'id'=> '918',
			'nombre'=> 'REPARACIONES ONSITE-> Reparaciones Onsite Posnet',
			'ruta'=> 'reparacionOnsitePosnet',
		]);	
		
				

		DB::table('roles')->insert([
			'id'=> '920',
			'nombre'=> 'REPARACIONES ONSITE-> Reparaciones Onsite Pago Fácil',
			'ruta'=> 'reparacionOnsitePagoFacil',
		]);	
		

		DB::table('roles')->insert([
			'id'=> '922',
			'nombre'=> 'REPARACIONES ONSITE-> Reparaciones Onsite Empresa - Activas',
			'ruta'=> 'reparacionOnsiteEmpresaActivas',
		]);	
		
		
		
		//===================================================================//		

		
		DB::table('roles')->insert([
			'id'=> '1001',
			'nombre'=> 'SITIO WEB->Grupos de Equipos',
			'ruta'=> 'grupoEquipo',
		]);			
		
		DB::table('roles')->insert([
			'id'=> '1002',
			'nombre'=> 'SITIO WEB->Parámetros Sitio Web',
			'ruta'=> 'parametroSitioWeb',
		]);			
		
		DB::table('roles')->insert([
			'id'=> '1003',
			'nombre'=> 'SITIO WEB->Servicios',
			'ruta'=> 'servicio',
		]);			
		
		DB::table('roles')->insert([
			'id'=> '1004',
			'nombre'=> 'SITIO WEB->Contratos',
			'ruta'=> 'contrato',
		]);			
		
		DB::table('roles')->insert([
			'id'=> '1005',
			'nombre'=> 'SITIO WEB->Consultas',
			'ruta'=> 'consultaSitio',
		]);			
		
		DB::table('roles')->insert([
			'id'=> '1006',
			'nombre'=> 'SITIO WEB->Consultas Plan Canje',
			'ruta'=> 'consultaPlanCanje',
		]);				
		
		
		
		DB::table('roles')->insert([
			'id'=> '1007',
			'nombre'=> 'SITIO WEB-> Marcas Oficiales',
			'ruta'=> 'marcaOficial',
		]);		
		
		
		DB::table('roles')->insert([
			'id'=> '1008',
			'nombre'=> 'SITIO WEB-> Servicios Habilitados',
			'ruta'=> 'servicioHabilitado',
		]);			
		
		
			
		
		
		DB::table('roles')->insert([
			'id'=> '750',
			'nombre'=> 'ADMINISTRACION-> Plantillas Mails',
			'ruta'=> 'plantillaMail',
		]);			

		//===================================================================//	
		
		DB::table('roles')->insert([
			'id'=> '1009',
			'nombre'=> 'SITIO WEB-> Estados Derivaciones',
			'ruta'=> 'estadoDerivacion',
		]);			
		
		DB::table('roles')->insert([
			'id'=> '1010',
			'nombre'=> 'SITIO WEB-> Derivaciones',
			'ruta'=> 'derivacion',
		]);				
		
		
		DB::table('roles')->insert([
			'id'=> '1011',
			'nombre'=> 'SITIO WEB-> Historial de Estados de Derivaciones',
			'ruta'=> 'historialEstadoDerivacion',
		]);				
		
		DB::table('roles')->insert([
			'id'=> '1012',
			'nombre'=> 'DERIVACIONES-> Clientes Derivaciones',
			'ruta'=> 'clientesDerivaciones',
		]);	
		*/

		DB::table('roles')->insert([
			'id' => '1013',
			'nombre' => 'DERIVACIONES-> Equipos Derivaciones',
			'ruta' => 'equiposDerivaciones',
		]);

		/* DB::table('roles')->insert([
			'id' => '1015',
			'nombre' => 'DERIVACIONES-> Turnos',
			'ruta' => 'turnos',
		]); */


		/* DB::table('roles')->insert([
			'id' => '1017',
			'nombre' => 'DERIVACIONES -> Seguimiento Derivacion',
			'ruta' => 'seguimientoDerivacion',
		]); */


		/*

		

		//===================================================================//	
		
		DB::table('roles')->insert([
			'id'=> '760',
			'nombre'=> 'ADMINISTRACIÓN-> Cuenta Vendedores Mercado Pago',
			'ruta'=> 'cuentasVendedoresMercadoPago',
		]);
		


		DB::table('roles')->insert([
			'id'=> '83',
			'nombre'=> 'RETIRO->Envíos Mercado Pago',
			'ruta'=> 'enviosMercadoPago',
		]);
		
			

		DB::table('roles')->insert([
			'id'=> '85',
			'nombre'=> 'RETIRO->Form Orden Retiro Domicilio',
			'ruta'=> 'ordenRetiroDomicilio',
		]);

    DB::table('roles')->insert([
      'id'=> '87',
			'nombre'=> 'RETIRO -> Orden Retiro TecnoCompro',
			'ruta'=> 'ordenRetiroTecnocompro',
      ]);
    
		DB::table('roles')->insert([
			'id' => '87',
			'nombre' => 'RETIRO -> Orden Retiro TecnoCompro',
			'ruta' => 'ordenRetiroTecnocompro',
		]);



    
		DB::table('roles')->insert([
			'id' => '88',
			'nombre' => 'RETIRO -> Orden Retiro TecnoCompro Form',
			'ruta' => 'ordenRetiroTecnocomproForm',
    ]);
    

    DB::table('roles')->insert([
			'id' => '89',
			'nombre' => 'RETIRO -> Reparacion Orden Retiro Tecnocompro',
			'ruta' => 'reparacionesAEntregarConOrdenRetiroTecnocompro',
    ]);
    
    DB::table('roles')->insert([
      'id' => '90',
			'nombre' => 'RETIRO -> Orden Retiro Tecnocompro Devolucion',
			'ruta' => 'ordenesRetiroTecnocomproDevolucion',
      ]);
    
    DB::table('roles')->insert([
      'id' => '15',
			'nombre' => 'REPARACION - Calculadora Speedup',
			'ruta' => 'calculadoraPresupuestoSpeedup',
    ]);

    DB::table('roles')->insert([
      'id' => '16',
			'nombre' => 'REPARACION - Calculadora Fixup',
			'ruta' => 'calculadoraPresupuestoFixup',
	]);
	*/
	}
}
