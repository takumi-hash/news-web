<?php

namespace App\Libs;

use App\Models\News;
use App\Models\Bookmark;


class SelfUtil
{
    public function parse_news_response($response)
    {
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
}

