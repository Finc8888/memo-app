<?php

namespace App\Models;

use Illuminate\Support\Facades\File;

class Post {
    public static function find($slug) {
        if(! file_exists($path = resource_path("posts/{$slug}.html"))) {
            // ddd('file does not exist');
            throw new ModelNotFoundExeption();
            // return redirect('/');
            // return abort(404);
        }
        return cache()->remember("post.{$slug}", now()->addMinutes(1), fn() => file_get_contents($path));

    }

    public static function all() {
        $files = File::files(resource_path("posts/"));

        return array_map(fn($file) => $file->getContents(), $files);
    }
}