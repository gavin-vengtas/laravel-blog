<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {           
        return view('posts.index', [
            'posts' => Post::latest()->filter(request(['search','category','author']))->get(),
            'url' => url('/'),
        ]);
    }

    public function show(Post $post)
    {
        return view('posts.show', [
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
