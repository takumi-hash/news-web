<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Bookmark;
use App\Libs\SelfUtil;
use DB;

class InterestController extends Controller
{
    public function index(Request $request)
    {
        if(Auth::check()){
            $user = Auth::user();

            $interests = $user->interests()->get();

            // 一時的にAPIを使わず、DBのデータで代用
            $news = $user->bookmarks()->orderBy('publishedAt', 'desc')->get();

            // try {
            //     $client = new Client();
            // $apiRequest = $client->request('GET', config('newsapi.news_api_url') . 'everything?q=' . $topic . '&searchIn=title,description&pageSize=' . $count.'&apiKey=' . config('newsapi.news_api_key'));
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

            return view('interests', compact('interests','news'));
        }
        return view('interests');
    }
}
