<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsToObrasOnsiteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('obras_onsite', function (Blueprint $table) {
            $table->string('localidad_txt')->nullable()->after('domicilio')->collation('utf8mb4_unicode_ci');
            $table->string('provincia_txt')->nullable()->after('domicilio')->collation('utf8mb4_unicode_ci');
            $table->string('pais_txt')->nullable()->after('domicilio')->collation('utf8mb4_unicode_ci');
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
            $table->dropColumn('localidad_txt');
            $table->dropColumn('provincia_txt');
            $table->dropColumn('pais_txt');
        });
    }
}
