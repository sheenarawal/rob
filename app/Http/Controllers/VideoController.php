<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Challenge;
use App\Models\VideoCategory;
use App\Models\VideoTag;
use App\Models\Video;
use FFMpeg\FFMpeg;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class VideoController extends Controller
{
	//
	public function index()
	{
	    $categories = Category::orderBy('id','desc')->get();
        $videos =  Video::all();
        return view('frontend.video.index', compact('videos','categories'));
	}
	function show($slug)
	{
		$video = Video::where(['slug' => $slug])->first();
		$challenge = Challenge::where(['video_id'=>$video->id,'user_id'=>Auth::id()])->first();
		//dd($challenge);
        $video_list = Video::where('slug','!=',$slug)->get();
		if (!$video) {

			abort(404);
		}
		return view('frontend.video.show', compact('video','video_list','challenge'));
	}
	function search()
	{
		$search_text = isset($_GET['query'])?$_GET['query']:'';
		$videos = Video::where('title', 'LIKE', '%' . $search_text . '%')->get();
		return view('frontend.search', compact('videos'));
	}
	function create()
	{

		$categories = Category::all();
		$languages = getLanguages();
		return view('frontend.uploadvideo', compact(['categories', 'languages']));
	}

	function store(Request $request)
	{
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

            $name = "video-" . rand() . "-" . time() . "." . $file->getClientOriginalExtension();
            $temp = 'videos/temp/' . $name;
            Storage::disk('public')->put($temp, file_get_contents($file));

            $exectPath = public_path('videos\upload');
            $temPath = public_path('videos\temp');
            $time = '00:01:00';
            $cmd ="ffmpeg -ss ".$time." -i ".$temPath."/".$name." -to ".$time." -c copy ".$exectPath."/".$name;
            $res = shell_exec($cmd);

            $uploadvideo =public_path('videos/upload/'.$name);
            Storage::disk('s3')->put('videos/'.$name, file_get_contents($uploadvideo));
            $file_url = Storage::disk('s3')->url('videos/'.$name);
            $inputData = [
                'title'=>$request->title,
                'desc'=>$request->description,
                'recording_date'=>$request->recording_date,
                'recording_location'=>$request->recording_location,
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

        /*$ext = explode(".", $name);
        $desktopfile_name = 'desktop_' . $ext[0];
        $mobilefile_name = 'mobile_' . $ext[0];
        //$uplodedPath = Storage::path($filePath);
        $cmd1 =  'ffmpeg -i ' . $uplodedPath . '/' . $name . ' -t 60 -s  1280x720 -c:a copy ' . $uplodedPath . '/' . $desktopfile_name . '.mp4';
        shell_exec($cmd1);

        $path = Storage::path('videos');
        $uplodedPath = Storage::path($uploadedFilePath);
        $array = explode("/", $uploadedFilePath);
        $name = end($array);
        $ext = explode(".", $name);
        $desktopfile_name = 'desktop_' . $ext[0];
        $mobilefile_name = 'mobile_' . $ext[0];



        $cmd =  'ffmpeg -i ' . $uplodedPath . '/' . $name . ' -t 60 -s  640x480 -c:a copy ' . $path . '/' . $mobilefile_name . '.mp4';
        shell_exec($cmd);
        $cmd1 =  'ffmpeg -i ' . $uplodedPath . '/' . $name . ' -t 60 -s  1280x720 -c:a copy ' . $path . '/' . $desktopfile_name . '.mp4';
        shell_exec($cmd1);


        $desktop = $path . '/' . $desktopfile_name . ".mp4";
        $mobile = $path . '/' . $mobilefile_name . ".mp4";
        $mobile_image = $path . '/' . $mobilefile_name . ".png";
        $desktop_image = $path . '/' . $desktopfile_name . ".mp4";


        $cmd2 = 'ffmpeg -i ' . $desktop . ' -r 1 -f ' . $path . '/' . $desktopfile_name . '.png';
        shell_exec($cmd2);
        $cmd3 = 'ffmpeg -i ' . $mobile . ' -r 1 -f ' . $path . '/' . $mobilefile_name . '.png';
        shell_exec($cmd3);


       if (file_exists($desktop)) {
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
        $type = $file->getClientOriginalExtension();
        $name = "video-" . rand() . "-" . time() . "." . $file->getClientOriginalExtension();
        $videoFile = 'videos/upload/' . $name;
        Storage::disk('public')->put($videoFile, file_get_contents($file));

        @unlink($desktop);
        @unlink($mobile);
        @unlink($mobile_image);
        @unlink($desktop_image);*/


	}

	public function category($slug)
    {
        $videos = [];
        $category = Category::firstWhere('slug',$slug);
        if ($category->videoCategory){
            foreach ($category->videoCategory as $vidoe_cat){
                $videos[] = $vidoe_cat->video?$vidoe_cat->video:'';
            }
        }
        return view('frontend.video.category-video',compact('videos'));
    }
}
