<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAndRenameFieldsInTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tickets', function (Blueprint $table) {
            $table->renameColumn('descripcion', 'detail');
            $table->renameColumn('motivo_consulta_ticket_id', 'reason_ticket_id');
            $table->renameColumn('user_id', 'user_owner_id');
        });

        Schema::table('tickets', function (Blueprint $table) {
            $table->unsignedInteger('user_receiver_id')->nullable()->after('cliente_id');
            $table->unsignedInteger('group_user_receiver_id')->nullable()->after('cliente_id');
            $table->unsignedBigInteger('category_ticket_id')->nullable()->after('cliente_id');
            $table->unsignedInteger('derivacion_id')->nullable()->after('reparacion_id');
            $table->timestamp('expiration_date')->nullable()->after('detail');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tickets', function (Blueprint $table) {
            $table->dropColumn('user_receiver_id');
            $table->dropColumn('group_user_receiver_id');
            $table->dropColumn('category_ticket_id');
            $table->dropColumn('derivacion_id');
            $table->dropColumn('expiration_date');
        });

        Schema::table('tickets', function (Blueprint $table) {
            $table->renameColumn('detail', 'descripcion');
            $table->renameColumn('reason_ticket_id', 'motivo_consulta_ticket_id');
            $table->renameColumn('user_owner_id', 'user_id');
        });
    }
}
