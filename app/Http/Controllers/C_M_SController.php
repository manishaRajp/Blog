<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\CMS;
use Illuminate\Http\Request;

class C_M_SController extends Controller
{
    public function About(){
        $posts = Blog::all();
        $about = CMS::all();
        return view('frantend.home', compact('about', 'posts'));
    }
}
