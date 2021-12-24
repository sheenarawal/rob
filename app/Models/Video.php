<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $table='videos';
    protected $guarded = [];

    //
    public function user()
    {
        return $this->belongsTo('App\Models\User','userid'); // user_id
    }
    public function Category()
    {
        return $this->hasMany(VideoCategory::class,'video_id','id'); // category_id
    }
    public function tags()
    {
        return $this->hasMany(VideoTag::class, 'video_id', 'id');
    }
    public function likes()
    {
        return $this->hasMany(VideoLike::class ,'video_id','id');
    }

    public function dislikes()
    {
        return $this->hasMany(VideoDislike::class ,'video_id','id');
    }

    public function challengeVideos()
    {
        return $this->hasMany(ChallengeVideo::class ,'video_id','id');
    }


    public function comments () {

        return $this->hasMany('App\Models\Comment')->latest();
    }
}
