<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateSistemasOnsiteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sistemas_onsite', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('company_id')->default(1);
            $table->unsignedInteger('empresa_onsite_id');
            $table->unsignedInteger('sucursal_onsite_id');
            $table->string('nombre');
            $table->string('comentarios')->nullable();
            $table->timestamps();

            $table->foreign('company_id')->references('id')->on('companies');
            $table->foreign('empresa_onsite_id')->references('id')->on('empresas_onsite');
            $table->foreign('sucursal_onsite_id')->references('id')->on('sucursales_onsite');
        });

        // DB::statement("ALTER TABLE sistemas_onsite AUTO_INCREMENT = 10");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sistemas_onsite');
    }
}
