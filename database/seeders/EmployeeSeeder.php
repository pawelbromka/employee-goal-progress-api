<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('employees')->insert([
            'firstname' => 'Piotr',
            'lastname' => 'Kowalski',
        ]);

        DB::table('employees')->insert([
            'firstname' => 'Jan',
            'lastname' => 'Kwiatkowski',
        ]);

        DB::table('employees')->insert([
            'firstname' => 'Marcin',
            'lastname' => 'Lipiński',
        ]);
    }
}
