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
    // public function category()
    // {
    //     return $this->belongsTo('App\Models\Category'); // category_id
    // }
    // public function tags()
    // {
    //     return $this->hasMany('App\Models\Tag', 'videoid', 'id');
    // }
    public function comments () {

        return $this->hasMany('App\Models\Comment');
    }
}
