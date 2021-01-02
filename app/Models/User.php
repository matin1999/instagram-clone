<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'user_name',
        'mobile',
        'bio',
        'private',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    //mutators
    public function setPasswordAttribute($value)
    {
        $this->attributes['password']=Hash::needsRehash($value) ? Hash::make($value) : $value;
    }


 // relations
    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function stories()
    {
        return $this->hasMany(Story::class);
    }

    public function mentions()
    {
        return $this->hasMany(Mention::class, 'user_id');
    }

    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }

    public function followers()
    {
        return $this->belongsToMany(User::class, 'following', 'following_id', 'follower_id');
    }

    public function followings()
    {
        return $this->belongsToMany(User::class, 'following', 'follower_id', 'following_id');
    }

    public function isFollowing(User $user)
    {
        return !! $this->followers()->where('follower_id', $user->id)->count();
    }

    public function isFollowedBy(User $user)
    {
        return !! $this->followers()->where('follower_id', $user->id)->count();
    }


    public function blockedUsers()
    {
        return $this->belongsToMany(User::class, 'blocked_users', 'blocker_id', 'blocked_id');
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function messages()
    {
        return $this->hasMany(Message::class);
    }
}
