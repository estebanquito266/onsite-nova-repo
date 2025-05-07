<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImagenesObrasOnsiteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('imagenes_obras_onsite', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('company_id')->default('1')->constrained('companies');
            $table->unsignedBigInteger('obra_onsite_id')->constrained('obras_onsite');
            $table->unsignedBigInteger('tipo_imagen_onsite_id')->constrained('tipos_imagenes_onsite');
            $table->string('archivo');
            $table->string('descripcion')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('imagenes_obras_onsite');
    }
}
