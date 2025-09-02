<?php

use App\Models\Admin\Company;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateStatusTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::defaultStringLength(255);

        Schema::create('status_tickets', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('company_id');
            $table->string('name');
            $table->boolean('admin')->default(false);
        });

        $seed = [];

        foreach ([Company::DEFAULT, Company::URUGUAY] as $company_id) {
            $seed[] = [
                'company_id' => $company_id,
                'name'       => 'Nuevo',
            ];

            $seed[] = [
                'company_id' => $company_id,
                'name'       => 'Pendiente',
            ];

            $seed[] = [
                'company_id' => $company_id,
                'name'       => 'Respondido',
            ];

            $seed[] = [
                'company_id' => $company_id,
                'name'       => 'Resuelto',
            ];

            $seed[] = [
                'company_id' => $company_id,
                'name'       => 'Cerrado',
            ];
        }

        DB::table('status_tickets')->insert($seed);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('status_tickets');
    }
}
