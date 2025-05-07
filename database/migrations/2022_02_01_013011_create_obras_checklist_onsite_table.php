<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateObrasChecklistOnsiteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('obras_checklist_onsite', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('company_id');
            $table->unsignedBigInteger('obra_onsite_id');
            $table->boolean('requiere_zapatos_seguridad')->default(false);
            $table->boolean('requiere_casco_seguridad')->default(false);
            $table->boolean('requiere_proteccion_visual')->default(false);
            $table->boolean('requiere_proteccion_auditiva')->default(false);
            $table->boolean('requiere_art')->default(false);
            $table->bigInteger('cuit')->nullable();
            $table->string('razon_social')->nullable();
            $table->boolean('clausula_no_arrepentimiento')->default(false);
            $table->string('cnr_detalle')->nullable();
            $table->timestamps();

            $table->foreign('company_id')->references('id')->on('companies');
            $table->foreign('obra_onsite_id')->references('id')->on('obras_onsite');
        });

        // DB::statement("ALTER TABLE obras_checklist_onsite AUTO_INCREMENT = 31");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('obras_checklist_onsite');
    }
}
