<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameMotivosConsultaTicketTableAndFields extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::rename('motivos_consulta_ticket', 'reason_tickets');

        Schema::table('reason_tickets', function (Blueprint $table) {
            $table->renameColumn('nombre', 'name');
            $table->renameColumn('activo', 'active');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::rename('reason_tickets', 'motivos_consulta_ticket');

        Schema::table('motivos_consulta_ticket', function (Blueprint $table) {
            $table->renameColumn('name', 'nombre');
            $table->renameColumn('active', 'activo');
        });
    }
}
