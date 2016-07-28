<?php

namespace App\Http\Controllers\Backend;

use App\Blog;
use App\Http\Controllers\Backend\AdminBaseController;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Input;
use Validator;
use Intervention\Image\Facades\Image;

class BlogController extends AdminBaseController
{
    public function get_blogEkle()
    {
        return view('backend.pages.blog_ekle');
    }

    public function post_blogEkle(Request $request)
    {
        $message = $url = '';
        $files = array('image' => Input::file('image'));
        // setting up rules
        $rules = array('image' => 'required | mimes:jpeg,jpg,gif,png',); //mimes:jpeg,bmp,png and for max size max:10000
        // doing the validation, passing post data, rules and the messages
        $validator = Validator::make($files, $rules);
        if ($validator->fails()) {
            // send back to the page with the input data and errors
            $message= 'Lütfen resim dosya biçimi kullanın';
        }
        else{
            if (Input::hasFile('image')) {
                $file = Input::file('image');
                if ($file->isValid()) {
                    $slug=str_slug($request->baslik);$i=0;
                    while(Blog::where('slug',$slug)->count()>0){
                        $i++;$slug=$slug.$i;
                    }
                    $filename = time().'.'.$file->getClientOriginalExtension();
                    $destinationPath='frontend/img/blog_resim/';
                    //Input::file('image')->move($destinationPath,$filename);
                    Image::make($file->getRealPath())->resize('555','360')->save($destinationPath.$slug.'555x360.'.$file->getClientOriginalExtension());
                    Image::make($file->getRealPath())->resize('769','322')->save($destinationPath.$slug.'769x322.'.$file->getClientOriginalExtension());
                    Image::make($file->getRealPath())->resize('400','400')->save($destinationPath.$slug.'400x400.'.$file->getClientOriginalExtension());
                    $url = '/frontend/img/blog_resim/' . $filename;
                    $request->merge(['slug'=>$slug,'user_id'=>Auth::user()->id]);
                    Blog::create($request->all());
                    return return_json('Blog Başarılı bir şekilde yüklendi',200);
                } else {
                    $message = 'An error occured while uploading the file.';
                }
            } else {
                $message = 'No file uploaded.';
            }
        }
        return $message;
    }

    public function resimYukle()
    {
        $allowed = array('png', 'jpg', 'gif');
        if (isset($_FILES['file']) && $_FILES['file']['error'] == 0) {

            $extension = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
            if (!in_array(strtolower($extension), $allowed)) {
                return return_json('Lütfen geçerli dosya biçimi kullanınız.',406,false);
            }
            $destinationPath = 'frontend/img/blog_resim/'; // upload path
            $extension = Input::file('file')->getClientOriginalExtension(); // getting image extension
            $fileName = time() . rand(11111, 99999) . '.' . $extension; // renameing image
            Input::file('file')->move($destinationPath, $fileName); // uploading file to given path
            return return_json('/' . $destinationPath . $fileName,200);
        }
        return return_json('Dosya gönderilmedi',204,false);
    }

    public function ckeupload()
    {
        $CKEditor = Input::get('CKEditor');
        $funcNum = Input::get('CKEditorFuncNum');
        $message = $url = '';
        $files = array('image' => Input::file('image'));
        // setting up rules
        $rules = array('image' => 'required and mimes:jpeg,jpg,gif,png,swf',); //mimes:jpeg,bmp,png and for max size max:10000
        // doing the validation, passing post data, rules and the messages
        $validator = Validator::make($files, $rules);
        if ($validator->fails()) {
            // send back to the page with the input data and errors
            $message= 'Lütfen resim dosya biçimi kullanın';
        }
        else{
            if (Input::hasFile('upload')) {
                $file = Input::file('upload');
                if ($file->isValid()) {
                    $filename = time().'.'.$file->getClientOriginalExtension();
                    $destinationPath='frontend/img/blog_resim/';
                    Input::file('upload')->move($destinationPath,$filename);
                    $url = '/frontend/img/blog_resim/' . $filename;
                } else {
                    $message = 'An error occured while uploading the file.';
                }
            } else {
                $message = 'No file uploaded.';
            }
        }

        return '<script>window.parent.CKEDITOR.tools.callFunction('.$funcNum.', "'.$url.'", "'.$message.'")</script>';
    }


}
