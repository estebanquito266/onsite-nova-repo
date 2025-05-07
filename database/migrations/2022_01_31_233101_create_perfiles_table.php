<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreatePerfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('perfiles', function (Blueprint $table) {
            $table->unsignedInteger('id', true);
            $table->unsignedBigInteger('company_id')->default(1)->constrained('companies');
            $table->string('nombre');
            $table->boolean('presupuesto_ver_monto_presupuesto')->default(false);
            $table->boolean('presupuesto_ver_claim')->default(false);
            $table->boolean('presupuesto_ver_fee')->default(false);
            $table->boolean('confirmar_empresa_cerrada_onsite')->default(false)->nullable();
            $table->boolean('visualizar_historial_estado_onsite')->default(false)->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('company_id')->references('id')->on('companies');
        });

        // DB::statement("ALTER TABLE perfiles AUTO_INCREMENT = 70");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('perfiles');
    }
}
