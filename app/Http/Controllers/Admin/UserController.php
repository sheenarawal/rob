<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
Use Redirect;
class UserController extends Controller
{
    //
    function __construct(){

       /* $this->middleware(function ($request, $next) {
            $this->user= Auth::user();
            if($this->user->role_id !=1){
               
                return abort(404);
            }
            return $next($request);
        });*/

    }
    public function index()
    {
        $user =  User::all();
        return view('admin.adminusers.index')->with('user', $user);
    }

    public function editUser($id){
        $user  = User::find($id);
        
        return view('admin.adminusers.edit')->with('user', $user);
    }
    public function create(){
        
        return view('admin.adminusers.create');
    }

    public function save(Request $request){
        
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:6|max:10',
            'fname' =>'required',
        ]);

        if ($validator->fails()) {
            return Redirect::back()
                        ->withErrors($validator)
                        ->withInput();
        }

        $user = new User;
        $user->first_name = $request->fname;
        $user->last_name = $request->lname;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();
        return redirect('admin/user')->with('status','saved successfully');
    }

    public function update(Request $request, $id){
        
        $validator = Validator::make($request->all(), [
            'email' => 'required|unique:users,email,'.$id,
            'password' => 'nullable|string|min:6|max:10',
            'fname' =>'required',
        ]);

        if ($validator->fails()) {
            return Redirect::back()
                        ->withErrors($validator)
                        ->withInput();
        }

        $user = User::find($id);

   
        $user->email = $request->email;
       $user->first_name = $request->fname;
        $user->last_name = $request->lname;
        if(!empty($request->password)){
            $user->password = Hash::make($request->password);
        }
        $user->save();
        return redirect('admin/user')->with('status','Saved successfully');
    }

    function delete($id){
        $user = User::find($id);
        if(is_null($user)){
            return Redirect::back()->with('status','No user found');
        }

        $user->delete();
        return Redirect::back()->with('status','Deleted successfully');

    }
}
