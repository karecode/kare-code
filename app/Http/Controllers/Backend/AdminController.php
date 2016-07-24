<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\Http\Requests;


class AdminController extends AdminBaseController
{
    public function index()
    {
        return view('backend.pages.dashboard');
    }
}
