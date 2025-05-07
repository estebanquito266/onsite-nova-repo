<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateImagenesUnidadesExterioresOnsiteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('imagenes_unidades_exteriores_onsite', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('company_id');
            $table->unsignedBigInteger('unidad_exterior_onsite_id');
            $table->unsignedBigInteger('tipo_imagen_onsite_id');
            $table->binary('archivo');
            $table->string('descripcion');
            $table->timestamps();

            $table->foreign('company_id')->references('id')->on('companies');
            $table->foreign('unidad_exterior_onsite_id', 'ueo_iueo_foreign')->references('id')->on('unidades_exteriores_onsite');
            $table->foreign('tipo_imagen_onsite_id', 'tio_iueo_foreign')->references('id')->on('tipos_imagenes_onsite');
        });

        // DB::statement("ALTER TABLE imagenes_unidades_exteriores_onsite AUTO_INCREMENT = 5");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('imagenes_unidades_exteriores_onsite');
    }
}
