<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Request as CustomRequest;
use Intervention\Image\Facades\Image;

class NewsController extends Controller
{
    public $thumbNailName = '';

    public function thumbmnail()
    {
        return $this->thumbNailName;
    }

    public function customFileUpload($uploadPath, $isThumbnail = false)
    {
        if (CustomRequest::file()) {
            $file = CustomRequest::file();
            $file = Arr::first($file);
            if (!file_exists($uploadPath)) {
                File::makeDirectory($uploadPath, 0755, true);
            }

            $uploadLocation = public_path($uploadPath);
            $ext = $file->getClientOriginalExtension();
            $imageName = md5(microtime()) . '.' . $ext;

            if ($isThumbnail == true) {
                $thumbnailPath = public_path($uploadPath . '/thumbnail/');
                if (!file_exists($thumbnailPath)) {
                    File::makeDirectory($thumbnailPath, 0755, true);
                }
                $imageThumbnailPath = public_path($uploadPath . '/thumbnail/' . $imageName);
                $image = Image::make($file->getRealPath())->resize(200, null, function ($fileObj) {
                    $fileObj->aspectRatio();
                });
                $image->save($imageThumbnailPath);
                $this->thumbNailName = $imageName;
            }

            if ($file->move($uploadLocation, $imageName)) {

                return $imageName;
            }

            return false;
        }

        return false;
    }

    public function deleteFile($id)
    {
        $user = News::findOrFail($id);
        $categoryImage = public_path('uploads/news/' . $user->image);
        if (file_exists($categoryImage) && is_file($categoryImage)) {
            unlink($categoryImage);
            return true;
        }
        return true;
    }

    public function deleteThumbnail($id)
    {
        $user = News::findOrFail($id);
        $categoryImage = public_path('uploads/news/thumbnail/' . $user->thumbnail);
        if (file_exists($categoryImage) && is_file($categoryImage)) {
            unlink($categoryImage);
            return true;
        }
        return true;
    }

    public function index()
    {
        $newsData = News::orderBy('id', 'desc')->get();
        return view('backend.pages.news.index', compact('newsData'));
    }

    public function create()
    {
        $categoryData = Category::all();

        return view('backend.pages.news.create', compact('categoryData'));
    }


    public function store(Request $request)
    {


        $this->validate($request, [
            'category_id' => 'required',
            'title' => 'required',
            'slug' => 'required',
            'date' => 'required',
            'status' => 'required',
            'image' => 'mimes:jpg,jpeg,png,gif'
        ]);

        $obj = new news();
        $obj->title = $request->title;
        $obj->slug = Str::slug($request->slug);
        $obj->date = $request->date;
        $obj->status = $request->status;
        $obj->meta_keywords = $request->meta_keywords;
        $obj->meta_description = $request->meta_description;
        $obj->summary = $request->summary;
        $obj->description = $request->description;
        $obj->posted_by = Auth::user()->id;
        $obj->category_id = $request->category_id;
        $obj->image = $this->customFileUpload('uploads/news/', true);
        $obj->thumbnail = $this->thumbmnail();


        if ($obj->save()) {
            return redirect()->route('admin-news.index')->with('success', 'news was successfully created');
        } else {
            return redirect()->back()->with('error', 'there was a problems');
        }


    }


    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $categoryData = Category::findOrFail($id);

        return view('backend.pages.category.edit', compact('categoryData'));

    }


    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required|', [
                Rule::unique('categories', 'title')->ignore($id)
            ],
            'slug' => 'required|', [
                Rule::unique('categories', 'slug')->ignore($id)
            ],
            'date' => 'required',
            'status' => 'required',
            'image' => 'mimes:jpg,jpeg,png,gif'
        ]);

        $obj = Category::findOrFail($id);
        $obj->title = $request->title;
        $obj->slug = Str::slug($request->slug);
        $obj->date = $request->date;
        $obj->status = $request->status;
        $obj->meta_keywords = $request->meta_keywords;
        $obj->meta_description = $request->meta_description;
        $obj->summary = $request->summary;
        $obj->description = $request->description;
        $obj->posted_by = Auth::user()->id;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $imageName = md5(microtime()) . '.' . $ext;
            $uploadPath = public_path('uploads/category');
            if ($this->deleteFile($id) && $file->move($uploadPath, $imageName)) {
                $obj->image = $imageName;
            }


        }


        if ($obj->update()) {
            return redirect()->route('admin-category.index')->with('success', 'category was successfully updated');
        } else {
            return redirect()->back()->with('error', 'there was a problems');
        }

    }


    public function destroy($id)
    {

        if ($this->deleteFile($id) && Category::findOrFail($id)->delete()) {
            return redirect()->back()->with('success', 'data was deleted');
        } else {
            return redirect()->back()->with('error', 'errors');
        }
    }
}
