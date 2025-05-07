<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddObraOnsiteIdUnificadoToSistemasOnsiteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sistemas_onsite', function (Blueprint $table) {
            $table->bigInteger('obra_onsite_id_unificado')->after('obra_onsite_id')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sistemas_onsite', function (Blueprint $table) {
            $table->dropColumn('obra_onsite_id');
        });
    }
}
