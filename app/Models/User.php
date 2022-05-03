<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\User;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'occupation_code'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function bookmarks()
    {
        return $this->belongsToMany(Bookmark::class)->withTimestamps();
    }

    public function save_bookmark($news_id)
    {
        // User already has the bookmark?
        $saved = $this->has_saved($news_id);

        if ($saved) {
            // do nothing
            return false;
        } else {
            // do "save"
            $this->bookmarks()->attach($news_id);
            return true;
        }
    }

    public function has_saved($news_id_or_url)
    {
        if (is_numeric($news_id_or_url))
        {
            $exists = $this->bookmarks()->where('bookmarks.id', $news_id_or_url)->exists();
            return $exists;
        } else {
            $exists = $this->bookmarks()->where('bookmarks.url', $news_id_or_url)->exists();
            return $exists;
        }

    }

    public function remove_bookmark($news_url)
    {
        // Has the user already saved the url?
        $exists = $this->has_saved($news_url);

        if ($exists) {
            // do remove
            \DB::delete("DELETE FROM bookmark_user WHERE user_id = ? AND bookmark_id = ?", [$this->id, $news_url]);
        } else {
            // do nothing
            return false;
        }
    }

}
