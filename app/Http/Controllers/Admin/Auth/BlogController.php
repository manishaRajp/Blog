<?php

namespace App\Http\Controllers\Admin\Auth;
use App\Repositories\BlogRepository;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Category;
use App\DataTables\BlogDataTable;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use App\Http\Requests\blog\StoreRequest;
use App\Http\Requests\blog\UpdateRequest;
use Illuminate\Support\Facades\Auth;


class BlogController extends Controller
{
  protected $blog;
    public function __construct(BlogRepository $blog)
    {
        $this->blog = $blog;
    }
    public function index(BlogDataTable $dataTable)
    {
        $blogs = $this->blog->all();
        return $dataTable->render('admin.blogs.index');
    }
    public function create()
    {
        $categories = Category::all();
        return view('admin.blogs.create')->with('categories', $categories);
    }
    public function store(StoreRequest $request)
    {
        $blogs=$this->blog->store($request);
        return response()->json([
            'message' => 'Blog Succcessfully created',
            'data' => $blogs
        ]);
        // $request->session()->flash('success', 'Your Data inserted successfully ');
        // return redirect()->route('admin.blogs.index');
    }
    function statusChange(Blog $blog)
    {
        if ($blog->status == '0') {
            $blog->status = '1';
        } else {
            $blog->status = '0';
        }
        $blog->save();
        session()->flash('success', 'Status Changed');
        return redirect()->route('admin.blogs.index');
    }
    public function show($id)
    {
        //
    }
    public function edit($slug)
    {
        $cat = $this->blog->edit($slug);
        $categories = $cat[0];
        $blogs = $cat[1];
        return view('admin.blogs.edit', compact('blogs', 'categories'));
    }
    public function update(UpdateRequest $request)
    {
        // dd(1);

        $blogs = $this->blog->update($request->all());
        return response()->json([
            'message'=> 'blog updated succesfully',
            'data'=> $blogs,
        ]);
        // $request->session()->flash('success', 'Your Data Updated successfully ');
        // return redirect()->route('admin.blogs.index');
    }
    public function destroy($slug)
    {
        $blogs=$this->blog->delete($slug);
        return response()->json([
            'message'=> 'blog delete succesfully',
            'data'=> $blogs,
        ]);
        // return redirect()->route('admin.blogs.index')->with('error', 'data deleted');
    }
}
