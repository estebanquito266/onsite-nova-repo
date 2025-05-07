<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateDumpTableTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dump_table', function (Blueprint $table) {
            $table->id();
            $table->string('name_table');
            $table->integer('type_table');
            $table->timestamps();
        });

        DB::table('dump_table')->insert([
            array('name_table' => 'categorias_respuestos_onsite','type_table' => 1),
			array('name_table' => 'companies','type_table' => 1),
			array('name_table' => 'estados_onsite','type_table' => 1),
			array('name_table' => 'estados_solicitudes_onsite','type_table' => 1),
			array('name_table' => 'localidades','type_table' => 1),
			array('name_table' => 'localidades_onsite','type_table' => 1),
			array('name_table' => 'migrations','type_table' => 1),
			array('name_table' => 'niveles_onsite','type_table' => 1),
			array('name_table' => 'parametros','type_table' => 1),
			array('name_table' => 'perfiles','type_table' => 1),
			array('name_table' => 'perfiles_usuarios','type_table' => 1),
			array('name_table' => 'plantillas_mails','type_table' => 1),
			array('name_table' => 'provincias','type_table' => 1),
			array('name_table' => 'roles','type_table' => 1),
			array('name_table' => 'roles_perfiles','type_table' => 1),
			array('name_table' => 'sla_onsite','type_table' => 1),
			array('name_table' => 'templates_comprobantes','type_table' => 1),
			array('name_table' => 'tipos_imagenes_onsite','type_table' => 1),
			array('name_table' => 'tipos_servicios_onsite','type_table' => 1),
			array('name_table' => 'tipos_visibilidades','type_table' => 1),
			array('name_table' => 'users_example','type_table' => 1),
			array('name_table' => 'user_companies','type_table' => 1),
			array('name_table' => 'user_empresas_onsite','type_table' => 1)
        ]
        );        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dump_table');
    }
}
