<?php

namespace App\Http\Controllers;

use App\Models\Challenge;
use App\Models\Profile;
use App\Models\User;
use App\Models\Video;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use App\Models\ContactUs;
use App\Models\AboutUs;

class HomeController extends Controller
{

    public function index($tag = null)
    {
        if ($tag && in_array($tag, ['video', 'challenge'])) {
            $this->redirectRoute();
            $user = User::findOrFail(Auth::id());
            $videos = Video::where(['userid' => Auth::id()])->orderBy('id', 'desc')->paginate(12);
            $videos_id = Video::where(['userid' => Auth::id()])->select('id')->get()->toArray();
            $challenges = Challenge::whereIn('video_id', $videos_id)->where('status',1)->orderBy('id', 'desc')->paginate(5);
            $profile = Profile::firstWhere('user_id', Auth::id());

            return view('frontend.profile.view', compact('videos', 'challenges', 'profile', 'user', 'tag'));
        }
        return abort('404');

    }

    public function show($tag,$id, $name)
    {
        if ($tag && in_array($tag, ['video'])) {
            $id = base64_decode($id);
            $user = User::findOrFail($id);
            $videos = Video::where(['userid' => $id])->orderBy('id', 'desc')->paginate(12);
            $videos_id = Video::where(['userid' => $id])->select('id')->get()->toArray();
            $challenges = Challenge::whereIn('video_id', $videos_id)->orderBy('id', 'desc')->paginate(5);
            $profile = Profile::firstWhere('user_id', $id);
            return view('frontend.profile.view', compact('videos', 'challenges', 'profile', 'user', 'tag'));
        }
        return abort('404');
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
            'video' => 'required|mimes:mp4,mov,ogg,qt'

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
            $cmd = "ffmpeg -ss " . $time . " -i " . $temPath . "/" . $name . " -to " . $time . " -c copy " . $exectPath . "/" . $name;
            $res = shell_exec($cmd);

            $uploadvideo = public_path('videos/upload/' . $name);
            Storage::disk('s3')->put('videos/' . $name, file_get_contents($uploadvideo));
            $file_url = Storage::disk('s3')->url('videos/' . $name);
            $inputData = [
                'title' => $request->title,
                'desc' => $request->description,
                'recording_date' => $request->recording_date,
                'recording_location' => $request->recording_location,
                'video_language' => $request->language,
                'is_comment_enable_status' => $request->is_comment_enable_status,
                'slug' => createSlug($request->title, 'Video', 'slug'),
                'userid' => Auth::id(),
                'videolink' => $file_url,
            ];
            Storage::disk('public')->delete($temp);
            Storage::disk('public')->delete($exectPath . "/" . $name);
            $video = Video::create($inputData);


            $response = array(
                "code" => 200,
                "videoData" => $video,
                "message" => "Video upload successfully"
            );
            return response()->json($response);
        }

        $response = array(
            "code" => 400,
            "message" => 'Video file not found'
        );
        return response()->json($response);
    }

    public function contact(){
            $id = Auth::id();
            $tag= 'contact';
            $user = User::findOrFail($id);
            $profile = Profile::firstWhere('user_id', $id);
            $data = ContactUs::find(1);
            return view('frontend.info.contact', compact('profile', 'user','data','tag'));
    }

    public function about(){
        $id = Auth::id();
        $tag= 'about';
        $user = User::findOrFail($id);
        $profile = Profile::firstWhere('user_id', $id);
        $data = AboutUs::find(1);
        return view('frontend.info.about', compact('profile', 'user','data','tag'));
    }
}
