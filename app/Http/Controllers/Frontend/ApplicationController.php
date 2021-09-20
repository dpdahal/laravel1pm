<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\News;
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

    public function getNewsByCategory(Request $request)
    {
        $criteria = $request->criteria;
        $categoryData = Category::where('slug', '=', $criteria)->first();
        $this->data('categorySingleData', $categoryData);
        return view('frontend.pages.news.news-list', $this->data);
    }

    public function newsDetails(Request $request)
    {
        $criteria = $request->criteria;
        $newsDetails = News::where('slug', '=', $criteria)->first();
        $this->data('newsDetails', $newsDetails);
        return view('frontend.pages.news.news-details', $this->data);
    }
}
