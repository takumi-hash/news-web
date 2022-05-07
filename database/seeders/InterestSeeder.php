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
            'text' => 'Gadget',
        ]);
        DB::table('interests')->insert([
            'text' => 'Elden Ring',
        ]);
        DB::table('interests')->insert([
            'text' => 'UI UX',
        ]);
        DB::table('interests')->insert([
            'text' => 'PS5',
        ]);
        DB::table('interests')->insert([
            'text' => 'Design',
        ]);
    }
}
