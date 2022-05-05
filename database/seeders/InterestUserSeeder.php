<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class InterestUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('interest_user')->insert([
            'user_id' => 1,
            'interest_id' => 1,
        ]);
        DB::table('interest_user')->insert([
            'user_id' => 1,
            'interest_id' => 2,
        ]);
        DB::table('interest_user')->insert([
            'user_id' => 1,
            'interest_id' => 3,
        ]);
        DB::table('interest_user')->insert([
            'user_id' => 2,
            'interest_id' => 1,
        ]);        DB::table('interest_user')->insert([
            'user_id' => 2,
            'interest_id' => 2,
        ]);
        DB::table('interest_user')->insert([
            'user_id' => 3,
            'interest_id' => 2,
        ]);
    }
}
