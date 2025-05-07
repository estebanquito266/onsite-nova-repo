<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateHistorialEstadosNotasOnsiteView extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement($this->createView());
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement($this->dropView());
    }

    private function createView(): string
    {
        return <<<SQL
                CREATE OR REPLACE
                ALGORITHM = UNDEFINED VIEW `historial_estados_notas_onsite` AS
                SELECT
                    `historial_estados_onsite`.`id` AS `id`,
                    `historial_estados_onsite`.`id_reparacion` AS `id_reparacion`,
                    `historial_estados_onsite`.`id_estado` AS `id_estado`,
                    `historial_estados_onsite`.`id_usuario` AS `id_usuario`,
                    `historial_estados_onsite`.`fecha` AS `fecha`,
                    `historial_estados_onsite`.`observacion` AS `observacion`
                FROM
                    `historial_estados_onsite`
                UNION
                SELECT
                    `notas_onsite`.`id` AS `id`,
                    `notas_onsite`.`reparacion_onsite_id` AS `id_reparacion`,
                    '' AS `id_estado`,
                    `notas_onsite`.`user_id` AS `id_usuario`,
                    `notas_onsite`.`created_at` AS `fecha`,
                    `notas_onsite`.`nota` AS `nota`
                FROM `notas_onsite`
SQL;
    }

    private function dropView(): string
    {
        return <<<SQL
        DROP VIEW IF EXISTS `historial_estados_notas_onsite`
SQL;

    }
}
