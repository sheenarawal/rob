<?php

namespace App\Http\Controllers\Admin;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
class DashboardController extends Controller
{
    //
    public function index()
    {
        $users =  User::all(); 	
        return view('admin.dashboard', compact(['users']));
        
    }


}
