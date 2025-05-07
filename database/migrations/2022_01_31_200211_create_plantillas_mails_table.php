<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreatePlantillasMailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plantillas_mails', function (Blueprint $table) {
            $table->unsignedInteger('id', true);
            $table->unsignedBigInteger('company_id')->default(1);
            $table->string('from');
            $table->string('from_nombre');
            $table->string('subject');
            $table->text('body');
            $table->string('cc');
            $table->string('cc_nombre');
            $table->timestamps();
            $table->string('referencia');
            $table->boolean('plantilla_mail_base');
            $table->text('body_txt');

            $table->foreign('company_id')->references('id')->on('companies');
        });

        // \DB::statement("ALTER TABLE plantillas_mails AUTO_INCREMENT = 199");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('plantillas_mails');
    }
}
