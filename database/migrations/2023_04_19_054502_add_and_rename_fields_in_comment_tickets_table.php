<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAndRenameFieldsInCommentTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('comment_tickets', function (Blueprint $table) {
            $table->renameColumn('comentario', 'comment');
            $table->renameColumn('archivo', 'file');
            $table->renameColumn('user_id', 'user_comment_id');
        });

        Schema::table('comment_tickets', function (Blueprint $table) {
            $table->unsignedInteger('user_receiver_id')->nullable()->after('cliente_id');
            $table->unsignedInteger('group_user_receiver_id')->nullable()->after('cliente_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('comment_tickets', function (Blueprint $table) {
            $table->dropColumn('user_receiver_id');
            $table->dropColumn('group_user_receiver_id');
        });

        Schema::table('comment_tickets', function (Blueprint $table) {
            $table->renameColumn('comment', 'comentario');
            $table->renameColumn('file', 'archivo');
            $table->renameColumn('user_comment_id', 'user_id');
        });
    }
}
