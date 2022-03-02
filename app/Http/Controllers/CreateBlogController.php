<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\blog\StoreRequest;
use App\Repositories\BlogRepository;
use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class CreateBlogController extends Controller
{
    protected $blog;
    public function __construct(BlogRepository $blog)
    {
        $this->blog = $blog;
        // $this->categoryService = $categoryService;
    }
    public function create()
    {
        $categories = Category::all();
        return view('frantend.user_create_blog')->with('categories', $categories);
    }

    public function store_blog(StoreRequest $request)
    {          
        $blogs=$this->blog->store($request);
        // dd($blogs);
        return redirect()->route('home');
       
    }
}
