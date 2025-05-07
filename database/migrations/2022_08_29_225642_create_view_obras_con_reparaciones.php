<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateViewObrasConReparaciones extends Migration
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
        CREATE VIEW view_obras_con_reparaciones as
select OB.nombre, OB.id,  COUNT(SI.id) as cantidad_reparaciones,
SUM(if(CH.puesta_marcha_satisfactoria = 1, 1, 0)) AS sin_observaciones,
SUM(if(CH.puesta_marcha_satisfactoria <> 1 and CH.puesta_marcha_satisfactoria <> 0, 1, 0)) AS con_observaciones
from sistemas_onsite as SI
inner join obras_onsite as OB on OB.id = SI.obra_onsite_id
inner join reparaciones_onsite as RE on SI.id = RE.sistema_onsite_id
inner join reparacion_checklist_onsite as CH  on RE.id = CH.reparacion_onsite_id
where OB.activo = 1
group by SI.obra_onsite_id, OB.nombre, OB.id;

        ');

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('view_obras_con_reparaciones');
    }
}
