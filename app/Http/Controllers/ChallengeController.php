<?php

namespace App\Http\Controllers;

use App\Mail\ChallengeMail;
use App\Models\Category;
use App\Models\Challenge;
use App\Models\ChallengeVideo;
use App\Models\Video;
use App\Models\VideoCategory;
use App\Models\VideoTag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ChallengeController extends Controller
{


    public function create($slug)
    {
        $video = Video::firstWhere('slug',$slug);
        if (!$video){
            return abort('404');
        }
        $challenge = Challenge::create([
            'user_id'=>Auth::id(),
            'video_id'=>$video->id
        ]);
        $data = [
            'subject'=>'Some one challenge your video',
            'name'=>Auth::user()->display_name,
            'title'=>$video->title,
            'url'=>route('video.view',$video->slug),
        ];
        Mail::to($video->user->email)->send(new ChallengeMail($data));
        return Redirect::back()->with('success','Challenged Successfully');
    }

    public function status(Challenge $challenge,$status)
    {
        $challenge->update(['status'=>$status]);
        $status = Challenge::status($status);
        return Redirect::back()->with('success','Challenged '.$status.' Successfully');
    }

    public function video(Request $request, $video)
    {
        $video = Video::firstWhere('slug',base64_decode($video));
        if (!$video)
        {
            return abort('404');
        }
        if ($request->all()){
            //dd($request->all());
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
                $challeng_video = Video::create($inputData);
                ChallengeVideo::create([
                    'video_id' => $video->id,
                    'challenge_video' => $challeng_video->id,
                    'user_id' => Auth::id(),
                ]);
                if (count($request->categories) > 0) {

                    foreach ($request->categories as $cat) {
                        $v_Cat = VideoCategory::create([
                            'video_id'=>$challeng_video->id,
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
        $categories = Category::all();
        $languages = getLanguages();
        return view('frontend.challenge.challengeVideo', compact('categories', 'languages','video'));
    }


}
