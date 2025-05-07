<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateEstadosSolicitudesOnsiteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estados_solicitudes_onsite', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('company_id')->default(1);
            $table->string('nombre');
            $table->unsignedInteger('plantilla_mail_cliente_id')->default(1);
            $table->boolean('pendiente')->default(false);
            $table->timestamps();

            $table->foreign('company_id')->references('id')->on('companies');
        });

        // DB::statement("ALTER TABLE estados_solicitudes_onsite AUTO_INCREMENT = 22;");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('estados_solicitudes_onsite');
    }
}
