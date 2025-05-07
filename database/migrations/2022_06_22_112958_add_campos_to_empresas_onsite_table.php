<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCamposToEmpresasOnsiteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('empresas_onsite', function (Blueprint $table) {
            $table->string('primer_nombre')->nullable()->after('nombre');
            $table->string('apellido')->nullable()->after('primer_nombre');
            $table->string('razon_social')->nullable()->after('apellido');
            $table->string('cuit')->nullable()->after('razon_social');
            $table->string('tipo_iva')->nullable()->after('cuit');
            $table->string('pais')->default('Argentina')->after('tipo_iva');
            $table->foreignId('provincia_onsite_id')->default(26)->after('pais');
            $table->foreignId('localidad_onsite_id')->default(1)->after('provincia_onsite_id');
            $table->string('localidad_texto')->nullable()->after('localidad_onsite_id');
            $table->string('codigo_postal')->nullable()->after('localidad_texto');
            $table->string('email')->nullable()->after('codigo_postal');
            $table->string('celular')->nullable()->after('email');
            $table->string('telefono')->nullable()->after('celular');
            $table->string('web')->nullable()->after('telefono');
            $table->string('coordenadas')->nullable()->after('web');
            $table->text('observaciones')->nullable()->after('coordenadas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('empresas_onsite', function (Blueprint $table) {
            $table->dropColumn('primer_nombre');
            $table->dropColumn('apellido');
            $table->dropColumn('razon_social');
            $table->dropColumn('cuit');
            $table->dropColumn('tipo_iva');
            $table->dropColumn('pais');
            $table->dropColumn('provincia_onsite_id');
            $table->dropColumn('localidad_onsite_id');
            $table->dropColumn('localidad_texto');
            $table->dropColumn('codigo_postal');
            $table->dropColumn('email');
            $table->dropColumn('celular');
            $table->dropColumn('telefono');
            $table->dropColumn('web');
            $table->dropColumn('coordenadas');
            $table->dropColumn('observaciones');
        });
    }
}
