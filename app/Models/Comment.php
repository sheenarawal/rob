<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    public function video() {

        return $this->belongsTo('App\Models\Video');
    }
    public function user () {

        return $this->belongsTo('App\Models\User');
    }
    public function replies(){
        return $this->hasMany('App\Models\CommentReply');
    }
}
