<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7;

class NewsController extends Controller
{
    public function index()
    {
        $count = 10;

        try {
            $client = new Client();
            $apiRequest = $client->request('GET', config('newsapi.news_api_url') . 'top-headlines?country=jp&pageSize=' . $count.'&apiKey=' . config('newsapi.news_api_key'));
            $response = json_decode($apiRequest->getBody()->getContents(), true);

            $news = [];

            for ($idx = 0; $idx < $count; $idx++) {
                array_push($news, [
                    'name' => $response['articles'][$idx]['title'],
                    'url' => $response['articles'][$idx]['url'],
                    'thumbnail' => $response['articles'][$idx]['urlToImage'],
                ]);
            }
        } catch (RequestException $e) {
            //For handling exception
            echo Psr7\str($e->getRequest());
            if ($e->hasResponse()) {
                echo Psr7\str($e->getResponse());
            }
        }

        return view('home', compact('news'));
    }
}
