<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateParametrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parametros', function (Blueprint $table) {
            $table->unsignedInteger('id', true);
            $table->unsignedBigInteger('company_id')->default(1);
            $table->string('nombre');
            $table->string('descripcion');
            $table->integer('id_tipo_parametro')->default(1);
            $table->unsignedInteger('id_plantilla_mail_base');
            $table->char('tipo_valor', 1);
            $table->integer('valor_numerico')->nullable();
            $table->string('valor_cadena', 1000)->nullable();
            $table->text('valor_texto');
            $table->date('valor_fecha')->nullable();
            $table->boolean('valor_boolean')->nullable();
            $table->decimal('valor_decimal')->nullable();
            $table->timestamps();

            $table->foreign('company_id')->references('id')->on('companies');
            $table->foreign('id_plantilla_mail_base')->references('id')->on('plantillas_mails');
        });

        // \DB::statement("ALTER TABLE parametros AUTO_INCREMENT = 238");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('parametros');
    }
}
