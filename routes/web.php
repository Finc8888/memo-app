<?php

use Illuminate\Support\Facades\Route;

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
Route::get('/', function () {
    return view('blog');
    // return ['name' => 'Bob', 'age' => 23];
});

// Route::get('/posts', function () {
//     return view('posts');
// });

Route::get('/', function () {
    return view('posts');
});

Route::get('/post', function () {
    return view('post');
});

Route::get('/posts/{post}', function ($slug) {
    $path = __DIR__. "/../resources/posts/{$slug}.html";
    if(! file_exists($path)) {
        return redirect('/');
        // return abort(404);
    }
    return view('post',
        [
            'post' => file_get_contents($path),
        ]
    );
});
