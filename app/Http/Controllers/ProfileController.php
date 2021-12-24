<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{

    public function index()
    {
        $user = Auth::user();
        $profile = Profile::firstWhere('user_id',Auth::id());
        return view('frontend.profile.edit', compact('user','profile'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();
        $profile = Profile::firstWhere('user_id',Auth::id());
        if ($file = $request->file('profile_photo')){
            $type = $file->getClientOriginalExtension();
            $name = 'photo-' . time() . '.' . $type;
            $photo = 'videos/temp' . $name;
            Storage::disk('s3')->put('images/'.$name,file_get_contents($file));
            $file_url = Storage::disk('s3')->url('images/'.$name);
            $profile_photo = $file_url;
            //Storage::disk('public')->put($photo, file_get_contents($file));
        }else{
            $profile_photo = $profile?$profile->profile_photo:'';
        }
        if ($file = $request->file('cover_photo')){
            $type = $file->getClientOriginalExtension();
            $name = 'photo-' . time() . '.' . $type;
            $photo = 'videos/temp' . $name;

            //Storage::disk('public')->put($photo, file_get_contents($file));
            Storage::disk('s3')->put('images/'.$name,file_get_contents($file));
            $file_url = Storage::disk('s3')->url('images/'.$name);
            $cover_photo = $file_url;
        }else{
            $cover_photo = $profile?$profile->cover_photo:'';
        }
        $data=[
            'user_id'=>Auth::id(),
            'address'=>$request->address,
            'alt_address'=>$request->address1,
            'city'=>$request->city,
            'state'=>$request->state,
            'zip'=>$request->zip,
            'profile_photo'=>$profile_photo,
            'cover_photo'=>$cover_photo,
            'twitter_link'=>$request->twitter,
            'facebook_link'=>$request->facebook,
            'google_link'=>$request->google
        ];
        if ($profile)
        {
            $profile->update($data);
        }else{
            Profile::create($data);
        }
        $user->update(['first_name'=>$request->first_name,'last_name'=>$request->last_name]);
        return Redirect::back()->with('success','Profile Update Successfully');
    }

    public function destroy(Profile $profile)
    {
        //
    }
}
