<?php

use App\Models\Onsite\SistemaOnsite;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateSolicitudVisitasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('solicitud_visitas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('visita_id');
            $table->unsignedBigInteger('solicitud_id');
            $table->timestamps();
            // $table->foreign('visita_id')->references('id')->on('reparaciones_onsite');
            // $table->foreign('solicitud_id')->references('id')->on('obras_onsite');
        });

       
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('solicitud_visitas');
    }
}
