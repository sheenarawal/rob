<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ChallengeVideo extends Model
{
    use HasFactory,SoftDeletes;

    protected $guarded = [];

    public function video()
    {
        return $this->belongsTo(Video::class,'video_id','id');
    }

    public function challengeVideo()
    {
        return $this->belongsTo(Video::class,'challenge_video','id');
    }
}
