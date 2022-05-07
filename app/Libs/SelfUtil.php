<?php

namespace App\Libs;

use App\Models\News;
use App\Models\Bookmark;
use App\Models\Interest;

class SelfUtil
{
    public function parse_news_response($response)
    {
        $news=[];
        foreach ($response['articles'] as $item) {
            $article = new News();
            $article->url = $item['url'];
            $article->title = $item['title'];
            $article->urlToImage = $item['urlToImage'];
            $article->author = $item['author'];
            $article->description = $item['description'];
            $article->content = $item['content'];
            $article->publishedAt = $item['publishedAt'];
            $article->source = $item['source']['name'];

            $t = new \DateTime($item['publishedAt']);
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

