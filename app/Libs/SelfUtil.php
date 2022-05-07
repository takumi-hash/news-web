<?php

namespace App\Libs;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7;

use App\Models\News;
use App\Models\Bookmark;
use App\Models\Interest;

class SelfUtil
{
    public function get_bingnews_api_by_category($category)
    {
        // For Japan:
        // Business
        // Entertainment
        // Japan
        // LifeStyle
        // Politics
        // ScienceAndTechnology
        // Sports
        // World

        $client = new Client();
        $request = $client->request(
            'GET',
            config('rapidapi.rapid_api_url').'/news',
            [
                'query' => [
                    'originalImg' => 'true', 
                    'category' => $category,
                    'safeSearch' => 'Off',
                    'textFormat' => 'Raw',
                    'count' => 100,
                    'mkt' => 'ja-JP',
	                'setLang' => 'JA',
                ],
                'headers' => [
                    'X-BingApis-SDK' => 'true',
                    'X-RapidAPI-Host' => config('rapidapi.rapid_api_host'),
                    'X-RapidAPI-Key' => config('rapidapi.rapid_api_key')
                ]
            ]
        );

        $response = json_decode($request->getBody()->getContents(), true);


        $news = [];

        foreach($response['value'] as $item){
            $article = new News();
            $article->url = $item['url'];
            $article->title = $item['name'];

            if(array_key_exists('image', $item))
            {
                $article->urlToImage = rtrim($item['image']['thumbnail']['contentUrl'], '&pid=news');
            } else {
                $article->urlToImage = NULL;
            }
            
            $article->author = NULL;
            $article->description = $item['description'];
            $article->source = $item['provider'][0]['name'];
            $t = new \DateTime($item['datePublished']);
            $t->setTimeZone(new \DateTimeZone('Asia/Tokyo'));
            $article->publishedAt = $t->format('Y/m/d H:i');


            $news[] = $article;
        }
        return $news;
    }

    public function get_bingnews_api_by_query($query)
    {

        $client = new Client();
        $request = $client->request(
            'GET',
            config('rapidapi.rapid_api_url').'/news/search',
            [
                'query' => [
                    'q' => $query,
                    'count' => 100,
                    'sortBy' => 'date',
                    'freshness' => 'Week',
                    'originalImg' => 'true', 
                    'safeSearch' => 'Off',
                    'textFormat' => 'Raw',
                    'mkt' => 'ja-JP',
	                'setLang' => 'JA',
                ],
                'headers' => [
                    'X-BingApis-SDK' => 'true',
                    'X-RapidAPI-Host' => config('rapidapi.rapid_api_host'),
                    'X-RapidAPI-Key' => config('rapidapi.rapid_api_key')
                ]
            ]
        );

        $response = json_decode($request->getBody()->getContents(), true);

        $news = [];

        foreach($response['value'] as $item){
            $article = new News();
            $article->url = $item['url'];
            $article->title = $item['name'];

            if(array_key_exists('image', $item))
            {
                $article->urlToImage = rtrim($item['image']['thumbnail']['contentUrl'], '&pid=news');
            } else {
                $article->urlToImage = NULL;
            }
            
            $article->author = NULL;
            $article->description = $item['description'];
            $article->source = $item['provider'][0]['name'];
            $t = new \DateTime($item['datePublished']);
            $t->setTimeZone(new \DateTimeZone('Asia/Tokyo'));
            $article->publishedAt = $t->format('Y/m/d H:i');

            $news[] = $article;
        }
        return $news;
    }

    public function parse_wikipedia_response($response)
    {
        foreach ($response['query']['search'] as $item) {
            $article = new News();
            $article->url = 'https://ja.wikipedia.org/?curid=' . $item['pageid'];
            $article->title = $item['title'];
            $article->urlToImage = null;
            $article->author = null;
            $article->description = strip_tags($item['snippet']);
            $article->content = null;
            $article->publishedAt = $item['timestamp'];
            $article->source = 'Wikipedia';

            $t = new \DateTime($item['timestamp']);
            $t->setTimeZone(new \DateTimeZone('Asia/Tokyo'));
            $article->publishedAt = $t->format('Y/m/d H:i');

            $articles[] = $article;
        }
        return $articles;
    }
}

