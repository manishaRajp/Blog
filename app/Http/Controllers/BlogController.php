<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Like;
use App\Models\User;
use App\Repositories\BlogRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpKernel\Profiler\Profile;

class BlogController extends Controller
{
    // protected $blog;
    protected $model;
    public function __construct(BlogRepository $blog)
    {
        $this->blog = $blog;
        
    }
    public function index()
    {
        $blogs = Blog::all();
        $like_user = like::all();
        return view('frantend.welcome', compact('blogs', 'like_user'));
    }
    public function user_blog(Request $req, User $user)
    {
        $posts = Blog::with('user')->get();
        $blogs = Blog::where('user_id', Auth::id())->get();
        return view('frantend.user_profile_view', compact(['posts', 'blogs']));
    }
    public function like(Request $req, $id)
    {
        $like = new Like();
        $blog_id = Blog::find($id);
        $user_Id = Auth::id();
        $like->user_Id = $user_Id;
        $like->blog_id = $blog_id->id;
        $like->status = 'Like';
        $like->save();
        return redirect()->back();
    }
    public function user_dislikes(Request $request)
    {
        $blog_id = Blog::find($request['id']);
        $dislike = Like::where('user_id', Auth::user()->id)->where('blog_id', $blog_id->id)->first();
        $dislike->forceDelete();
        return redirect()->back();
    }
    public function edit_blog_button(Request $req)
    {
        $blog_id = Blog::all();
        $user_Id = Auth::id();
        return view('frantend.blog_detail_view', compact('blog_id'));
    }
    public function  blog_fatch(Request $request, $slug)
    {
        $cat = $this->blog->edit($slug);
        $catagory = $cat[0];
        $blog_edit = $cat[1];
        return view('frantend.user_blog_edit', compact('blog_edit', 'catagory'));
    }
    public function blog_edit(Request $request, $slug)
    {
            // dd($slug);
        $blogs = $this->blog->update($request, $slug);
    
        return redirect()->route('home');
    }
    public function blog_delete($slug)
    {
        // $blog_delete = Blog::where('slug', $slug)->first();
        // $blog_delete->forceDelete();
        $blogs= $this->blog->delete($slug);

        return redirect()->route('home');
    }
    public function detail(Blog $blog, $slug)
    {
        $blog = Blog::with('blogComment')->where('slug', $slug)->first();
        $like_user = Like::where('user_id', Auth::user()->id)->where('blog_id', $blog->id)->first();
        return view('frantend.blog_detail_view', compact(['blog', 'like_user']));
    }
    public function comment(Request $request, $id)
    {
        $comment = new Comment();
        $blog_id = Blog::where('id', $id)->first();
        $user_Id = Auth::id(); 
        $comment->name = Auth::user()->name;
        $comment->user_Id = $user_Id;
        $comment->blog_id = $blog_id->id;
        $comment->comment = $request['comment'];
        $comment->save();
        return redirect()->back();
    }
}
