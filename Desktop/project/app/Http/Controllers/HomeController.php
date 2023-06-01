<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $posts = Post::limit(8)->orderBy('id', 'desc')->get();

        return view('home', compact('posts'));
    }
    public function about()
    {
        return view('about');
    }
}
