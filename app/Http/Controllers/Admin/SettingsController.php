<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\Seller;
use App\Models\SiteSetting;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Auth;

class SettingsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {


        return view('admin.site_settings.index')->with('data', getSiteSetting());
    }

    public function save(Request $request)
    {
        $data = $request->all();
        $validator = Validator::make($data, [
            'site_name' => 'required',
        ]);

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }

        if ($request->hasfile('site_logo')) {
            $file = $request->file('site_logo');
            $name = rand(100, 700) . time() . '.' . $file->extension();
            $res = $file->move(public_path() . '/siteimages/', $name);
            if ($res) {
                $data['site_logo'] = $name;
            } else {
                return Redirect::back()->with('status', 'Error while uploading.')->withInput();
            }

        }


        if ($request->hasfile('site_banner')) {
            $file = $request->file('site_banner');
            $name = rand(100, 700) . time() . '.' . $file->extension();
            $res = $file->move(public_path() . '/siteimages/', $name);
            if ($res) {
                $data['site_banner'] = $name;
            } else {
                return Redirect::back()->with('status', 'Error while uploading.')->withInput();
            }

        }

        unset($data['_token']);

        foreach ($data as $key => $d) {
            if ($d){
                $settingData = SiteSetting::where('meta_key', $key)->first();
                if (is_null($settingData)) {
                    $setting = new SiteSetting();
                    $setting->meta_key = $key;
                    $setting->meta_value = $d;
                    $setting->save();
                } else {

                    $setting = SiteSetting::find($settingData->id);
                    $setting->meta_value = $d;
                    $setting->save();
                }
            }
        }

        return redirect('admin/site_settings')->with('status', 'saved successfully');


    }

}
