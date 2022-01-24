<?php

namespace App\Http\Controllers;

use App\Models\VideoDislike;
use App\Models\VideoLike;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VideoLikeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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


    public function store(Request $request)
    {
        $id = $request->id;
        $request_data = [
            'video_id'=>$request->id,
            'user_id'=>Auth::id()
        ];
        $like = VideoLike::withTrashed()->where(['video_id'=>$id,'user_id'=>Auth::id()])->first();
        if (!$like){
            VideoLike::create($request_data);
            VideoDislike::where($request_data)->delete();
            $data = ['status'=>true,'message'=>'you like a video','class'=>'active'];
        }else{
            if ($like->deleted_at){
                $like->restore();
                VideoDislike::where($request_data)->delete();
                $data = ['status'=>true,'message'=>'you like a video','class'=>'active'];
            }else{
                $data = ['status'=>true,'message'=>'you unlike a video','class'=>''];
                $like->delete();
            }
        }
        $dislikes = VideoDisLike::where(['video_id'=>$id])->get();
        $likes = VideoLike::where(['video_id'=>$id])->get();
        $value = array_merge($data,['like_count'=>$likes->count(),'dislike_count'=>$dislikes->count()]);
        return json_encode($value);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\VideoLike  $videoLike
     * @return \Illuminate\Http\Response
     */
    public function show(VideoLike $videoLike)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\VideoLike  $videoLike
     * @return \Illuminate\Http\Response
     */
    public function edit(VideoLike $videoLike)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\VideoLike  $videoLike
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, VideoLike $videoLike)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\VideoLike  $videoLike
     * @return \Illuminate\Http\Response
     */
    public function destroy(VideoLike $videoLike)
    {
        //
    }
}
