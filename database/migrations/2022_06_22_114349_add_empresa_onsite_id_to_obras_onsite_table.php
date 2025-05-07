<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddEmpresaOnsiteIdToObrasOnsiteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('obras_onsite', function (Blueprint $table) {
            $table->foreignId('empresa_onsite_id')->default(1)->after('empresa_instaladora_id')->constrained('empresas_onsite');
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
            $table->dropConstrainedForeignId('empresa_onsite_id');           
            
        });
    }
}
