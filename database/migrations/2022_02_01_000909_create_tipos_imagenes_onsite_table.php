<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTiposImagenesOnsiteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tipos_imagenes_onsite', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('company_id')->default(1);
            $table->string('nombre');
            $table->timestamps();

            $table->foreign('company_id')->references('id')->on('companies');
        });

        // DB::statement("ALTER TABLE tipos_imagenes_onsite AUTO_INCREMENT = 61");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tipos_imagenes_onsite');
    }
}
