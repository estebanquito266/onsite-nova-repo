<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddBodyTxtToTemplatesComprobantesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('templates_comprobantes', function (Blueprint $table) {
            $table->text('body_text')->after('cuerpo')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('templates_comprobantes', function (Blueprint $table) {
            $table->dropColumn('body_text');
        });
    }
}
