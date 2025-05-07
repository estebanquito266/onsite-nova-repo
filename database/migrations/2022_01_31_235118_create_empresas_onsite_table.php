<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateEmpresasOnsiteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empresas_onsite', function (Blueprint $table) {
            $table->unsignedInteger('id', true);
            $table->unsignedBigInteger('company_id')->default(1)->constrained('companies');
            $table->string('clave');
            $table->string('nombre');
            $table->unsignedInteger('tipo_terminales')->default(1);
            $table->unsignedInteger('tecnico_id')->default(399);
            $table->unsignedInteger('plantilla_mail_responsable_id')->default(1);
            $table->string('email_responsable');
            $table->string('responsable')->nullable();
            $table->unsignedInteger('plantilla_mail_asignacion_tecnico_id')->default(1);
            $table->timestamps();
            $table->boolean('requiere_tipo_conexion_local');
            $table->boolean('generar_clave_reparacion');

            $table->foreign('company_id')->references('id')->on('companies');
            $table->foreign('tecnico_id')->references('id')->on('users');
        });

        // DB::statement("ALTER TABLE empresas_onsite AUTO_INCREMENT = 30;");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('empresas_onsite');
    }
}
