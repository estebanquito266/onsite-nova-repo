<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateHistorialEstadosOnsiteVisiblePorUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('historial_estados_onsite_visible_por_user', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('historial_estados_onsite_id');
            $table->unsignedInteger('users_id');
            $table->timestamps();

            $table->foreign('historial_estados_onsite_id', 'heo_heovpu_foreign')->references('id')->on('historial_estados_onsite');
            $table->foreign('users_id')->references('id')->on('users');
        });

        // DB::statement("ALTER TABLE historial_estados_onsite_visible_por_user AUTO_INCREMENT = 73750;");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('historial_estados_onsite_visible_por_user');
    }
}
