<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;
    //

    protected $guarded = [];


    public function parentDetails()
    {
        return $this->belongsTo(Category::class,'parent_id','id');
    }

    public function videoCategory()
    {
        return $this->hasMany(VideoCategory::class,'category_id','id');
    }
    public function latestVideoCat()
    {
        return $this->hasMany(VideoCategory::class,'category_id','id')->latest();
    }
}
