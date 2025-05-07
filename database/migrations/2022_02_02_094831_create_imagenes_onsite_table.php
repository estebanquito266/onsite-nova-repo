<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateImagenesOnsiteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('imagenes_onsite', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('company_id')->default(1);
            $table->unsignedInteger('reparacion_onsite_id');
            $table->string('archivo');
            $table->unsignedBigInteger('tipo_imagen_onsite_id')->default(1);
            $table->string('descripcion')->nullable();
            $table->timestamps();

            $table->foreign('company_id')->references('id')->on('companies');
            $table->foreign('reparacion_onsite_id')->references('id')->on('reparaciones_onsite');
            $table->foreign('tipo_imagen_onsite_id')->references('id')->on('tipos_imagenes_onsite');
        });

        // DB::statement("ALTER TABLE imagenes_onsite AUTO_INCREMENT = 45975");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('imagenes_onsite');
    }
}
