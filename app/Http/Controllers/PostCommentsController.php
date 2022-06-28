<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class PostCommentsController extends Controller
{
    public function store(Post $post, Request $request)
    {
        //validate POST data
        request()->validate([
            'body' => 'required',
        ]);

        //create comment
        $comment = Comment::create([
            'post_id' => $post->id,
            'user_id' => $request->user()->id,
            'body' => request('body')
        ]);

        return Redirect::back()->with('success','Your comment has been added!'); // session()->flash('success','Your account has been created!');

    }

    public function index()
    {
        # code...
    }

    public function show()
    {
        # code...
    }

    public function update()
    {
        # code...
    }

    public function delete()
    {
        # code...
    }
}
