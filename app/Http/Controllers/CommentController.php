<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use Auth;
class CommentController extends Controller
{
    public function store(Request $request, $video)
    {
        $this->validate($request, ['comment' => 'required|max:1000']);
        $comment = new Comment();
        $comment->video_id = $video;
        $comment->user_id = Auth::id();
        $comment->comment = $request->comment;
        $comment->save();

        
        return redirect()->back();
    }
}
