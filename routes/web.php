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

    $posts = Post::latest(); //Post::latest()->get()

    if (request('search')) {
        $posts->where('title', 'like', '%'.request('search').'%')
        ->orWhere('body', 'like', '%'.request('search').'%');
    }
    
    return view('posts', [
        'posts' => $posts->get(),
        'categories' => Category::all()->sortBy('name', SORT_STRING),
        'url' => url('/')
    ]);
})->name('home');

Route::get('post/{post:slug}', function (Post $post) { //Post::where('slug',$slug)->first();
    return view('post', [
        'post'=> $post,
        'categories' => Category::all()->sortBy('name', SORT_STRING),
        'url' => url('/')
    ]);

});

Route::get('author/{author:username}', function (User $author){
    return view('posts', [
        'posts'=> $author->posts->sortByDesc('created_at'),
        'categories' => Category::all()->sortBy('name', SORT_STRING),
        'url' => url('/')
    ]);
});

Route::get('category/{category:slug}', function (Category $category){
    //$post = Post::latest()->where('category_id', $category)->with('category','author')->get();
    
    return view('posts', [
        'posts'=> $category->posts->sortByDesc('created_at'),
        'categories' => Category::all()->sortBy('name', SORT_STRING),
        'currentCategory'=> $category,
        'url' => url('/')
    ]);
})->name('category');

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