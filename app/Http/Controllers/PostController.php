<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {        
        
        return view('posts', [
            'posts' => Post::latest()->filter(request(['search']))->get(),
            'categories' => Category::all()->sortBy('name', SORT_STRING),
            'url' => url('/')
        ]);
    }

    public function show(Post $post)
    {
        return view('post', [
            'post'=> $post,
            'categories' => Category::all()->sortBy('name', SORT_STRING),
            'url' => url('/')
        ]);
    }

    public function getPosts()
    {
        // Post::latest()->filter()->get();

        // $posts = Post::latest(); //Post::latest()->get()

        // if (request('search')) {
        //     $posts->where('title', 'like', '%'.request('search').'%')
        //     ->orWhere('body', 'like', '%'.request('search').'%');
        // }

        // return $posts->get();
    }
}
