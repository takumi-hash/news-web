<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7;
use App\Models\News;
use App\Libs\SelfUtil;

class NewsController extends Controller
{
    public function index()
    {
        $carousel = [];
        $news_business = [];
        $news_technology = [];
        $news_world = [];

        if(Auth::check())
        {
            try {
                $selfUtil = new SelfUtil();

                $news_business_all = $selfUtil->get_bingnews_api_by_category('Business');
                $carousel = array_slice($selfUtil->get_bingnews_api_by_category('Business'), 0, 5);
                $news_business = array_slice($selfUtil->get_bingnews_api_by_category('Business'),5);

                usleep(1000);
                $news_technology = $selfUtil->get_bingnews_api_by_category('ScienceAndTechnology');

                usleep(1000);
                $news_world = $selfUtil->get_bingnews_api_by_category('World');

            } catch (RequestException $e) {
                echo Psr7\Message::toString($e->getRequest());
                if ($e->hasResponse()) {
                    echo Psr7\Message::toString($e->getResponse());
                }
            }
        }
        return view('home', compact('carousel','news_business','news_technology','news_world'));
    }
}