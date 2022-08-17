<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RideSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('rides')->insert([
            'name' => 'Evento Teste',
            'start_date' => '2022-08-15',
            'start_date_registration' => '2022-08-14',
            'end_date_registration' => '2022-08-14',
            'additional_information' => null,
            'start_place' => 'bairro teste',
            'participants_limit' => 10,
        ]);
    }
}
