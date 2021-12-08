<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Category;
use App\Models\VideoCategory;
use App\Models\VideoTag;
use App\Models\Video;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Redirect;

class VideoController extends Controller
{
	//
	function index()
	{
		$video =  Video::all();
		return view('admin.videos.index')->with('video', $video);
	}
	function allvideos()
	{
		$videos = Video::all();
		return view('frontend.allvideos', compact('videos'));
	}
	public function store()
    {
        dd(\Illuminate\Support\Facades\Request::all());
    }
	function singlevideo($slug)
	{
		$video = Video::where(['slug' => $slug])->first();
        $video_list = Video::where('slug','!=',$slug)->get();
		if (!$video) {

			abort(404);
		}
		return view('frontend.singlevideo', compact('video','video_list'));
	}
	function search()
	{
		$search_text = $_GET['query'];
		$videos = Video::where('title', 'LIKE', '%' . $search_text . '%')->get();
		return view('frontend.search', compact('videos'));
	}
	function uplaodVideo()
	{

		/*$filePath = 'mobile_video-4031538-83d81c93ee73f33c2e3187e2aa41d91d.mp4';
		$file = url('videos/mobile_video-4031538-83d81c93ee73f33c2e3187e2aa41d91d.mp4');

		//$Resss =  Storage::disk('s3')->put($filePath, file_get_contents($file));
		// var_dump($Resss);
		$name = "video-4031538-83d81c93ee73f33c2e3187e2aa41d91d.mp4";
			$path = public_path('videos');
			$ext = explode(".", $name);
			$originalfile_name = 'original_'.$ext[0];
			$desktopfile_name = 'desktop_'.$ext[0];
			$mobilefile_name = 'mobile_'.$ext[0];
			
			/*********Trim video*********
			
			echo $cmd =  'ffmpeg -i '.$path.'/'.$name.' -ss 00:00:00 -s 640x480 -codec copy -t 60 '.$path.'/'.$mobilefile_name.'.mp4';
			var_dump($cmd);
			$res = shell_exec($cmd);
			var_dump($res);
			$cmd1 =  'ffmpeg -i '.$path.'/'.$name.' -ss 00:00:00 -filter:v -s 1280x720 -codec copy -t 60 '.$path.'/'.$desktopfile_name.'.mp4';
			$res1 = shell_exec($cmd1);
			var_dump($res1);
			/*********Trim video*********/

		$categories = Category::all();
		$languages = getLanguages();
		return view('frontend.uploadvideo', compact(['categories', 'languages']));
	}

	function saveVideo(Request $request)
	{
		$data = $request->all();
		//dd($data);

		$validator = Validator::make($request->all(), [
			'title' => 'required',
			'categories' => 'required',
			'recording_date' => 'required',
			'recording_location' => 'required',
			'description' => 'required',
			'video' =>  'required|mimes:mp4,mov,ogg,qt'

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
			//$uplodedPath = Storage::path('public/videos');
			$type = $file->getClientOriginalExtension();
			$name = "video-" . rand() . "-" . time() . "." . $file->getClientOriginalExtension();
            $videoFile = 'videos/upload/' . $name;
            Storage::disk('public')->put($videoFile, file_get_contents($file));

		}
        $inputData = [
            'title'=>$request->title,
            'desc'=>$request->description,
            'recording_date'=>$request->recording_date,
            'recording_location'=>$request->recording_location,
            'is_comment_enable_status'=>$request->is_comment_enable_status,
            'slug'=>createSlug($request->title, 'Video', 'slug'),
            'userid'=>Auth::id(),
            'videolink'=>$videoFile,
        ];
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
			foreach ($request->tags as $t) {
			    VideoTag::create([
			            'video_id'=>$video->id,
                        'tag_title'=>$t,
                        'tag_slug'=>createSlug($t, 'VideoTag', 'tag_slug')
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
}
