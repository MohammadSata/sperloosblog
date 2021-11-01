<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $posts = Post::orderByDesc('updated_at')->paginate();

        return view('website.home', compact('posts'));
    }

    public function post(Post $post)
    {
        return view('website.post', compact('post'));
    }
}
