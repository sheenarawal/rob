<?php

namespace  App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name','last_name','display_name', 'email', 'role', 'password',
        'show_password', 'social_id', 'social_type'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function videos()
    {
        return $this->hasMany('App\Models\Video');
    }
    public function comments () {

        return $this->hasMany('App\Models\Comment');
    }
    public function profileData()
    {
        return $this->hasOne(Profile::class,'user_id','id');
    }

}
