<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Video;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Yajra\DataTables\Facades\DataTables;

class CommentController extends Controller
{
    public function index()
    {
        return view('admin.comment.index');
    }

    public function tableData(Request $request,Video $video=null)
    {
        $comment = Comment::all();
        if ($video){
            $comment = Comment::where('video_id',$video->id)->get();
        }
        if ($request->ajax()){
            return DataTables::of($comment)
                ->addIndexColumn()
                ->editColumn('user_id', function($row){
                    return $row->user?$row->user->display_name:'';
                })
                ->editColumn('video_id', function($row)use($video){
                    $video_link = '';
                    if (!$video){
                        if ($row->video){
                            $video_link = '<video width="200" height="90" controls controlslist="nodownload">
                                <source src="'.$row->video->videolink.'" type="video/mp4">
                                </video>';
                        }else{
                            $video_link = 'Video Not Found ! May be deleted';
                        }
                    }
                    return $video_link;
                })

                ->editColumn('created_at', function($row){
                    return Carbon::parse($row->created_at)->format('d-m-Y');
                })
                ->rawColumns(['video_id'])
                ->make(true);
        }
        return view('admin.comment.index');

    }
}
