<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Auth;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7;
use App\Libs\SelfUtil;
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
        try {
            $selfUtil = new SelfUtil();

            $news_technology = $selfUtil->get_bingnews_api_by_query('テクノロジー OR 経済 OR ロシア');

        } catch (RequestException $e) {
            echo Psr7\Message::toString($e->getRequest());
            if ($e->hasResponse()) {
                echo Psr7\Message::toString($e->getResponse());
            }
        }

        foreach ($news_technology as $item) {
            if ($item === 0) {
                continue;
            }

            DB::table('bookmarks')->insert([
                'url' => $item->url,
                'title' => $item->title,
                'urlToImage' => $item->urlToImage,
                'author' => NULL,
                'description' => $item->description,
                'source' => $item->source,
                'publishedAt' => $item->publishedAt,
            ]);
        }

        // $bookmarkSplFileObject = new \SplFileObject(__DIR__ . '/seeddata/bookmarks.csv');
        // $bookmarkSplFileObject->setFlags(
        //     \SplFileObject::READ_CSV |
        //     \SplFileObject::READ_AHEAD |
        //     \SplFileObject::SKIP_EMPTY |
        //     \SplFileObject::DROP_NEW_LINE
        // );

        // foreach ($bookmarkSplFileObject as $key => $row) {
        //     if ($key === 0) {
        //         continue;
        //     }

        //     DB::table('bookmarks')->insert([
        //         'author' => trim($row[0]),
        //         'description' => trim($row[1]),
        //         'publishedAt' => trim($row[2]),
        //         'source' => trim($row[3]),
        //         'title' => trim($row[4]),
        //         'url' => trim($row[5]),
        //         'urlToImage' => trim($row[6]),
        //     ]);
        // }
    }
}
