<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModelosRespuestosOnsitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('modelos_respuestos_onsite', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            
            $table->unsignedBigInteger('company_id')->default(1)->constrained('companies');
            $table->unsignedBigInteger('categoria_respuestos_onsite_id')->constrained('categorias_respuestos_onsite');
            $table->string('nombre');
            $table->string('imagen_despiece')->nullable();
            $table->string('campo_padre')->nullable();

            $table->foreign('company_id')->references('id')->on('companies');
            $table->foreign('categoria_respuestos_onsite_id')->references('id')->on('categorias_respuestos_onsite');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('modelos_respuestos_onsite');
    }
}
