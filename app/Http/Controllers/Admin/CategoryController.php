<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class CategoryController extends Controller
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
        $data =  Category::all();
        if ($request->ajax()){
            return DataTables::of($data)
                ->addIndexColumn()
                ->editColumn('parent_id', function($row){
                    return $row->parentDetails?$row->parentDetails->title:'';
                })
                ->editColumn('created_at', function($row){
                    return Carbon::parse($row->created_at)->format('d-m-Y');
                })
                ->addColumn('action', function($row){
                    return $this->action($row);
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        $categories = Category::all();
        return view('admin.categories.index',compact('categories'));
    }

    public function edit($id){
        $data  = Category::find($id);
        $allc =  Category::all();
        return view('admin.categories.edit')->with('data', $data)->with('allcat', $allc);
    }
    public function create(){
        $allc =  Category::all();
        return view('admin.categories.create')->with('allcat', $allc);
    }

    public function save(Request $request){
        
        $validator = Validator::make($request->all(), [
            'title' => 'required',
        ]);
        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }
        $category = Category::create([
            'title'=>$request->title,
            'parent_id'=>$request->parent?$request->parent:'0',
            'slug'=> createSlug($request->title, 'Category', 'slug'),
        ]);
        return redirect('admin/category')->with('status','saved successfully');
    }

    public function update(Request $request, $id)
    {
        $category =Category::findOrFail($id);
        $validator = Validator::make($request->all(),
            ['title' => 'required']
        );
        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }
       $abc = $category->update([
            'title'=>$request->title,
            'parent_id'=>$request->parent?$request->parent:'0',
            'slug'=> createSlug($request->title, 'Category', 'slug'),
        ]);

        return Redirect::back()->with('status','Saved successfully');
    }

    function delete($id){
        $cat = Category::find($id);
        if(is_null($cat)){
            return Redirect::back()->with('status','No record found');
        }

        $cat->delete();
        return Redirect::back()->with('status','Deleted successfully');

    }

    public function action($cate)
    {
        $data = '<div class="dropdown">
                    <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-ellipsis-v"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                            <a class="dropdown-item edit_category" data-toggle="modal" href="#edit_category" 
                                data-id="'.$cate->id.'" data-cate_title="'.$cate->title.'" 
                                data-cate_parent="'.$cate->parent_id.'">Edit</a>
                            <a class="dropdown-item" href="'.route('category.delete', $cate->id).'">Delete</a>
                    </div>
                </div>';
        return $data;
    }
}
