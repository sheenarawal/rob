<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use App\Models\Tag;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class TagsController extends Controller
{
    //
	 function __construct(){

        $this->middleware(function ($request, $next) {
            $this->user= Auth::user();
           
            return $next($request);
        });

    }
    public function index(Request $request)
    {
        $data =  Tag::all();
        if ($request->ajax()){
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    return $this->action($row);
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('admin.tags.index')->with('data', $data);
    }

    public function edit(Tag $tag){
        $data  = $tag;
        return view('admin.tags.edit')->with('data', $data);
    }
    public function save(Request $request)
    {
        $validator = $this->valid($request->all());
        if ($validator->fails()) {
            return Redirect::back()->withInput()->withErrors($validator->messages())->with('error', $validator->messages()->first());
        }
        $tag = Tag::create(['title'=>$request->title]);
        return redirect('admin/tags')->with('status','saved successfully');
    }

    public function valid($data)
    {
        return Validator::make($data,[
            'title' => 'required',
        ]);
    }

    public function update(Request $request, Tag $tag)
    {
        $validator = $this->valid($request->all());

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }
        $tag->update(['title'=>$request->title]);
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

    public function action($id)
    {
        $data = '<div class="dropdown">
                    <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-ellipsis-v"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                            <a class="dropdown-item edit_tag" data-toggle="modal" href="#edit_tag" data-id="'.$id->id.'" data-tag_title="'.$id->title.'">Edit</a>
                            <a class="dropdown-item" href="'.route('tags.delete', $id->id).'">Delete</a>
                    </div>
                </div>';
        return $data;
    }
}
