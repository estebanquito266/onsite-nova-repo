<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateLocalidadesOnsiteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('localidades_onsite', function (Blueprint $table) {
            $table->unsignedInteger('id', true);
            $table->unsignedBigInteger('company_id')->default(1);
            $table->unsignedInteger('id_provincia');
            $table->string('localidad');
            $table->string('localidad_estandard');
            $table->integer('codigo');
            $table->integer('km');
            $table->unsignedInteger('id_nivel');
            $table->string('atiende_desde');
            $table->unsignedInteger('id_usuario_tecnico');
            $table->timestamps();

            $table->foreign('company_id')->references('id')->on('companies');
            $table->foreign('id_provincia')->references('id')->on('provincias');
            $table->foreign('id_nivel')->references('id')->on('niveles_onsite');
            $table->foreign('id_usuario_tecnico')->references('id')->on('users');
        });

        // DB::statement("ALTER TABLE localidades_onsite AUTO_INCREMENT = 1887");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('localidades_onsite');
    }
}
