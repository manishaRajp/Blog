<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\CMS;
use App\Models\ContactUs;
use Illuminate\Http\Request;
use App\Http\Requests\frantend\StoreContactRequest;

class ContactController extends Controller
{
    public function index()
    {
        $posts = Blog::all();
        $about = CMS::all();
        return view('frantend.home',compact('posts', 'about'));        
    }
    public function store(Request $request)
    {
        $contact = new ContactUs;
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->phone = $request->phone;
        $contact->message = $request->message;
        $contact->save();
        return redirect()->back();
    }
}
