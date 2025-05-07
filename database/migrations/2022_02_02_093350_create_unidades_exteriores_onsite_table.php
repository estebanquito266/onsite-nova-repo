<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateUnidadesExterioresOnsiteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('unidades_exteriores_onsite', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('company_id');
            $table->unsignedInteger('empresa_onsite_id');
            $table->unsignedInteger('sucursal_onsite_id');
            $table->unsignedBigInteger('sistema_onsite_id')->default(1);
            $table->string('clave');
            $table->double('medida_figura_1_a', 8, 2);
            $table->double('medida_figura_1_b', 8, 2);
            $table->double('medida_figura_1_c', 8, 2);
            $table->double('medida_figura_1_d', 8, 2);
            $table->double('medida_figura_2_a', 8, 2);
            $table->double('medida_figura_2_b', 8, 2);
            $table->double('medida_figura_2_c', 8, 2);
            $table->boolean('anclaje_piso')->default(false);
            $table->boolean('contra_sifon')->default(false);
            $table->boolean('mm_500_ultima_derivacion_curva')->default(false);
            $table->string('observaciones')->nullable();
            $table->timestamps();
            $table->string('modelo')->nullable();
            $table->string('serie')->nullable();

            $table->foreign('company_id')->references('id')->on('companies');
            $table->foreign('empresa_onsite_id')->references('id')->on('empresas_onsite');
            $table->foreign('sucursal_onsite_id')->references('id')->on('sucursales_onsite');
            $table->foreign('sistema_onsite_id')->references('id')->on('sistemas_onsite');
        });

        // DB::statement("ALTER TABLE unidades_exteriores_onsite AUTO_INCREMENT = 4");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('unidades_exteriores_onsite');
    }
}
