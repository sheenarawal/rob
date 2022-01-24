<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Laravel\Socialite\Facades\Socialite;

class SocialLoginController extends Controller
{
    public function redirect_google()
    {
        return Socialite::driver('google')->redirect();
    }

    public function google_callback()
    {
        try {

            $user = Socialite::driver('google')->user();

            $finduser = User::where('social_id', $user->id)->first();

            if ($finduser) {

                Auth::login($finduser);
                return Redirect::route('index');

            } else {
                $newUser = User::create([
                    'first_name' => $user->name,
                    'last_name' => $user->name,
                    'display_name' => $user->name,
                    'email' => $user->email,
                    'password' => Hash::make('my-google'),
                    'show_password' => 'my-google',
                    'social_id' => $user->id,
                    'social_type' => 'google',
                ]);

                Auth::login($newUser);

                return Redirect::route('index');
            }

        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}
