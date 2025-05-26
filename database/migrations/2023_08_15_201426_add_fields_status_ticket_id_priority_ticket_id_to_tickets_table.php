<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsStatusTicketIdPriorityTicketIdToTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tickets', function (Blueprint $table) {
            $table->bigInteger('status_ticket_id')->nullable()->after('category_ticket_id');
            $table->bigInteger('priority_ticket_id')->nullable()->after('category_ticket_id');
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
            $table->dropColumn('status_ticket_id');
            $table->dropColumn('priority_ticket_id');
        });
    }
}
