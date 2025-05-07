<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateNotasOnsiteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notas_onsite', function (Blueprint $table) {
            $table->id();
            $table->string('nota');
            $table->unsignedInteger('reparacion_onsite_id');
            $table->unsignedInteger('user_id');
            $table->timestamps();
            $table->timestamp('deleted_at')->nullable();

            $table->foreign('reparacion_onsite_id')->references('id')->on('reparaciones_onsite');
            $table->foreign('user_id')->references('id')->on('users');
        });

        // DB::statement("ALTER TABLE notas_onsite AUTO_INCREMENT = 34");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('notas_onsite');
    }
}
