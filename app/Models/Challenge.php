<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Challenge extends Model
{
    use HasFactory,SoftDeletes;
    protected $guarded = [];

    public function userDetail()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }
    public function videoDetail()
    {
        return $this->belongsTo(Video::class,'video_id','id');
    }

    public static function status($key)
    {
        $data = [
            1 => 'Pending',
            2 => 'Accept',
            3 => 'Reject'
        ];
        $value = $data;
        if ($key){
            $value = $data[$key];
        }

        return $value;
    }
}
