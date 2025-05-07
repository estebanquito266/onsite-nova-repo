<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyDatesToDatetimesInVisitasTable extends Migration
{
    public function up()
    {
        Schema::table('reparaciones_visitas', function (Blueprint $table) {
            $table->dateTime('fecha')->change();
            $table->dateTime('fecha_vencimiento')->change();
            $table->dateTime('fecha_nuevo_vencimiento')->nullable()->change();
        });
    }

    public function down()
    {
        Schema::table('reparaciones_visitas', function (Blueprint $table) {
            $table->date('fecha')->change();
            $table->date('fecha_vencimiento')->change();
            $table->date('fecha_nuevo_vencimiento')->nullable()->change();
        });
    }
}
