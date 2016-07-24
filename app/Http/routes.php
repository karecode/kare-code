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

Route::group(['prefix' => 'admin','middleware'=>['web','auth']], function () {
    Route::get('dashboard', 'Backend\AdminController@index');
    Route::get('blog-ekle', 'Backend\BlogController@get_blogEkle');
    Route::post('blog/resim-upload','Backend\BlogController@resimYukle');
    Route::post('/upload_image',['as'=>'ckeditor.upload','uses'=>'Backend\BlogController@ckeupload']);
});