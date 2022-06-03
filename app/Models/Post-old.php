<?php

namespace App\Models;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\File;
use Spatie\YamlFrontMatter\YamlFrontMatter;

class Post
{
    public $title;
    public $excerpt;
    public $date;
    public $body;
    public $name;

    public function __construct($title,$excerpt,$date,$body,$name)
    {
        $this->title = $title;
        $this->excerpt = $excerpt;
        $this->date = $date;
        $this->body = $body;
        $this->name = $name;
    }

    public static function find($slug){
        $posts = static::all();

        return $posts->firstWhere('name', $slug);
    }

    public static function all()
    {
        return cache()->remember('posts.all', 3600, function () {
            return collect(File::files(resource_path("posts/")))
                ->map(function ($file){
                    return YamlFrontMatter::parseFile($file);
                })
                ->map(function($document){
                    return new Post(
                        $document->title,
                        $document->excerpt,
                        $document->date,
                        $document->body(),
                        $document->name
                    );
                })
                ->sortByDesc('date');            
        });

    }
}