<?php

use App\Models\Admin\Company;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateCategoryTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::defaultStringLength(255);

        Schema::create('category_tickets', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('company_id');
            $table->string('name');
        });

        $seed = [];

        foreach ([Company::DEFAULT, Company::URUGUAY] as $company_id) {
            $seed[] = [
                'company_id' => $company_id,
                'name'       => 'Solicitud',
            ];

            $seed[] = [
                'company_id' => $company_id,
                'name'       => 'Reclamo',
            ];

            $seed[] = [
                'company_id' => $company_id,
                'name'       => 'Aviso',
            ];
        }

        DB::table('category_tickets')->insert($seed);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('category_tickets');
    }
}
