<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class BookmarkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->command->info("Bookmarks seeding started.");

       $bookmarkSplFileObject = new \SplFileObject(__DIR__ . '/seeddata/bookmarks.csv');
        $bookmarkSplFileObject->setFlags(
            \SplFileObject::READ_CSV |
            \SplFileObject::READ_AHEAD |
            \SplFileObject::SKIP_EMPTY |
            \SplFileObject::DROP_NEW_LINE
        );

        $count = 0;
        foreach ($bookmarkSplFileObject as $key => $row) {
            if ($key === 0) {
                continue;
            }

            DB::table('bookmarks')->insert([
                'author' => trim($row[0]),
                'description' => trim($row[1]),
                'publishedAt' => trim($row[2]),
                'source' => trim($row[3]),
                'title' => trim($row[4]),
                'url' => trim($row[5]),
                'urlToImage' => trim($row[6]),
            ]);
            $count++;
        }

        $this->command->info("Bookmark seeding finished.");
    }
}
