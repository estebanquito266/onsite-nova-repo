<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TemplateVisitaSeeder extends Seeder
{
	/**
	 * 
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$cuerpo_template = 
		'<html>
			
			<body>
			
			
			<div style="text-align: center;"><strong><img src="https://onsite.speedup.com.ar/imagenes/bghmit.png" alt="" /></strong></div>
			<p style="text-align: center;">&nbsp;</p>
			<p style="text-align: center;"><strong>Certificado De Inspección</strong></p>
			<p style="text-align: center;">&nbsp;</p>
			<p>El día <strong>%FECHA_VISITA%.</strong> en la Obra <strong>%OBRA%.</strong> ubicada en la calle <strong>%DOMICILIO_OBRA%.</strong> de la ciudad de <strong>%LOCALIDAD_OBRA%.</strong>
			se realizó la <strong>%TIPO_SOLICITUD%.</strong> del sistema <strong>%SISTEMA_ONSITE%.</strong>
			
			<p style="text-align: center;">&nbsp;</p>
			<p style="text-align: center;"><strong><u>Detalle de la Inspección</u></strong></p>
			<p style="text-align: center;">&nbsp;</p>
			<p><strong>%DETALLE_VISITA%</strong></p>
			<p>&nbsp;</p>
			
			<p style="text-align: center;">&nbsp;</p>
			<p style="text-align: center;"><strong><u>Observaciones/Recomendaciones/correcciones</u></strong></p>
			<p><strong>%OBSERVACIONES_VISITA%</strong></p>
			<p>&nbsp;</p>
			
			<p style="text-align: center;">&nbsp;</p>
			<p style="text-align: center;"><strong><u>Resultado de la VISITA</u></strong></p>
			<p><strong>%RESULTADO_VISITA%</strong></p>
			<p>&nbsp;</p>
			
			
			<p>&nbsp;</p>
			<p>&nbsp;</p>
			<p><strong>BGH Eco Smart</strong></p>
			<p><strong>Av. Brasil 731, C1154 CABA</strong></p>
			<p>&nbsp;</p>
			
			
			</body>
		
		</html>';

		DB::table('templates_comprobantes')->insert([
			'company_id' => 2,
			'tipo_comprobante' => 'i',
			'nombre' => 'Comprobante Visitas',
			'cuerpo' => $cuerpo_template,

		]);

	}
}
