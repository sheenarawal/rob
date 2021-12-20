<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;

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

Route::group(['middleware'=>'guest'],function (){
    Route::match(['get','post'],'/login', [AuthController::class,'login'])->name('login');
    Route::match(['get','post'],'/signup', [AuthController::class,'register'])->name('signup');
});
Route::group(['middleware'=>'auth'],function (){
    Route::get('logout', [AuthController::class,'logout'])->name('logout');

    Route::get('/', [VideoController::class, 'index'])->name('index');
    Route::get('category/{slug}', [VideoController::class, 'category'])->name('video.category');
    Route::group(['prefix' => 'video', 'as' => 'video.'], function () {
        Route::get('show/{slug}', [VideoController::class, 'show'])->name('view');
    });
    Route::group(['prefix' => 'video', 'as' => 'video.'], function () {
        Route::post('store', [VideoController::class, 'store'])->name('store');
        Route::get('upload', [VideoController::class, 'create'])->name('create');
        Route::post('/comment/{video}', 'CommentController@store')->name('comment.store');
        Route::post('/comment-reply/{comment}', 'CommentReplyController@store')->name('reply.store');
        Route::post('/like',[VideoLikeController::class,'store'])->name('like.store');
        Route::post('/dislike',[VideoDislikeController::class,'store'])->name('dislike.store');
    });
    Route::group(['prefix'=>'account','as'=>'account.'],function (){
        Route::get('/page/{tag?}', 'HomeController@index')->name('index');
        Route::get('video', 'HomeController@video')->name('video');
        Route::get('edit', [AuthController::class,'editInfo'])->name('edit');
    });

    Route::group(['prefix'=>'challenge','as'=>'challenge.'],function (){
        Route::get('create/{video}', [ChallengeController::class,'create'])->name('create');
        Route::get('status/{challenge}/{status}', [ChallengeController::class,'status'])->name('status');
        Route::match(['get','post'],'video/{video}', [ChallengeController::class,'video'])->name('video.store');
    });
});
Route::get('/search', 'VideoController@search');

Route::get('/admin', 'Admin\LoginController@index')->name('admin_login');
Route::group(['middleware' => 'auth','prefix'=>'admin','namespace'=>'Admin'], function () {

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
        Route::get('edit/{category}', 'CategoryController@edit')->name('category.edit');
        Route::get('create', 'CategoryController@create')->name('category.create');
        Route::post('save', 'CategoryController@save')->name('category.save');
        Route::post('update/{tag?}', 'CategoryController@update')->name('category.update');
        Route::get('delete/{tag}', 'CategoryController@delete')->name('category.delete');
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
        Route::get('edit/{tag}', 'TagsController@edit')->name('tags.edit');
        Route::get('create', 'TagsController@create')->name('tags.create');
        Route::any('save', 'TagsController@save')->name('tags.save');
        Route::post('update/{tag?}', 'TagsController@update')->name('tags.update');
        Route::get('delete/{id}', 'TagsController@delete')->name('tags.delete');
    });

    Route::prefix('videos')->group(function () {
        Route::get('/', 'VideoController@index')->name('videos.index');
        Route::get('edit/{video}', 'VideoController@edit')->name('videos.edit');
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
