<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Posts;

class BlogController extends Controller
{
    public function index(Posts $posts){
        $data = $posts->orderBy('created_at','desc')->paginate(3);
        return view('blog', compact('data'));
    }

    public function isi_blog($slug){
        $data = Posts::where('slug', $slug)->get();
        return view('blog.isi_post', compact('data'));
    }
}
