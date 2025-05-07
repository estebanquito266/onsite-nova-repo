<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCompradorOnsiteIdToSistemasOnsiteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sistemas_onsite', function (Blueprint $table) {
                $table->foreignId('comprador_onsite_id')->after('obra_onsite_id')->default(1)->constrained('compradores_onsite');
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
            $table->dropColumn('comprador_onsite_id');
        });
    }
}
