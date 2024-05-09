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
    // $posts = array_map(function ($file){
    //     $document = YamlFrontMatter::parseFile($file);
    //     return new Post(
    //         $document->title,
    //         $document->excerpt,
    //         $document->date,
    //         $document->body(),
    //         $document->slug
    //     );

    // }, $files);

    // ddd($posts);

    // $document = YamlFrontMatter::parseFile(resource_path("posts/my-forth-post.html"));
    // ddd($document->date);

    // $posts = Post::all();
    // // ddd($posts);
    return view('posts', ['posts' => Post::all()]);

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
