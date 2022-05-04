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
            'occupation_code' => 1,
        ]);

        DB::table('users')->insert([
            'name' => 'John Appleseed',
            'email' => 'test2@example.com',
            'password' => bcrypt('testpass'),
            'occupation_code' => 2,
        ]);

        DB::table('users')->insert([
            'name' => 'Steve Jobs',
            'email' => 'test3@example.com',
            'password' => bcrypt('testpass'),
            'occupation_code' => 3,
        ]);

        DB::table('users')->insert([
            'name' => 'Jane Doe',
            'email' => 'test4@example.com',
            'password' => bcrypt('testpass'),
            'occupation_code' => 4,
        ]);

        DB::table('users')->insert([
            'name' => 'Sterling Archer',
            'email' => 'test5@example.com',
            'password' => bcrypt('testpass'),
            'occupation_code' => 5,
        ]);
    }
}
