<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DiscoverController extends Controller
{
    public function index()
    {
        if(Auth::check()){
            $user = Auth::user();

            // 一時的にAPIを使わず、DBのデータで代用
            $news = $user->bookmarks()->orderBy('publishedAt', 'desc')->get();

            // try {
            //     $client = new Client();

            //     $apiRequest = $client->request('GET', config('newsapi.news_api_url') . 'top-headlines?country=us&pageSize=' . $count.'&apiKey=' . config('newsapi.news_api_key'));
            //     $response = json_decode($apiRequest->getBody()->getContents(), true);

            //     $selfUtil = new SelfUtil();
            //     $news = $selfUtil->parse_news_response($response);

            // } catch (RequestException $e) {
            //     //For handling exception
            //     echo Psr7\Message::toString($e->getRequest());
            //     if ($e->hasResponse()) {
            //         echo Psr7\Message::toString($e->getResponse());
            //     }
            // }

            return view('discover', compact('news'));
        }
        return view('interests');
    }
}