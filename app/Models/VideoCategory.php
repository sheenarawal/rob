<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VideoCategory extends Model
{
    //
	protected $table = "videos_categories";
	protected $guarded = [];


	public function video()
    {
        return $this->belongsTo(Video::class,'video_id','id');
    }
	public function CategoryDetail()
    {
        return $this->belongsTo(Category::class,'category_id','id');
    }
}
