<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSolicitudBouchersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('solicitudes_bouchers', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('company_id')->constrained('companies');
            $table->foreignId('solicitud_boucher_tipo_id')->constrained('solicitudes_bouchers_tipos');
            $table->foreignId('obra_id')->constrained('obras_onsite');
            $table->foreignId('solicitud_id')->nullable();
            $table->foreignId('solicitud_tarifa_id')->constrained('solicitudes_tipos_tarifas');        
            $table->string('codigo');
            $table->float('precio');
            $table->boolean('consumido')->default(false);
            $table->date('fecha_expira')->nullable();
            $table->text('observaciones')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('solicitud_bouchers');
    }
}
