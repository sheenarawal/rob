<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ChallengeVideo;
use App\Models\Comment;
use App\Models\Video;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ChallengeVideoController extends Controller
{

    public function index()
    {
        return view('admin.challenge.index');
    }

    public function tableData(Request $request,Video $video=null)
    {
        $challenge = ChallengeVideo::pluck('challenge_video')->toArray();
        $videos = Video::whereIn('id',$challenge)->get();
        if ($video){
            $challenge = ChallengeVideo::where('video_id',$video->id)->pluck('challenge_video')->toArray();
            $videos = Video::whereIn('id',$challenge)->get();
        }
        if ($request->ajax()){
            return DataTables::of($videos)
                ->addIndexColumn()
                ->editColumn('userid', function($row){
                    return $row->user?$row->user->display_name:'';
                })
                ->editColumn('videolink', function($row){
                    $tag = '<video width="200" height="90" controls controlslist="nodownload">
                                <source src="'.asset($row->videolink).'" type="video/mp4">
                            </video>';
                    return $tag;
                })
                ->editColumn('status', function($row){
                    if ($row->status == 1){
                        $status = '<span class="badge badge-pill badge-success">Active</span>';
                    }else{
                        $status = '<span class="badge badge-pill badge-danger">In Active</span>';
                    }
                    return $status ;
                })
                ->editColumn('created_at', function($row){
                    return Carbon::parse($row->created_at)->format('d-m-Y');
                })
                ->addColumn('action', function($row){
                    return Video::action($row);
                })
                ->rawColumns(['videolink','status','action'])
                ->make(true);
        }
        return view('admin.comment.index');

    }

}
