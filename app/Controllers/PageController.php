<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class PageController extends BaseController
{
    public function index()
    {
        //
    }

    public function dashboard()
    {
        return view('pages/dashboard');
    }
}
