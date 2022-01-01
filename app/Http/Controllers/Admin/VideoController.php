<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\VideoCategory;
use App\Models\VideoTag;
use Carbon\Carbon;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
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
		return view('admin.videos.index',compact(['videos']));
	}


    public function view(Video $video,$type=null)
    {
        if (!$type || !in_array($type,['challenged_videos','comment'])){
            return abort('404');
        }
        return view('admin.videos.view', compact('video','type'));
	}

    /*public function view(Video $video)
    {
        return view('frontend.video.show', compact('video'));
	}*/



    public function edit(Video $video)
    {
        $tags = '';
        $cates = [];
        $categories = Category::all();
        $languages = getLanguages();
        $tag_data = $video->tags;
        $cat_data = $video->Category;
        if ($tag_data){
            foreach ($tag_data as $tag) {
                $tags .= $tag->title .',';
            }
        }
        if ($cat_data){
            foreach ($cat_data as $data) {
                $cates[]= $data->id;
            }
        }
        return View('admin.videos.edit',compact('video','categories','languages','tags'));

	}
    public function create()
    {
        $categories = Category::all();
        $languages = getLanguages();
        return View('admin.videos.create',compact('categories','languages'));

	}
    public function store (Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'categories' => 'required',
            'recording_date' => 'required',
            'recording_location' => 'required',
            'description' => 'required',
            'video' =>  'required'

        ], [
            "categories.required" => "Choose at least one category"
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            $ErrorArray = array();
            foreach ($errors->getMessages() as $key => $message) {
                $ErrorArray[$key] = $message;
            }
            $response = array(
                "code" => 400,
                "message" => $ErrorArray
            );
            return response()->json($response);
        }

        if ($file = $request->file('video')) {

            $name = "video-" . rand() . "-" . time() . "." . $file->getClientOriginalExtension();
            $temp = 'videos/temp/' . $name;
            Storage::disk('public')->put($temp, file_get_contents($file));

            $exectPath = public_path('videos/upload');
            $temPath = public_path('videos/temp');
            if ($request->video_duration > 120){
                $time = '00:02:00';
                $cmd ="ffmpeg -ss ".$time." -i ".$temPath."/".$name." -to ".$time." -c copy ".$exectPath."/".$name;
                $res = shell_exec($cmd);
                Storage::disk('s3')->put('videos/'.$name, file_get_contents($exectPath.'/'.$name));
            }else{
                Storage::disk('s3')->put('videos/'.$name, file_get_contents($temPath.'/'.$name));
            }

            $file_url = Storage::disk('s3')->url('videos/'.$name);
            //'duration'=>$request->video_duration,
            $inputData = [
                'title'=>$request->title,
                'desc'=>$request->description,
                'recording_date'=>$request->recording_date,
                'recording_location'=>$request->recording_location,
                'video_language'=>$request->language,
                'duration'=>$request->video_duration,
                'is_comment_enable_status'=>$request->is_comment_enable_status,
                'slug'=>createSlug($request->title, 'Video', 'slug'),
                'userid'=>Auth::id(),
                'videolink'=>$file_url,
            ];
            Storage::disk('public')->delete($temp);
            Storage::disk('public')->delete($exectPath."/".$name);
            $video = Video::create($inputData);

            if (count($request->categories) > 0) {

                foreach ($request->categories as $cat) {
                    $v_Cat = VideoCategory::create([
                        'video_id'=>$video->id,
                        'category_id'=>$cat
                    ]);
                }
            }

            if (!is_null($request->tags)) {
                $tags = explode(',',$request->tags);
                foreach ($tags as $tag) {
                    VideoTag::create([
                            'video_id'=>$video->id,
                            'title'=>$tag,
                            'slug'=>createSlug($tag, 'VideoTag', 'slug')
                        ]
                    );
                }
            }
            $response = array(
                "code" => 200,
                "message" =>"Video upload successfully"
            );
            return response()->json($response);
        }

        $response = array(
            "code" => 400,
            "message" => 'Video file not found'
        );
        return response()->json($response);

	}
    public function status(Video $video)
    {
        $data = $video->status == 1?'0':'1';
        $status = $video->status == 1?'In Active':'Active';
        $video->update(['status'=>$data]);
        return Redirect::back()->with('success','Video is successfully '.$status);
	}
    public function delete(Video $video)
    {
        //dd($video);
        $video->delete();
        return Redirect::back()->with('success','Video delete successfully');
	}

}
