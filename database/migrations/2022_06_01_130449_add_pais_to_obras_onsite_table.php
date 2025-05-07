<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPaisToObrasOnsiteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('obras_onsite', function (Blueprint $table) {
            $table->string('pais')->default('Argentina')->after('nro_cliente_bgh_ecosmart');
            $table->foreignId('provincia_onsite_id')->default(26)->after('pais');
            $table->foreignId('localidad_onsite_id')->default(1)->after('provincia_onsite_id');
            $table->string('localidad_texto')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('obras_onsite', function (Blueprint $table) {
            $table->dropColumn('pais');
            $table->dropColumn('provincia_onsite_id');
            $table->dropColumn('localidad_onsite_id');
            $table->dropColumn('localidad_texto');

        });
    }
}
