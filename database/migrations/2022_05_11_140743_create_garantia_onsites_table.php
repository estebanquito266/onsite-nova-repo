<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGarantiaOnsitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('garantias_onsite', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->foreignId('company_id')->default(2)->constrained('companies');
            $table->date('fecha');
            $table->foreignId('garantia_tipo_onsite_id')->default(1)->constrained('garantias_tipos_onsite');
            $table->string('nombre')->nullable();
            $table->foreignId('empresa_instaladora_id')->constrained('empresas_instaladoras_onsite');
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('obra_onsite_id')->constrained('obras_onsite');
            $table->foreignId('sistema_onsite_id')->constrained('sistemas_onsite');
            $table->foreignId('comprador_onsite_id')->default(1)->constrained('compradores_onsite');
            $table->date('fecha_compra')->nullable();
            $table->string('numero_factura')->nullable();
            $table->text('observaciones')->nullable();
            $table->string('informe_observaciones')->nullable();
            $table->string('destinatario_informe')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('garantias_onsite');
    }
}
