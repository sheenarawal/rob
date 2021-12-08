<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class VideoLike extends Model
{
    use HasFactory,SoftDeletes;
    protected $guarded = [];

    public function videoDetail()
    {
        return $this->belongsTo(Video::class,'id','video_id');
    }
}
