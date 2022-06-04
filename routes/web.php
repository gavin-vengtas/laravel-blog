<?php

use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\File;
use PhpParser\Node\Expr\ArrowFunction;
use Spatie\YamlFrontMatter\YamlFrontMatter;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('posts', [
        'posts' => Post::latest()->with('category','author')->get(),
        'url' => url('/')
    ]);
});

Route::get('posts/{post:slug}', function (Post $post) { //Post::where('slug',$slug)->first();
    return view('post', [
        'post'=> $post,
        'url' => url('/')
    ]);

});

Route::get('author/{user}', function (User $user){
    return view('posts', [
        'posts'=> $user->posts,
        'url' => url('/')
    ]);
});

Route::get('category/{category}', function ($category){
    $post = Post::where('category_id', $category)->get();
    return view('posts', [
        'posts'=> $post,
        'url' => url('/')
    ]);
});

//Alternative
/*
Route::get('posts/{postID}', function ($postID) {

    $post = Post::find($postID);

    if($post){
        return view('post', [
            'post'=> $post
        ]);
    }else{
        abort(404);
    }   
});*/