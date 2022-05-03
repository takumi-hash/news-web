<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Bookmark;


class BookmarkController extends Controller
{
    
    public function index(Request $request)
    {
        if(Auth::check()){
            $user = Auth::user();
            $user_id = Auth::id();

            $limit = 100;

            $bookmark_count = $user->bookmarks()->count();
            $bookmarks = \DB::table('bookmarks')->join('bookmark_user', 'bookmarks.id', '=', 'bookmark_user.bookmark_id')->select('bookmarks.*')->where('bookmark_user.user_id', $user->id)->distinct()->paginate($limit);

            return view('saved', compact('bookmarks', 'user_id'));
        }
        return view('saved');
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

        return redirect()->back();
    }

    public function remove()
    {
        $news_url = request()->url;

        if (Auth::user()->has_saved($news_url)) {
            $bookmark_id = Bookmark::where('url', $news_url)->first()->id;
            Auth::user()->remove_bookmark($bookmark_id);
        }
        return redirect()->back();
    }
}
