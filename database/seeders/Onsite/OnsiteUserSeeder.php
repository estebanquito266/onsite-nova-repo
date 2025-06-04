<?php
namespace Database\Seeders\Onsite;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OnsiteUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'id' => 399,
            'name' => '_ONSITE',
            'email' => '_onsite@mail.com',
            'password' => '!0ns1t3#',
            'domicilio' => ' ',
            'cuit' => '0',
            'telefono' => '0',
            'id_tipo_visibilidad' => 1,
        ]);
    }
}
