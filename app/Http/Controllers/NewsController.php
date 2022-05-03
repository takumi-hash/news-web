<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7;
use App\Models\News;
use App\Libs\SelfUtil;

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

            $news = [];
            $selfUtil = new SelfUtil();
            $news = $selfUtil->parse_news_response($response);

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
            $selfUtil = new SelfUtil();
            $news = $selfUtil->parse_news_response($response);
            
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
            $selfUtil = new SelfUtil();
            $news = $selfUtil->parse_news_response($response);

        } catch (RequestException $e) {
            //For handling exception
            echo Psr7\str($e->getRequest());
            if ($e->hasResponse()) {
                echo Psr7\str($e->getResponse());
            }
        }

        return view('discover', compact('news'));
    }

}

