<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Video;
use Auth;
use Yajra\DataTables\Facades\DataTables;

class VideoController extends Controller
{
    //

    public function index(Request $request)
    {
        $videos = Video::all();
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
                ->editColumn('created_at', function($row){
                    return Carbon::parse($row->created_at)->format('d-m-Y');
                })
                ->addColumn('action', function($row){
                    return $this->action($row);
                })
                ->rawColumns(['videolink','action'])
                ->make(true);
        }
		return view('admin.videos.index',compact(['videos']));
	}
    public function view($slug)
    {
		$video = Video::where(['slug' => $slug])->first();
        if(!$video) {
            abort(404);
        }
		return view('frontend.video.show', compact('video'));
	}
    public function edit(Video $video)
    {
        return View('admin.videos.edit',compact('video'));

	}
    public function delete(){

	}

    public function action($cate)
    {
        $data = '<div class="dropdown">
                    <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-ellipsis-v"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                            <a class="dropdown-item edit_category" href="'.route("videos.edit",$cate->id).'">Edit</a>
                            <a class="dropdown-item" href="'.route('videos.delete', $cate->id).'">Delete</a>
                    </div>
                </div>';
        return $data;
    }
}
