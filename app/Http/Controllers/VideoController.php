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
	function singlevideo($slug)
	{
		$video = Video::where(['slug' => $slug])->first();

		if (!$video) {

			abort(404);
		}
		return view('frontend.singlevideo', compact('video'));
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
		dd($data);

		$validator = Validator::make($request->all(), [
			'title' => 'required',
			'categories' => 'required',
			'recording_date' => 'required',
			'recording_location' => 'required',
			'description' => 'required',
			'video' =>  'required|mimes:mp4,mov,ogg,qt'

		], [
			"categories.required" => "Choose atleast one category"
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

		$video = new Video();
		$video->title = $request->title;
		$video->recording_date = !empty($request->recording_date) ? strtotime($request->recording_date) : NULL;
		$video->recording_location = $request->recording_location;
		$video->is_comment_enable_status = $request->is_comment_enable_status;
		$video->slug = createSlug($request->title, 'Video', 'slug');
		$video->userid = Auth::id();
		$video->desc=$request->description;

		if ($file = $request->file('video')) {
			//$uplodedPath = Storage::path('public/videos');
			$uplodedPath = Storage::path('public/videos');
			$name = "video-" . rand() . "-" . time() . "." . $file->extension();
			//$uplodedPath = Storage::path($filePath);
            $photo = 'videos/upload/' . $name;
            Storage::disk('public')->put($photo, file_get_contents($file));
			$upload = $file->move($uplodedPath, $name);
			/*$uploadedFilePath = $request->file('video')->store(
				'videos/' . Auth::user()->id,
				's3'
			);*/
            
			$filePath = public_path('videos');
			//$file->storeAs($filePath, $name);
			$ErrorArray = array(
				'video' => array('Error while uploading. Please try again later')
			);
			/*if (!$filePath) {
				$response = array(
					"code" => 400,
					"message" => $ErrorArray
				);
				return response()->json($response);
			}*/
			$ext = explode(".", $name);
			$desktopfile_name = 'desktop_' . $ext[0];
			$mobilefile_name = 'mobile_' . $ext[0];
			//$uplodedPath = Storage::path($filePath);
			$cmd1 =  'ffmpeg -i ' . $uplodedPath . '/' . $name . ' -t 60 -s  1280x720 -c:a copy ' . $uplodedPath . '/' . $desktopfile_name . '.mp4';
			shell_exec($cmd1);
			/*$path = Storage::path('videos');
			$uplodedPath = Storage::path($uploadedFilePath);
			$array = explode("/", $uploadedFilePath);
			$name = end($array);
			$ext = explode(".", $name);
			$desktopfile_name = 'desktop_' . $ext[0];
			$mobilefile_name = 'mobile_' . $ext[0];

			/*********Trim video*********

			$cmd =  'ffmpeg -i ' . $uplodedPath . '/' . $name . ' -t 60 -s  640x480 -c:a copy ' . $path . '/' . $mobilefile_name . '.mp4';
			shell_exec($cmd);
			$cmd1 =  'ffmpeg -i ' . $uplodedPath . '/' . $name . ' -t 60 -s  1280x720 -c:a copy ' . $path . '/' . $desktopfile_name . '.mp4';
			shell_exec($cmd1);
			/*********Trim video*********
			$desktop = $path . '/' . $desktopfile_name . ".mp4";
			$mobile = $path . '/' . $mobilefile_name . ".mp4";
			$mobile_image = $path . '/' . $mobilefile_name . ".png";
			$desktop_image = $path . '/' . $desktopfile_name . ".mp4";
			/*&***************extracting Images******************/
			/*$cmd2 = 'ffmpeg -i ' . $desktop . ' -r 1 -f ' . $path . '/' . $desktopfile_name . '.png';
			shell_exec($cmd2);
			$cmd3 = 'ffmpeg -i ' . $mobile . ' -r 1 -f ' . $path . '/' . $mobilefile_name . '.png';
			shell_exec($cmd3);
			/*&***************extracting Images******************/
			
			/*if (file_exists($desktop)) {
				Storage::disk('s3')->put($filePath, file_get_contents($desktop));
			}
			if (file_exists($mobile)) {
				Storage::disk('s3')->put($filePath, file_get_contents($mobile));
			}

			if (file_exists($mobile_image)) {
				Storage::disk('s3')->put($filePath, file_get_contents($mobile_image));
			}

			if (file_exists($desktop_image)) {
				Storage::disk('s3')->put($filePath, file_get_contents($desktop_image));
			}

			@unlink($desktop);
			@unlink($mobile);
			@unlink($mobile_image);
			@unlink($desktop_image);*/
		}
		$video->is_comment_enable_status = $request->is_comment_enable_status;
		$video->videolink =  $desktopfile_name.'.mp4';
		$video->save();
		if (count($request->categories) > 0) {

			foreach ($request->categories as $cat) {
				$vcat = new VideoCategory();
				$vcat->video_id = $video->id;
				$vcat->category_id = $cat;
				$vcat->save();
			}
		}

		if (!is_null($request->tags)) {
			foreach ($request->tags as $t) {
			    VideoTag::create(
			        ['video_id'=>$video->id]
                );
				$vatg = new VideoTag();
				$vtag->video_id = $video->id;
				$vtag->tag_title = $t;
				$vtag->tag_slug = createSlug($t, 'VideoTag', 'tag_slug');
				$vtag->save();
			}
		}
		$response = array(
			"code" => 200,
			"message" =>"Video upload successfully"
		);
		return response()->json($response);
	}
}
