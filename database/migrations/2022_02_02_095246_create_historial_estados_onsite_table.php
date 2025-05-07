<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateHistorialEstadosOnsiteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('historial_estados_onsite', function (Blueprint $table) {
            $table->unsignedInteger('id', true);
            $table->unsignedBigInteger('company_id')->default(1);
            $table->unsignedInteger('id_reparacion');
            $table->unsignedInteger('id_estado');
            $table->dateTime('fecha');
            $table->string('observacion');
            $table->unsignedInteger('id_usuario');
            $table->boolean('visible');
            $table->timestamps();

            $table->foreign('company_id')->references('id')->on('companies');
            $table->foreign('id_reparacion')->references('id')->on('reparaciones_onsite');
            $table->foreign('id_estado')->references('id')->on('estados_onsite');
            $table->foreign('id_usuario')->references('id')->on('users');
        });

        // DB::statement("ALTER TABLE historial_estados_onsite AUTO_INCREMENT = 98959");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('historial_estados_onsite');
    }
}
