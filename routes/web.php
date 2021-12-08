<?php

namespace App\Http\Controllers;

use \Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VideoController;
use Artisan;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/clear-cache', function () {
    Artisan::call('storage:link');
    Artisan::call('cache:clear');
    Artisan::call('view:clear');
    Artisan::call('route:clear');
    Artisan::call('clear-compiled');
    Artisan::call('config:cache');
    Artisan::call('storage:link');

    return "Cache is cleared";
});
Route::get('/updateapp', function () {
    Artisan::call('dump-autoload');
    echo 'dump-autoload complete';
});
Route::get('/search', 'VideoController@search');
Route::get('/', 'HomeController@index')->name('/');
Route::get('/video', 'VideoController@uplaodVideo')->name('/video');
Route::any('/userlogin', 'HomeController@userLogin')->name('userlogin');
Route::any('/userregister', 'HomeController@userRegister')->name('userregister');
Route::get('/signup', 'HomeController@register')->name('signup');
Auth::routes();
Route::post('/comment/{video}', 'CommentController@store')->name('comment.store');
Route::post('/comment-reply/{message}', 'CommentReplyController@store')->name('reply.store');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/challange/{video}', 'ChallangeController@store')->name('challange.store');

Auth::routes();
//Route::group(['middleware' => 'auth'], function () {
Route::get('my-account', 'HomeController@index')->name('my-account');
Route::get('account/edit', 'HomeController@editInfo')->name('editinfo');
Route::get('userlogout', 'HomeController@userlogout')->name('userlogout');
Route::get('uploadvideo', 'VideoController@uplaodVideo')->name('uploadvideo');
Route::get('singlevideo/{slug}', 'VideoController@singlevideo')->name('singlevideo');
Route::get('allvideos', 'VideoController@allvideos')->name('allvideos');
Route::post('savevideo', 'VideoController@savevideo')->name('savevideo');
Route::group(['prefix' => 'video', 'as' => 'video.'], function () {
    Route::post('store', [VideoController::class, 'store'])->name('store');
});
//});
Route::namespace('Admin')->group(function () {

    Route::prefix('admin')->group(function () {
        Route::get('/', 'LoginController@index')->name('admin_login');
        Route::group(['middleware' => 'auth'], function () {
            Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
            Route::prefix('user')->group(function () {
                Route::get('/', 'UserController@index')->name('user.index');
                Route::get('edit/{id}', 'UserController@editUser')->name('user.edit');
                Route::get('create', 'UserController@create')->name('user.create');
                Route::post('save', 'UserController@save')->name('user.save');
                Route::post('update/{id}', 'UserController@update')->name('user.update');
                Route::get('delete/{id}', 'UserController@delete')->name('user.delete');
            });


            Route::prefix('category')->group(function () {
                Route::get('/', 'CategoryController@index')->name('category.index');
                Route::get('edit/{id}', 'CategoryController@edit')->name('category.edit');
                Route::get('create', 'CategoryController@create')->name('category.create');
                Route::post('save', 'CategoryController@save')->name('category.save');
                Route::post('update/{id}', 'CategoryController@update')->name('category.update');
                Route::get('delete/{id}', 'CategoryController@delete')->name('category.delete');
            });

            Route::prefix('pagecontent')->group(function () {
                Route::get('/', 'PageContentController@index')->name('pagecontent.index');
                Route::get('edit/{id}', 'PageContentController@edit')->name('pagecontent.edit');
                Route::get('create', 'PageContentController@create')->name('pagecontent.create');
                Route::any('save', 'PageContentController@save')->name('pagecontent.save');
                Route::post('update/{id}', 'PageContentController@update')->name('pagecontent.update');
                Route::get('delete/{id}', 'PageContentController@delete')->name('pagecontent.delete');
            });

            Route::prefix('tags')->group(function () {
                Route::get('/', 'TagsController@index')->name('tags.index');
                Route::get('edit/{id}', 'TagsController@edit')->name('tags.edit');
                Route::get('create', 'TagsController@create')->name('tags.create');
                Route::any('save', 'TagsController@save')->name('tags.save');
                Route::post('update/{id}', 'TagsController@update')->name('tags.update');
                Route::get('delete/{id}', 'TagsController@delete')->name('tags.delete');
            });
            Route::prefix('videos')->group(function () {
                Route::get('/', 'VideoController@index')->name('videos.index');
                Route::get('edit/{slug}', 'VideoController@edit')->name('videos.edit');
                Route::get('view/{slug}', 'VideoController@view')->name('videos.view');

                //Route::any('singlevideo',[VideoController::class,'singlevideo'])->name('videos.singlevideo');
                Route::get('create', 'VideoController@create')->name('videos.create');
                Route::any('save', 'VideoController@save')->name('videos.save');
                Route::post('update/{id}', 'VideoController@update')->name('videos.update');
                Route::get('delete/{id}', 'VideoController@delete')->name('videos.delete');
            });


            Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
            Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
            Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);
            Route::get('site_settings', ['as' => 'site_settings', 'uses' => 'SettingsController@index']);
            Route::post('site_settings_save', ['as' => 'site_settings.save', 'uses' => 'SettingsController@save']);
        });
    });
});
