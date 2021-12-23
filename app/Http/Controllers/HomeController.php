<?php

namespace App\Http\Controllers;

use App\Models\Challenge;
use App\Models\User;
use App\Models\Video;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    public function index()
    {
        $this->redirectRoute();
        $videos = Video::where(['userid' => Auth::id()])->paginate(12);
        $videos_id = Video::where(['userid' => Auth::id()])->select('id')->get()->toArray();
        $challenges = Challenge::whereIn('video_id',$videos_id)->get();
        return view('frontend.profile.view', compact('videos','challenges'));

    }

    public function redirectRoute()
    {
        if (Auth::check() && Auth::user()->role == 0) {
            return Redirect::route('dashboard')->with('success', 'Welcome Back');
        }
        return true;

    }

    public function video()
    {
        dd('video');
    }


    public function uploadVideo(Request $request)
    {
        dd($request->all());//video
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
                'video_language'=>$request->language,
                'is_comment_enable_status'=>$request->is_comment_enable_status,
                'slug'=>createSlug($request->title, 'Video', 'slug'),
                'userid'=>Auth::id(),
                'videolink'=>$file_url,
            ];
            Storage::disk('public')->delete($temp);
            Storage::disk('public')->delete($exectPath."/".$name);
            $video = Video::create($inputData);


            $response = array(
                "code" => 200,
                "videoData" => $video,
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

}
