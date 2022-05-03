<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Takumi Hashimoto',
            'email' => 'test@example.com',
            'password' => bcrypt('testpass'),
            'occupation_code' => 2,
        ]);
    }
}
