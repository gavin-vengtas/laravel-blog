<?php

use Illuminate\Support\Facades\Route;
use App\Models\Post;
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
    return view('posts', ['post' => Post::all()]);
});

Route::get('posts/{postname}', function ($slug) {

    $post = Post::find($slug);

    if($post){
        return view('post', [
            'post'=> Post::find($slug)
        ]);
    }else{
        abort(404);
    }   

    // ddd(Post::find($slug));
})->where('postname','[0-9A-z_\-]+');