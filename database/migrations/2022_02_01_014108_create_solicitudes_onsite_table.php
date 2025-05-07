<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateSolicitudesOnsiteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('solicitudes_onsite', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('company_id');
            $table->timestamps();
            $table->unsignedBigInteger('obra_onsite_id');
            $table->unsignedBigInteger('estado_solicitud_onsite_id');
            $table->boolean('terminos_condiciones')->default(false);
            $table->text('observaciones_internas')->nullable();
            $table->text('nota_cliente')->nullable();
            $table->text('comentarios')->nullable();

            $table->foreign('company_id')->references('id')->on('companies');
            $table->foreign('obra_onsite_id')->references('id')->on('obras_onsite');
            $table->foreign('estado_solicitud_onsite_id')->references('id')->on('estados_solicitudes_onsite');
        });

        // DB::statement("ALTER TABLE solicitudes_onsite AUTO_INCREMENT = 32");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('solicitudes_onsite');
    }
}
