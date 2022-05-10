<?php

namespace App\Http\Controllers;

use App\Models\Challange;
use App\Models\User;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{


    public function login(Request $request)
    {
        if ($request->all()){
            $validator = Validator::make($request->all(), [
                'email' => 'email|required',
                'password' => 'required',
            ], [
                'email.required' => 'Email address is required',
                'email.email' => 'Invalid email address',
                'password.required' => 'Password is required.'
            ]);

            if ($validator->fails()) {
                return Redirect::back()
                    ->withErrors($validator)
                    ->withInput();
            }

            $credentials = $request->only('email', 'password');
            if (Auth::attempt($credentials)) {
                return Redirect::route('login_redirect');
            } else {
                return Redirect::back()->with('error', 'Invalid login details');
            }
        }
        return view('frontend.login');
    }

    public function register(Request $request)
    {
        $data =  $request->all();
        if ($data){
            $validator = Validator::make($request->all(), [
                'email' => 'email|required|unique:users',
                'password' => 'required|min:8',
                'firstname' => 'required',
                'lastname' => 'required',
                'terms' => 'required',
            ], [
                'email.required' => 'Email address is required',
                'email.email' => 'Invalid email address',
                'firstname.required' => 'Firstname is required',
                'lastname.required' => 'Lastname is required',
                'terms.required' => 'Terms and Conditions are required',

            ]);

            if ($validator->fails()) {
                return Redirect::back()->withErrors($validator)->withInput();
            }

            $user = User::create([
                'first_name'=>$request->firstname,
                'last_name'=>$request->lastname,
                'display_name'=>$request->display_name,
                'email'=>$request->email,
                'password'=>Hash::make($request->password),
                'show_password'=>$request->password,
            ]);

            $details = array(
                'email' => $data['email'],
                'password' => $data['password'],
                'name' => $data['firstname'],
                'view' => 'welcome_email',
                'subject' => 'Welcome to Pop Rival'
            );
            //Mail::to($request->email)->send(new \App\Mail\commonMail($details));

            return Redirect::route('login')->with('success', 'Registered Successfully!!!');
        }
        return view('frontend.register');
    }

    public function login_redirect()
    {
        if (Auth::user()&& Auth::user()->role==0){
            return Redirect::route('dashboard')->with('success','Welcome Back');
        }
        return Redirect::route('index')->with('success','Welcome Back');
    }

    public function logout()
    {
        Auth::logout();
        return Redirect::route('login');
    }
}
