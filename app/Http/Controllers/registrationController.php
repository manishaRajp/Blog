<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Like;
use Illuminate\Http\Request;
use App\Models\registration;
use Illuminate\Support\Facades\Auth;


class registrationController extends Controller
{

    function insert(Request $req)
    {
        $validated = $req->validate([
            'user' => 'required|max:255',
            'pass' =>'required| min:4|max:7',
            'pswd' => 'required| min:4| max:7',
            'email' => 'required|email',
            'image' =>'required',
        ]);
        $image = uploadFile($req->image, 'profile');   
        $data = new registration;
        $data->user_name = $req->user;
        $data->password = $req->pass;
        $data->re_password = $req->pswd;
        $data->email = $req->email;
        $data->profile = $image;
        $data->save();
        return view('auth.login');
    }
    protected function login(Request $request)
    {
        $this->validate($request, [
            'user'    => 'required',
            'pass'    => 'required',
        ]);
        $user = registration::where('user_name', $request->user)->where('password', $request->pass)->first();
        // dd($user); 
        Auth::login($user);

        $posts = Blog::all();
        return view('frontend.index', compact('posts'));
        
       
        
    }

    public function logout(Request $request){
        $user = registration::where('user_name', $request->user)->where('password', $request->pass)->first();
        Auth::logout();
        return redirect('/login');
    }
    public function like(Request $req,$id)
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
    
    
    public function create_blog(Request $request)
    {
       return redirect()->route('admin.blogs.create');
    }


    public function blog_details($id)
    {
        return Blog::find($id);
    }
    
    
}
