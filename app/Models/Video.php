<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Video extends Model
{
    use SoftDeletes;
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
    public function latest_c_Videos()
    {
        return $this->hasMany(ChallengeVideo::class ,'video_id','id')->latest();
    }


    public function comments () {

        return $this->hasMany('App\Models\Comment')->latest();
    }

    public static function action($row)
    {
        $status = $row->status == 1?'In Active':'Active';
        $data = '<div class="dropdown">
                    <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-ellipsis-v"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                            <a class="dropdown-item d-none" href="'.route("videos.edit",$row->id).'">Edit</a>
                            <a class="dropdown-item" href="'.route('videos.status', $row->id).'">'.$status.'</a>
                            <a class="dropdown-item" href="'.route('videos.delete', $row->id).'">Delete</a>
                            <a class="dropdown-item" href="'.route('videos.view', [$row->id,'challenged_videos']).'">Challenged Videos</a>
                            <a class="dropdown-item d-none" href="'.route('videos.view', [$row->id,'comment']).'">Comment</a>
                    </div>
                </div>';
        return $data;
    }

}
