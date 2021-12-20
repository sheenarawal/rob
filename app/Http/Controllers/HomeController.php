<?php

namespace App\Http\Controllers;

use App\Models\Challenge;
use App\Models\User;
use App\Models\Video;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    public function index()
    {
        $this->redirectRoute();
        $videos = Video::where(['userid' => Auth::id()])->paginate(12);
        $videos_id = Video::where(['userid' => Auth::id()])->select('id')->get()->toArray();
        $challenges = Challenge::whereIn('video_id',$videos_id)->get();
        return view('frontend.profile.view', compact('videos','challenges'));

    }

    public function redirectRoute()
    {
        if (Auth::check() && Auth::user()->role == 0) {
            return Redirect::route('dashboard')->with('success', 'Welcome Back');
        }
        return true;

    }

    public function video()
    {
        dd('video');
    }

}
