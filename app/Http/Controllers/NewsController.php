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
                    'author' => $response['articles'][$idx]['author'],
                    'title' => $response['articles'][$idx]['title'],
                    'description' => $response['articles'][$idx]['description'],
                    'url' => $response['articles'][$idx]['url'],
                    'urlToImage' => $response['articles'][$idx]['urlToImage'],
                    'publishedAt' => $response['articles'][$idx]['publishedAt'],
                    'content' => $response['articles'][$idx]['content'],
                    'source' => $response['articles'][$idx]['source']['name'],
                ]);
            }

            for ($idx = 0; $idx < $count; $idx++) {
                $t = new \DateTime($news[$idx]['publishedAt']);
                $t->setTimeZone(new \DateTimeZone('Asia/Tokyo'));
                $news[$idx]['publishedAt'] = $t->format('Y/m/d H:i');
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

    public function index_interests()
    {
        $topic = "エルデンリング";
        $count = 10;

        try {
            $client = new Client();
            $apiRequest = $client->request('GET', config('newsapi.news_api_url') . 'everything?q=' . $topic . '&searchIn=title,description&pageSize=' . $count.'&apiKey=' . config('newsapi.news_api_key'));
            $response = json_decode($apiRequest->getBody()->getContents(), true);

            $news = [];

            for ($idx = 0; $idx < $count; $idx++) {
                array_push($news, [
                    'author' => $response['articles'][$idx]['author'],
                    'title' => $response['articles'][$idx]['title'],
                    'description' => $response['articles'][$idx]['description'],
                    'url' => $response['articles'][$idx]['url'],
                    'urlToImage' => $response['articles'][$idx]['urlToImage'],
                    'publishedAt' => $response['articles'][$idx]['publishedAt'],
                    'content' => $response['articles'][$idx]['content'],
                    'source' => $response['articles'][$idx]['source']['name'],
                ]);
            }

            for ($idx = 0; $idx < $count; $idx++) {
                $t = new \DateTime($news[$idx]['publishedAt']);
                $t->setTimeZone(new \DateTimeZone('Asia/Tokyo'));
                $news[$idx]['publishedAt'] = $t->format('Y/m/d H:i');
            }

        } catch (RequestException $e) {
            //For handling exception
            echo Psr7\str($e->getRequest());
            if ($e->hasResponse()) {
                echo Psr7\str($e->getResponse());
            }
        }

        return view('interests', compact('news'));
    }

    public function index_discover()
    {
        $count = 10;

        try {
            $client = new Client();

            $apiRequest = $client->request('GET', config('newsapi.news_api_url') . 'top-headlines?country=us&pageSize=' . $count.'&apiKey=' . config('newsapi.news_api_key'));
            $response = json_decode($apiRequest->getBody()->getContents(), true);

            $news = [];

            for ($idx = 0; $idx < $count; $idx++) {
                array_push($news, [
                    'author' => $response['articles'][$idx]['author'],
                    'title' => $response['articles'][$idx]['title'],
                    'description' => $response['articles'][$idx]['description'],
                    'url' => $response['articles'][$idx]['url'],
                    'urlToImage' => $response['articles'][$idx]['urlToImage'],
                    'publishedAt' => $response['articles'][$idx]['publishedAt'],
                    'content' => $response['articles'][$idx]['content'],
                    'source' => $response['articles'][$idx]['source']['name'],
                ]);
            }

            for ($idx = 0; $idx < $count; $idx++) {
                $t = new \DateTime($news[$idx]['publishedAt']);
                $t->setTimeZone(new \DateTimeZone('Asia/Tokyo'));
                $news[$idx]['publishedAt'] = $t->format('Y/m/d H:i');
            }

        } catch (RequestException $e) {
            //For handling exception
            echo Psr7\str($e->getRequest());
            if ($e->hasResponse()) {
                echo Psr7\str($e->getResponse());
            }
        }

        return view('discover', compact('news'));
    }

    public function index_saved()
    {
        $UserId = '';
        $count = 10;

        return view('saved', compact('UserId'));
    }
}
