<?php

use Illuminate\Support\Facades\Route;
use App\Models\Post;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/welcome', function () {

    return view('welcome');
    
});

// Route::get('/posts', function () {
//     return view('posts');
// });

Route::get('/', function () {

    $posts = Post::all();
    // ddd($posts);
    return view('posts', ['posts' => $posts]);

});

// Route::get('/post', function () {
//     $post = __DIR__ . '/../resources/posts/my-first-post.html';
//     return view('post', [
//         'post' => file_get_contents($post)
//     ]);
// });

// Route::get('/posts/{post}', function ($slug) {
    
//     if(! file_exists($path = __DIR__. "/../resources/posts/{$slug}.html")) {
//         // ddd('file does not exist');
//         return redirect('/');
//         // return abort(404);
//     }
//     $post = cache()->remember("post.{$slug}", now()->addMinutes(1), fn() => file_get_contents($path));

//     return view('post',['post' => $post,]);
// })->where('post', '[A-z_\-]+');

Route::get('/posts/{post}', function ($slug) {

    return view('post',['post' => Post::find($slug),]);

})->where('post', '[A-z_\-]+');
