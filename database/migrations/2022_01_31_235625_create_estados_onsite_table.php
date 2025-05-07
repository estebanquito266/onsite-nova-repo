<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateEstadosOnsiteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estados_onsite', function (Blueprint $table) {
            $table->unsignedInteger('id', true);
            $table->unsignedBigInteger('company_id')->default(1);
            $table->string('nombre');
            $table->timestamps();
            $table->boolean('activo');
            $table->string('card_titulo')->nullable();
            $table->string('card_intro')->nullable();
            $table->string('card_icono')->nullable();
            $table->unsignedInteger('tipo_estado_onsite_id')->default(1);
            $table->boolean('cerrado');
            $table->unsignedInteger('plantilla_mail_responsable_id')->default(1);
            $table->unsignedInteger('plantilla_mail_admin_id')->default(1);

            $table->foreign('company_id')->references('id')->on('companies');
        });

        // DB::statement("ALTER TABLE estados_onsite AUTO_INCREMENT = 45;");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('estados_onsite');
    }
}
