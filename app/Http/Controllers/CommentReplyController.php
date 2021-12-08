<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use App\Models\CommentReply;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class CommentReplyController extends Controller
{
     public function store(Request $request,Comment $comment)
    {
        $this->validate($request, ['comment' => 'required|max:1000']);
        CommentReply::create([
            'comment_id'=>$comment->id,
            'user_id'=>Auth::id(),
            'message'=>$request->comment
        ]);
        return Redirect::back()->with('success','comment reply add successfully');
    }
}
