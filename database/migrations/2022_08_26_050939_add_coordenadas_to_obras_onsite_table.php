<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCoordenadasToObrasOnsiteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('obras_onsite', function (Blueprint $table) {
            $table->string('longitud')->after('domicilio')->nullable();
            $table->string('latitud')->after('longitud')->nullable();
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
           $table->dropColumn('latitud');
           $table->dropColumn('longitud');
        });
    }
}
