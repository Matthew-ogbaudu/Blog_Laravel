<?php

namespace App\Models;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\File;
use Spatie\YamlFrontMatter\YamlFrontMatter;
//use PhpParser\Node\Scalar\MagicConst\File;

class Post
{
    public $title;
    public $excerpt;

    public $date;

    public $body;
    public $slug;
    public function __construct($title, $excerpt, $date, $body, $slug){
        $this->title=$title;
        $this->excerpt=$excerpt;
        $this->date=$date;
        $this->body=$body;
        $this->slug=$slug;
    }
    public static function myall()
    {
//        $files= File::files(resource_path("posts/"));
//       return array_map(function($file){
//           return $file->getContents();
//       },$files);
//       }
//        //return File::file(resource_path("posts/"));
        //using yaml
       // $documents=YamlFrontMatter::parseFile(resource_path('posts/myfirstpost.html'));
        //$document=[];
        // usign yaml
        return cache()->rememberForever('posts.all', function() {
            return collect(File::files(resource_path("posts")))
                ->map(fn($file) => YamlFrontMatter::parseFile($file))
                ->map(fn($document) => new Post(
                    $document->title,
                    $document->excerpt,
                    $document->date,
                    $document->body(),
                    $document->slug)

                )->sortByDesc('date');
        });



//
//        $files=File::files(resource_path('posts/'));
//        $posts=[];
//        foreach($files as $file){
            //$document=YamlFrontMatter::parseFile($file);
//            $posts[]=new Post(
//                $document->title,
//                $document->excerpt,
//                $document->date,
//                $document->body(),
//                $document->slug);
//        }
//        return $posts;
    }

    public static function find($postt)
    {
//        base_path();
//        $post2 = resource_path("posts/{$postt}.html");
//        /// ddd($post2);
//        //check if route existsxw
//        if (!file_exists($post2)) {
//            // ddd('file does not exist');
//            throw new ModelNotFoundException();
//
//            //return redirect('/');
//        }
//
//        //caching
//// $post= cache()->remember("posts.{$postt}", 10, function () use ($post2){
////     var_dump('file_get_contents');
////     return file_get_contents($post2);
//// });
////method 2 for caching
//        $post = cache()->remember("posts.{$postt}", 10, fn() => file_get_contents($post2));
//        return $post;
//        //$post=file_get_contents($post2);

        //of all the blog posts find the one with a matching requested slug
        $posts=static::myall();
        return ($posts->firstWhere('slug',$postt));
    }
}
