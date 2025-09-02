<?php

use App\Models\Admin\Company;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateGroupTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::defaultStringLength(255);

        Schema::create('group_tickets', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('company_id');
            $table->string('name');
        });

        $seed = [];

        foreach ([Company::DEFAULT, Company::URUGUAY] as $company_id) {
            $seed[] = [
                'company_id' => $company_id,
                'name'       => 'Administración',
            ];

            $seed[] = [
                'company_id' => $company_id,
                'name'       => 'Sucursal Belgrano',
            ];
        }

        DB::table('group_tickets')->insert($seed);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('group_tickets');
    }
}
