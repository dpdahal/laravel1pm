<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{

    public function index()
    {
        return view('frontend.pages.home.home');
    }

    public function about()
    {
        return view('frontend.pages.about.about');
    }

    public function contact()
    {
        return view('frontend.pages.contact.contact');
    }
}
