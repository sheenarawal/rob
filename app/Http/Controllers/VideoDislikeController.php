<?php

namespace App\Http\Controllers;

use App\Models\VideoDislike;
use App\Models\VideoLike;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VideoDislikeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id = $request->id;
        $request_data = [
            'video_id'=>$request->id,
            'user_id'=>Auth::id()
        ];
        $dislike = VideoDislike::withTrashed()->where(['video_id'=>$id,'user_id'=>Auth::id()])->first();
        if (!$dislike){
            VideoDislike::create($request_data);
            VideoLike::where($request_data)->delete();
            $data = ['status'=>true,'message'=>'you dislike a video','class'=>'active'];
        }else{
            if ($dislike->deleted_at){
                $dislike->restore();
                VideoLike::where($request_data)->delete();
                $data = ['status'=>true,'message'=>'you dislike a video','class'=>'active'];
            }else{
                $data = ['status'=>true,'message'=>'you un-dislike a video','class'=>''];
                $dislike->delete();
            }
        }
        $likes = VideoLike::where(['video_id'=>$id])->get();
        $dislikes = VideoDislike::where(['video_id'=>$id])->get();
        $value = array_merge($data,['like_count'=>$likes->count(),'dislike_count'=>$dislikes->count()]);
        return json_encode($value);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\VideoDislike  $videoDislike
     * @return \Illuminate\Http\Response
     */
    public function show(VideoDislike $videoDislike)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\VideoDislike  $videoDislike
     * @return \Illuminate\Http\Response
     */
    public function edit(VideoDislike $videoDislike)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\VideoDislike  $videoDislike
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, VideoDislike $videoDislike)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\VideoDislike  $videoDislike
     * @return \Illuminate\Http\Response
     */
    public function destroy(VideoDislike $videoDislike)
    {
        //
    }
}
