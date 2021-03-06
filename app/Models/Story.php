<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Story extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = ['user_id','expire_time'];
    public function creator()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function mentions()
    {
        return $this->morphMany(Mention::class, 'mentionable');
    }

    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }

    public function videos()
    {
        return $this->morphMany(Video::class, 'videoable');
    }


    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }
}
