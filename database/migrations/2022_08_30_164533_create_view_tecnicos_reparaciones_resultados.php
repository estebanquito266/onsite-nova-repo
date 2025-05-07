<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateViewTecnicosReparacionesResultados extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement
        ('
        CREATE VIEW `view_tecnicos_reparaciones_resultados` AS
    SELECT 
        `US`.`name` AS `Tecnico`,
        `US`.`id` AS `idTecnico`,
        `EI`.`nombre` AS `EmpInsta`,
        `OB`.`nombre` AS `Obra`,
        `OB`.`id` AS `idObra`,
        SUM(IF((`CH`.`puesta_marcha_satisfactoria` = 1),
            1,
            0)) AS `sin_observaciones`,
        SUM(IF((`CH`.`puesta_marcha_satisfactoria` = 0),
            1,
            0)) AS `sin_resultado`,
        SUM(IF((`CH`.`puesta_marcha_satisfactoria` = 2),
            1,
            0)) AS `con_observaciones`,
        SUM(IF((`CH`.`puesta_marcha_satisfactoria` = 3),
            1,
            0)) AS `rechazada`,
        SUM(IF((`CH`.`puesta_marcha_satisfactoria` = 4),
            1,
            0)) AS `obs_elec`,
        SUM(IF((`CH`.`puesta_marcha_satisfactoria` = 5),
            1,
            0)) AS `obs_mecanica`
    FROM
        (((((`sistemas_onsite` `SI`
        JOIN `obras_onsite` `OB` ON ((`OB`.`id` = `SI`.`obra_onsite_id`)))
        JOIN `empresas_instaladoras_onsite` `EI` ON ((`OB`.`empresa_instaladora_id` = `EI`.`id`)))
        JOIN `reparaciones_onsite` `RE` ON ((`SI`.`id` = `RE`.`sistema_onsite_id`)))
        JOIN `reparacion_checklist_onsite` `CH` ON ((`RE`.`id` = `CH`.`reparacion_onsite_id`)))
        JOIN `users` `US` ON ((`US`.`id` = `RE`.`id_tecnico_asignado`)))
    WHERE
        (`OB`.`activo` = 1)
    GROUP BY `US`.`name` , `US`.`id` , `EI`.`nombre` , `OB`.`nombre` , `OB`.`id`
        ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('view_tecnicos_reparaciones_resultados');
    }
}
