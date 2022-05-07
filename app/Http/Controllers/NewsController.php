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
        $count = 15;
        $news_business = [];
        $news_technology = [];
        $news_market = [];

        try {
            $client = new Client();
            $apiRequest = $client->request('GET', config('newsapi.news_api_url')
                .'top-headlines?country=jp&pageSize='.$count
                .'&apiKey='.config('newsapi.news_api_key')
                .'&category=business'
            );
            $response = json_decode($apiRequest->getBody()->getContents(), true);

            $selfUtil = new SelfUtil();
            //$carousel = array_slice($selfUtil->parse_news_response($response), 0, 5);
            $news_business = $selfUtil->parse_news_response($response);

            $client = new Client();
            $apiRequest = $client->request('GET', config('newsapi.news_api_url')
                .'top-headlines?country=jp&pageSize='.$count
                .'&apiKey='.config('newsapi.news_api_key')
                .'&category=technology'
            );
            $response = json_decode($apiRequest->getBody()->getContents(), true);

            $selfUtil = new SelfUtil();
            $carousel = array_slice($selfUtil->parse_news_response($response), 0, 5);
            $news_technology = array_slice($selfUtil->parse_news_response($response), 5);

            $client = new Client();
            $apiRequest = $client->request('GET', config('newsapi.news_api_url')
                .'top-headlines?country=jp&pageSize='.$count
                .'&apiKey='.config('newsapi.news_api_key')
                .'&q=株'
            );
            $response = json_decode($apiRequest->getBody()->getContents(), true);

            $selfUtil = new SelfUtil();
            //$carousel = array_slice($selfUtil->parse_news_response($response), 0, 5);
            $news_market = $selfUtil->parse_news_response($response);

        } catch (RequestException $e) {
            echo Psr7\Message::toString($e->getRequest());
            if ($e->hasResponse()) {
                echo Psr7\Message::toString($e->getResponse());
            }
        }
        return view('home', compact('carousel','news_business','news_technology','news_market'));
    }
}