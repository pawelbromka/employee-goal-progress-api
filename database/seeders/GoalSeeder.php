<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GoalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('goals')->insert([
            'name' => 'Learning english',
        ]);

        DB::table('goals')->insert([
            'name' => 'Learning Excell',
        ]);

        DB::table('goals')->insert([
            'name' => 'Sales training',
        ]);
    }
}
