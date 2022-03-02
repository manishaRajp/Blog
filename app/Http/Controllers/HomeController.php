<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\CMS;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
   
     
    public function index()
    {
        $about = CMS::all();
        $posts = Blog::all(); 
        $user = Auth::user();
        return view('frantend.home', compact('posts', 'user', 'about')); //returns the view with posts
    }
     
    public function view()
    {
        return view('frantend.user_edit');
    }
    public function update(Request $request ,$id)
    {
        // $validated = $request->validate([
        //     'name' => 'required|max:255',
        //     'email' => 'required|email',
        //     'profile' => 'required',
        // ]);
        $profile = uploadFile($request['profile'], 'profile');
        $user = User::findOrFail($id);
        $user->name=$request['username'];
        $user->email=$request['email'];
        $user->profile=$profile;
        $user->save();
        return redirect()->route('user_profile_view');
    }
}
