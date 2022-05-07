<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Bookmark;

use DB;

class BookmarkUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (Bookmark::all() as $bookmark) {
            if(rand()>.05)
            {
                DB::table('bookmark_user')->insert([
                    'user_id' => 1,
                    'bookmark_id' => $bookmark->id,
                ]);
            } else {
                continue;
            }
        }

        foreach (Bookmark::all() as $bookmark) {
            if(rand()>.5)
            {
                DB::table('bookmark_user')->insert([
                    'user_id' => 2,
                    'bookmark_id' => $bookmark->id,
                ]);
            } else {
                continue;
            }
        }

        foreach (Bookmark::all() as $bookmark) {
            if(rand()>.5)
            {
                DB::table('bookmark_user')->insert([
                    'user_id' => 3,
                    'bookmark_id' => $bookmark->id,
                ]);
            } else {
                continue;
            }
        }

        foreach (Bookmark::all() as $bookmark) {
            if(rand()>.5)
            {
                DB::table('bookmark_user')->insert([
                    'user_id' => 4,
                    'bookmark_id' => $bookmark->id,
                ]);
            } else {
                continue;
            }
        }
    }
}
