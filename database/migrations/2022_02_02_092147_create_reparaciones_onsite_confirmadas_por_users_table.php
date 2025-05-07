<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateReparacionesOnsiteConfirmadasPorUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reparaciones_onsite_confirmadas_por_users', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('reparacion_onsite_id');
            $table->unsignedInteger('user_id');
            $table->timestamps();

            $table->foreign('reparacion_onsite_id', 'ro_rocpu_foreign')->references('id')->on('reparaciones_onsite');
            $table->foreign('user_id')->references('id')->on('users');
        });

        // DB::statement("ALTER TABLE reparaciones_onsite_confirmadas_por_users AUTO_INCREMENT = 15813");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reparaciones_onsite_confirmadas_por_users');
    }
}
