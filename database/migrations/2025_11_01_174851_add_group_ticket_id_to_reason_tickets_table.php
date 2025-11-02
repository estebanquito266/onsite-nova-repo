<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddGroupTicketIdToReasonTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('reason_tickets', function (Blueprint $table) {
            $table->unsignedInteger('group_ticket_id')->nullable()->after('active');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('reason_tickets', function (Blueprint $table) {
            $table->dropColumn('group_ticket_id');
        });
    }
}
