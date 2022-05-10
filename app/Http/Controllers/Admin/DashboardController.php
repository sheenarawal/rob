<?php

namespace App\Http\Controllers\Admin;
use App\Models\Challenge;
use App\Models\ChallengeVideo;
use App\Models\User;
use App\Http\Controllers\Controller;
use App\Models\Video;
use Illuminate\Http\Request;
use Auth;
class DashboardController extends Controller
{

    public function index()
    {
        $users =  User::all();
        $videos = Video::all();
        $challenges = Challenge::all();
        $challenge_video = ChallengeVideo::groupBy('challenge_video')->pluck('challenge_video')->toArray();
        $challenges = Video::whereIn('id',$challenge_video)->get();

        return view('admin.dashboard', compact('users','videos','challenges'));
        
    }


}
