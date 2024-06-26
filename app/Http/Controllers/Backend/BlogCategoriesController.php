<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;

use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

use App\Models\BlogCategories;
use App\Models\FileManager;


class BlogCategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $categories = BlogCategories::latest()->orderBy('id', 'desc')->paginate(10);

        return view('backend.blogs.categories.index', [
            'categories' => $categories
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'category_title' => 'required|max:100|unique:blog_categories',
            'category_image' => 'nullable|mimes:png,PNG,JPG,jpg,jpeg,JPEG|max:500',
        ]);


        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }


        $now_day = date('F_Y');

        $file_location = "";
        $image_id = "";
        if ($request->hasFile('category_image')) {
            $path = public_path('uploads/files/' . $now_day);

            if (!File::isDirectory($path)) {
                File::makeDirectory($path, 0777, true, true);
            }

            $file = $request->file('category_image');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->move($path, $fileName);
            $fileModel = new FileManager;
            $file_location = 'uploads/files/' . $now_day . '/' . $fileName;

            $file_type = explode('/', $file->getClientMimeType());

            if ($filePath) {
                $fileModel->file_name = $fileName;
                $fileModel->file_type = $file_type[0];
                $fileModel->file_format = $file->getClientOriginalExtension();
                $fileModel->file_thumbnail = $file_location;
                $fileModel->file_path = $file_location;
                $fileModel->save();
            }

            $image_id = $fileModel->id;
        }


        $category_title = $request->category_title;
        $category_slug = Str::slug($category_title);

        $blog_category = BlogCategories::where('category_slug', 'LIKE', "%{$category_slug}%")->get();
        $count = $blog_category->count();

        if ($count > 0) {
            foreach ($blog_category as $category) {
                $data[] = $category['category_slug'];
            }

            if (in_array($category_slug, $data)) {
                $category_count = 0;
                while (in_array(($category_slug . '-' . ++$category_count), $data));
                $category_title = $category_title . " " . $category_count;
                $category_slug = $category_slug . '-' . $category_count;
            }
        }

        $category_create  = BlogCategories::create([
            'category_title' => $category_title,
            'category_slug' => $category_slug,
            'category_image' => $file_location,
            'category_description' => $request->category_description,
            'meta_tags' => $request->meta_tags,
            'meta_title' => $request->meta_title,
            'meta_keywords' => $request->meta_keywords,
            'meta_description' => $request->meta_description,
            'image_id' => $image_id,
        ]);

        if ($category_create) {
            toastr()->success('Categories has been created', 'Success');
        }

        return back();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BlogCategories  $BlogCategories
     * @return \Illuminate\Http\Response
     */
    public function show(BlogCategories $BlogCategories)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BlogCategories  $BlogCategories
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $category = BlogCategories::find($id);
        $categories = BlogCategories::latest()->orderBy('id', 'desc')->paginate(10);

        return view('backend.blogs.categories.categories_edit', [
            "category" => $category,
            "categories" => $categories,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BlogCategories  $BlogCategories
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'category_title' => 'required|max:100|unique:blog_categories,category_title,' . $id,
            'category_image' => 'nullable|mimes:png,PNG,JPG,jpg,jpeg,JPEG|max:500',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }


        $category = BlogCategories::find($request->id);
        $fileManager = FileManager::where('id', '=', $category->image_id)->first();

        $now_day = date('F_Y');

        $image_id = $category->image_id;
        $file_location = $fileManager->file_path;


        if ($request->hasFile('category_image')) {

            $fileManager->delete();
            unlink($fileManager->file_path);

            $path = public_path('uploads/files/' . $now_day);

            if (!File::isDirectory($path)) {
                File::makeDirectory($path, 0777, true, true);
            }

            $file = $request->file('category_image');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->move($path, $fileName);
            $fileModel = new FileManager;
            $file_location = 'uploads/files/' . $now_day . '/' . $fileName;

            $file_type = explode('/', $file->getClientMimeType());

            if ($filePath) {
                $fileModel->file_name = $fileName;
                $fileModel->file_type = $file_type[0];
                $fileModel->file_format = $file->getClientOriginalExtension();
                $fileModel->file_thumbnail = $file_location;
                $fileModel->file_path = $file_location;
                $fileModel->save();
            }

            $image_id = $fileModel->id;
        }

        $category_title = $request->category_title;
        $category_slug = Str::slug($category_title);

        $blog_category = BlogCategories::where('category_slug', 'LIKE', "%{$category_slug}%")->get();
        $count = $blog_category->count();

        if ($count > 0) {
            foreach ($blog_category as $category) {
                $data[] = $category['category_slug'];
            }

            if (in_array($category_slug, $data)) {
                $category_count = 0;
                while (in_array(($category_slug . '-' . ++$category_count), $data));
                $category_title = $category_title . " " . $category_count;
                $category_slug = $category_slug . '-' . $category_count;
            }
        }

        $category_create  = BlogCategories::where('id', "=", $request->id)->update([
            'category_title' => $category_title,
            'category_slug' => $category_slug,
            'category_image' => $file_location,
            'category_description' => $request->category_description,
            'meta_tags' => $request->meta_tags,
            'meta_title' => $request->meta_title,
            'meta_keywords' => $request->meta_keywords,
            'meta_description' => $request->meta_description,
            'image_id' => $image_id,
        ]);

        if ($category_create) {
            toastr()->success('Categories has been Update', 'Success');
        }

        return redirect()->route('blogs.category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BlogCategories  $BlogCategories
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = BlogCategories::find($id);
        $Is_Delete = $category->delete();
        if ($Is_Delete) {
            $fileManager = FileManager::where('id', '=', $category->image_id)->first();
            $fileManager->delete();
            unlink($fileManager->file_path);

            toastr()->success('Category Deleted Successfully', 'Success');
        }
        return back();
    }
}
