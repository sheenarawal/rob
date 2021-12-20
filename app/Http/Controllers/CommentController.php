<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class CommentController extends Controller
{
    public function store(Request $request, Video $video)
    {
        //dd($request->all(),$video);
        $this->validate($request, ['comment' => 'required|max:1000']);
        $comment = Comment::create([
            'video_id'=>$video->id,
            'user_id'=>Auth::id(),
            'comment'=>$request->comment,
        ]);
        return Redirect::back()->with('success','Comment add successfully');
    }
}
