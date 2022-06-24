<?php

use App\Http\Controllers\PostController;
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

Route::get('/', [PostController::class, 'index'])->name('home');

Route::get('post/{post:slug}', [PostController::class, 'show']);

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