<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    public $data = [];

    public function data($key, $value = null)
    {
        return $this->data[$key] = $value;
    }

    public function __construct()
    {
        $this->data('categoryData', Category::all());
    }


    public function index()
    {
        return view('frontend.pages.home.home', $this->data);
    }

    public function about()
    {
        return view('frontend.pages.about.about', $this->data);
    }

    public function contact()
    {
        return view('frontend.pages.contact.contact', $this->data);
    }
}
