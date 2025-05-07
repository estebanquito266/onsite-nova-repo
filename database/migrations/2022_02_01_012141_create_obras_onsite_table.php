<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateObrasOnsiteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('obras_onsite', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('company_id')->default(1);
            $table->string('clave');
            $table->string('nombre');
            $table->string('nro_cliente_bgh_ecosmart')->nullable();
            $table->string('domicilio')->nullable();
            $table->integer('cantidad_unidades_exteriores')->nullable();
            $table->integer('cantidad_unidades_interiores')->nullable();
            $table->string('empresa_instaladora_nombre')->nullable();
            $table->string('empresa_instaladora_responsable')->nullable();
            $table->string('responsable_email')->nullable();
            $table->string('responsable_telefono')->nullable();
            $table->string('esquema')->nullable();
            $table->integer('estado')->nullable();
            $table->string('estado_detalle')->nullable();
            $table->timestamps();

            $table->foreign('company_id')->references('id')->on('companies');
        });

//        DB::table('obras_onsite')->insert([
//            'id' => 1,
//            'clave' => '---',
//            'domicilio' => '---',
//            'nombre' => '-Ninguno-'
//        ]);

//         DB::statement("ALTER TABLE obras_onsite AUTO_INCREMENT = 40");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('obras_onsite');
    }
}
