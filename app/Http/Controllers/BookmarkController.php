<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Request as PostRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\Bookmark;
use App\Libs\SelfUtil;


class BookmarkController extends Controller
{
    
    public function index(Request $request)
    {
        if(Auth::check()){
            $user = Auth::user();
            $user_id = Auth::id();

            $limit = 100;

            $bookmark_count = $user->bookmarks()->count();
            $bookmarks = $user->bookmarks()->orderBy('publishedAt', 'desc')->get();
            //$bookmarks = \DB::table('bookmarks')->join('bookmark_user', 'bookmarks.id', '=', 'bookmark_user.bookmark_id')->select('bookmarks.*')->where('bookmark_user.user_id', $user->id)->distinct()->paginate($limit);

            return view('saved', compact('bookmarks', 'user_id'));
        }
        return view('saved');
    }

    public function search(Request $request)
    {
        if(Auth::check()){
            $user = Auth::user();
            $user_id = Auth::id();

            if (!empty(PostRequest::input('title'))) {
                $queryTitle = PostRequest::input('title');
                return $user->bookmarks()->where('title','LIKE',"%$queryTitle%")->limit(30)->get();
                // return Bookmark::select('id', 'title')
                //         ->where('title', 'LIKE', "%$queryTitle%")
                //         ->limit(20)->get();
            }
        }
        //return [];
    }

    public function save(Request $request){
        $url = $request->url;

        // create Item, or get Item if an item is found
        $bookmark = Bookmark::firstOrCreate(
            ['url' => $url],
            [
                'title' => $request->title,
                'urlToImage' => $request->urlToImage,
                'author' => $request->author,
                'publishedAt' => $request->publishedAt,
                'source' => $request->source,
            ],
        );

        Auth::user()->save_bookmark($bookmark->id);

        // return redirect()->back();
    }

    public function remove(Request $request)
    {
        $news_url = $request->url;
        var_dump($news_url);

        $bookmark_id = Bookmark::where('url', $news_url)->first()->id;
        Auth::user()->remove_bookmark($bookmark_id);
        //return redirect()->back();
    }
}
