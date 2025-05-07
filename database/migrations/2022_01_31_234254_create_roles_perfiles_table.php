<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateRolesPerfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles_perfiles', function (Blueprint $table) {
            $table->unsignedInteger('id', true);
            $table->unsignedBigInteger('company_id')->default(1);
            $table->unsignedInteger('id_perfil');
            $table->unsignedInteger('id_rol');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('company_id')->references('id')->on('companies');
            $table->foreign('id_perfil')->references('id')->on('perfiles');
            $table->foreign('id_rol')->references('id')->on('roles');
        });

        // DB::statement("ALTER TABLE roles_perfiles AUTO_INCREMENT = 415");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('roles_perfiles');
    }
}
