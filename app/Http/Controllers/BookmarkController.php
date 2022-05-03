<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class BookmarkController extends Controller
{
    
    public function index(Request $request)
    {
        if(Auth::check()){
            $user = Auth::user();
            $user_id = Auth::id();

            $limit = 100;

            $bookmark_count = $user->get_bookmarks()->count();
            $bookmarks = \DB::table('bookmarks')->join('bookmark_user', 'bookmarks.id', '=', 'bookmark_user.bookmark_id')->select('bookmarks.*')->where('bookmark_user.user_id', $user->id)->distinct()->paginate($limit);

            return view('saved', compact('bookmarks', 'user_id'));
        }
        return view('saved');

    }
}
