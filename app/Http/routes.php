<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('frontend.layouts.app');
});

Route::auth();

Route::get('/home', 'HomeController@index');
Route::get('/blog', 'BlogController@get_blog');
/*Route::get('/admin', function () {
    return redirect()->route('admin.dashboard');
});*/

Route::group(['prefix' => 'admin','middleware'=>['auth','admin']], function () {
    Route::get('dashboard', ['as'=>'admin.dashboard','uses'=>'Backend\AdminController@index']);
    Route::get('login', ['as'=>'admin.getLogin','uses'=>'Backend\AdminController@getLogin']);
    Route::get('blog/blog-ekle',['as'=>'admin.blogEkle','uses'=>'Backend\BlogController@get_blogEkle'] );
    Route::post('blog/blog-ekle',['as'=>'admin.blogEkle','uses'=>'Backend\BlogController@post_blogEkle'] );
    Route::post('blog/resim-upload','Backend\BlogController@resimYukle');
    Route::post('/upload_image',['as'=>'ckeditor.upload','uses'=>'Backend\BlogController@ckeupload']);
});