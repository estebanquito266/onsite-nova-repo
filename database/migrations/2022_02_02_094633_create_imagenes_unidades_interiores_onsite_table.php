<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateImagenesUnidadesInterioresOnsiteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('imagenes_unidades_interiores_onsite', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('company_id');
            $table->unsignedBigInteger('unidad_interior_onsite_id');
            $table->unsignedBigInteger('tipo_imagen_onsite_id');
            $table->binary('archivo');
            $table->string('descripcion');
            $table->timestamps();

            $table->foreign('company_id')->references('id')->on('companies');
            $table->foreign('unidad_interior_onsite_id', 'uio_iuio_foreign')->references('id')->on('unidades_interiores_onsite');
            $table->foreign('tipo_imagen_onsite_id', 'tio_iuio_foreign')->references('id')->on('tipos_imagenes_onsite');
        });

        // DB::statement("ALTER TABLE imagenes_unidades_interiores_onsite AUTO_INCREMENT = 2");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('imagenes_unidades_interiores_onsite');
    }
}
