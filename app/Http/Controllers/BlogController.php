<?php

namespace App\Http\Controllers;

use App\Blog;
use Illuminate\Http\Request;

use App\Http\Requests;

class BlogController extends Controller
{
    public function get_blog()
    {
        $blog=Blog::paginate(1);
        return view('frontend.pages.blog')->with('bloglar',$blog);
    }
}
