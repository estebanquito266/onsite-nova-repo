<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpresaInstaladoraUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empresas_instaladoras_users', function (Blueprint $table) {
            $table->id();
            $table->timestamps();            
            $table->foreignId('company_id')->constrained('companies')->default(2);
            $table->foreignId('empresa_instaladora_id')->constrained('empresas_instaladoras_onsite');
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('perfil_id')->constrained('perfiles')->default(1);
            $table->foreignId('observaciones')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('empresas_instaladoras_users');
    }
}
