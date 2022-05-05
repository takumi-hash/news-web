<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class InterestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('interests')->insert([
            'text' => 'bitcoin',
        ]);
        DB::table('interests')->insert([
            'text' => 'elden ring',
        ]);
        DB::table('interests')->insert([
            'text' => 'stocks',
        ]);
    }
}
