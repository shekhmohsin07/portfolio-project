<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function home()
    {
        return view('frontend.pages.index');
    }

    public function about()
    {
        return view('frontend.pages.about');
    }

    public function services()
    {
        return view('frontend.pages.services');
    }

    public function blogs()
    {
        return view('frontend.pages.blogs');
    }

    public function projects()
    {
        return view('frontend.pages.projects');
    }

    public function contact()
    {
        return view('frontend.pages.contact');
    }
}
