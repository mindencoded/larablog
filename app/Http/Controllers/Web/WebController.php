<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class WebController extends Controller
{
    public function index(): View
    {
        return view('web.index');
    }

    public function detail(): View
    {
        return view('web.index');
    }

    public function post_category(): View
    {
        return view('web.index');
    }

    public function contact(): View
    {
        return view('web.index');
    }

    public function categories()
    {
        return view('web.index');
    }
}
