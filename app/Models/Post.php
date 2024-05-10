<?php

namespace App\Models;

use Illuminate\Support\Facades\File;
use Spatie\YamlFrontMatter\YamlFrontMatter;

class Post {
    public $title;
    public $excert;
    public $date;
    public $body;
    public $slug;

    public function __construct(string $title, string $excerpt, $date, mixed $body, string $slug) {
        $this->title = $title;
        $this->excerpt = $excerpt;
        $this->date = $date;
        $this->body = $body;
        $this->slug = $slug;
    }

    // public static function find($slug) {
    //     if(! file_exists($path = resource_path("posts/{$slug}.html"))) {
    //         // ddd('file does not exist');
    //         throw new ModelNotFoundExeption();
    //         // return redirect('/');
    //         // return abort(404);
    //     }
    //     return cache()->remember("post.{$slug}", now()->addMinutes(1), fn() => file_get_contents($path));

    // }

    public static function all() {
        // $files = File::files(resource_path("posts/"));

        // return array_map(fn($file) => $file->getContents(), $files);

        // Tkinter commands
        // cache('posts.all');
        // cache()->forget('posts.all');
        // cache()->put('foo', 'bar');
        // cache()->get('foo');
        return cache()->rememberForever("posts.all", function() {
            return collect(File::files(resource_path("posts/")))
            ->map(fn ($file) => YamlFrontMatter::parseFile($file))
            ->map(fn ($document) => new Post(
                    $document->title,
                    $document->excerpt,
                    $document->date,
                    $document->body(),
                    $document->slug
                ))
            ->sortByDesc('date');
        });
    }

    public static function find($slug) {
        return static::all()->firstWhere("slug", $slug);
        // return self::all()->where("slug", $slug)->first();
    }
}