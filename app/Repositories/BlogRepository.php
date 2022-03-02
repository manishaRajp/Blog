<?php

namespace App\Repositories;

use Exception;

use App\Models\Blog;

use App\Contracts\BlogContract;
use App\Http\Requests\Category\StoreRequest;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class BlogRepository implements BlogContract
{
    // use PaginationTrait;
    # Note : extends BaseRepository for basic functionality
    # : if you want to change in existing function then only override existing function here else no need to define any function here.

    public function all()
    {
        return Blog::get();
    }
    public function edit($slug)
    {
        $categories = Category::all();
        $blogs = Blog::where('slug', $slug)->first();
        return [$categories, $blogs];
    }

    public function store($request)
    {
        $images = uploadFile($request['image'], 'profile');
        $blogs = new Blog();
        $blogs->user_id = Auth::id();
        $blogs->title = $request['title'];
        $blogs->description = $request['description'];
        $blogs->slug = $request['title'];
        $blogs->category_id = $request['category_id'];
        $blogs->shortlink = Str::random(5);
        $blogs->image = $images;
        $blogs->save();
        return $blogs;
    }

    public function update($request)
    {
        // dd($request);
        $blogs = Blog::where('slug', $request['slug'])->first();
        $images = uploadFile($request['image'], 'profile');
        $blogs-> update ([
            'user_id' => Auth::id(),
            'title' => $request['title'],
            'description' => $request['description'],
            'slug' => $request['title'],
            'category_id' => $request['category_id'],
            'shortlink' =>  Str::random(5),
            'image' => $images,
        ]);
        $blogs->save();
        dd($blogs);
        return $blogs;
    }
    public function delete($slug)
    {
        dd(1);
        $blogs = Blog::where('slug', $slug)->first();
        $destination = 'storage/profile/' . $blogs->image;
        dd($blogs->image);
        if (file::exists($destination)) {
            file::delete($destination);
        }
        $blogs->delete();
        $blogs->delete();
        return $blogs;
    }
}
