<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddObraOnsiteIdToSistemasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sistemas_onsite', function (Blueprint $table) {
            $table->foreignId('obra_onsite_id')->after('sucursal_onsite_id')->default(1);
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
            //
        });
    }
}
