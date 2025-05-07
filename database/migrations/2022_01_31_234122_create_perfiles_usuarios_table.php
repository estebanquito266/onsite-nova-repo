<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreatePerfilesUsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('perfiles_usuarios', function (Blueprint $table) {
            $table->unsignedInteger('id', true);
            $table->unsignedBigInteger('company_id')->default(1);
            $table->unsignedInteger('id_usuario');
            $table->unsignedInteger('id_perfil');
            $table->timestamps();
            $table->timestamp('deleted_at')->nullable();
            $table->unsignedInteger('id_tipo_ingreso')->default(99);

            $table->foreign('company_id')->references('id')->on('companies');
            $table->foreign('id_usuario')->references('id')->on('users');
            $table->foreign('id_perfil')->references('id')->on('perfiles');
        });

        // DB::statement("ALTER TABLE perfiles_usuarios AUTO_INCREMENT = 816");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('perfiles_usuarios');
    }
}
