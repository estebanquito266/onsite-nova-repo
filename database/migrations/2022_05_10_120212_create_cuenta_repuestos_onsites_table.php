<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCuentaRepuestosOnsitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cuentas_repuestos_onsite', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            
        $table->foreignId('company_id');
        $table->foreignId('empresa_instaladora_id');
        $table->string('nombre')->nullable();
        $table->string('numero_cuenta')->nullable();
        $table->float('descuento_repuestos')->default(0);
        $table->boolean('activa')->default(true);
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
        Schema::dropIfExists('cuentas_repuestos_onsite');
    }
}
