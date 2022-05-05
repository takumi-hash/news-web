<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7;

use App\Models\Bookmark;
use App\Models\Interest;
use App\Libs\SelfUtil;
use DB;

class InterestController extends Controller
{
    public function index(Request $request)
    {
        if(Auth::check()){
            $user = Auth::user();

            $interests = $user->interests()->get();


            // News API
            // 一時的にAPIを使わず、DBのデータで代用
            $news = $user->bookmarks()->orderBy('publishedAt', 'desc')->take(3)->get();
            // try {
            //     $client = new Client();
            //     $apiRequest = $client->request('GET', config('newsapi.news_api_url') . 'everything?q=' . $topic . '&searchIn=title,description&pageSize=' . $count.'&apiKey=' . config('newsapi.news_api_key'));
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

            // Wikipedia API
            try {
                $client = new Client();
                $apiRequest = $client->request(
                    'GET',
                    'https://ja.wikipedia.org/w/api.php?action=query&format=json&prop=info%7Cextracts%7Cimageinfo%7Cpageimages&list=search&continue=-%7C%7Cinfo%7Cextracts%7Cimageinfo&iiprop=timestamp%7Cuser%7Curl&iilimit=1&piprop=thumbnail%7Cname&srsearch='
                    .'Apple'
                    .'&srlimit=30&srwhat=text&srprop=size%7Cwordcount%7Ctimestamp%7Csnippet%7Ctitlesnippet%7Ccategorysnippet&srsort=relevance'
                    );
                $response = json_decode($apiRequest->getBody()->getContents(), true);

                $selfUtil = new SelfUtil();
                $articles = $selfUtil->parse_wikipedia_response($response);
                
            } catch (RequestException $e) {
                //For handling exception
                echo Psr7\Message::toString($e->getRequest());
                if ($e->hasResponse()) {
                    echo Psr7\Message::toString($e->getResponse());
                }
            }

            return view('interests', compact('interests','news','articles'));
        }
        return view('interests');
    }
}
