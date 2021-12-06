<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CommentReply;
use Auth;
class CommentReplyController extends Controller
{
     public function store(Request $request, $comment)
    {
        $this->validate($request, ['message' => 'required|max:1000']);
        $commentReply = new CommentReply();
        $commentReply->video_id = $comment;
        $commentReply->user_id = Auth::id();
        $commentReply->message = $request->message;
        $commentReply->save();

        
        return redirect()->back();
    }
}
