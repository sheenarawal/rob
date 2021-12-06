<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Redirect;
use Auth;
use App\Models\Tag;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class TagsController extends Controller
{
    //
	 function __construct(){

        $this->middleware(function ($request, $next) {
            $this->user= Auth::user();
           
            return $next($request);
        });

    }
    public function index()
    {
        $data =  Tag::all();
        return view('admin.tags.index')->with('data', $data);
    }

    public function edit($id){
        $data  = Tag::find($id);
       
        return view('admin.tags.edit')->with('data', $data);
    }
    public function create(){
      
        return view('admin.tags.create');
    }

    public function save(Request $request){
        
        $validator = Validator::make($request->all(), [
            'title' => 'required',
           
        ]);

        if ($validator->fails()) {
            return Redirect::back()
                        ->withErrors($validator)
                        ->withInput();
        }

        $cat = new Tag();

        $cat->title = $request->title;
        $cat->save();
        return redirect('admin/tags')->with('status','saved successfully');
    }

    public function update(Request $request, $id){
        
        $validator = Validator::make($request->all(), [
            'title' => 'required',
           
        ]);

        if ($validator->fails()) {
            return Redirect::back()
                        ->withErrors($validator)
                        ->withInput();
        }

        $cat = Tag::find($id);

        $cat->title = $request->title;
        $cat->save();
        return redirect('admin/tags')->with('status','Saved successfully');
    }

    function delete($id){
        $cat = Tag::find($id);
        if(is_null($cat)){
            return Redirect::back()->with('status','No record found');
        }

        $cat->delete();
        return Redirect::back()->with('status','Deleted successfully');

    }
}
