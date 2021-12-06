<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Video;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Redirect;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        if (Auth::check()) {
            $role = Auth::user()->role;
            if ($role == "admin") {
            return view('admin.dashboard');
            } else  {
                $userid = Auth::user()->id;
                $videos = Video::where(['userid' => $userid])->get();
                return view('frontend.myaccount', compact(['videos']));
            }
        } else {
            return view('frontend.login');
        }
    }

    public function register()
    {
        return view('frontend.register');
    }


    public function userLogin(Request $request)
    {

        $data =  $request->all();

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

            $user = Auth::user();
            $role = Auth::user()->role;
            if ($role == "admin") {
            return view('admin.dashboard');
            } else  {
                $userid = Auth::user()->id;
                $videos = Video::where(['userid' => $userid])->get();
                return view('frontend.myaccount', compact(['videos']));
            }
        } else {
            return Redirect::back()->with('error', 'Invalid login details');
        }
    }

    public function userRegister(Request $request)
    {

        $data =  $request->all();

        $validator = Validator::make($request->all(), [
            'email' => 'email|required|unique:users',
            'password' => 'required|min:8',
            'firstname' => 'required',
            'lastname' => 'required',
        ], [
            'email.required' => 'Email address is required',
            'email.email' => 'Invalid email address',
            'firstname.required' => 'Firstname is required',
            'lastname.required' => 'Lastname is required',

        ]);

        if ($validator->fails()) {
            return Redirect::back()
                ->withErrors($validator)
                ->withInput();
        }


        $user = new User();
        $user->first_name =  $data['firstname'];
        $user->last_name = $data['lastname'];
        $user->email = $data['email'];
        $user->role = 'customer';
        $user->display_name = $data['display_name'];
        $user->password =  bcrypt($data['password']);
        $user->save();

        $details = array(
            'email' => $data['email'],
            'password' => $data['password'],
            'name' => $data['firstname'],
            'view' => 'welcome_email',
            'subject' => 'Welome Pop Rival'
        );
        //\Mail::to($data['regemail'])->send(new \App\Mail\commonMail($details));

        return Redirect::back()->with('success', 'Registered Successfully!!!');
    }

    public function editInfo()
    {
        if (Auth::check()) {
            $userid = Auth::user()->id;
            $user = User::find($userid);
            return view('profile.edit', compact('user'));
        } else {
            return view('frontend.login');
        }
    }

    function userlogout()
    {
        Auth::logout();
        return redirect(url('userlogin'));
    }
}
