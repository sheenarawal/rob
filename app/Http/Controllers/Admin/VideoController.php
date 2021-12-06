<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Video;
use Auth;

class VideoController extends Controller
{
    //
	
	function index(){
		$videos = Video::all();
		return view('admin.videos.index',compact(['videos']));
	}
	function view($slug){
		$video = Video::where(['slug' => $slug])->first();
        if(!$video) {
            abort(404);
        }
		return view('frontend.singlevideo', compact('video'));
	}
	function delete(){	

	}
}
