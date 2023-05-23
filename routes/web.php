<?php

use App\Models\Post;
use Illuminate\Support\Facades\Route;
use Spatie\YamlFrontMatter\YamlFrontMatter;


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

Route::get('/', function () {

   //ddd($documents);
   // ddd($posts[0]->title);
    //return view ('posts', ['posts'=>$documents])
    $posts=Post::myall();
//    $posts=Post::myall() ;
//    //ddd($posts[0]->getContents());
//    //ddd($posts);
    return view("welcome",['posts'=>$posts]);

    //ddd($posts[0]->getContents());
    //return Post::find('myfirstpost');
    //return  view("welcome");
    return view('welcome', ['posts'=>$posts]);
});
Route::get('/posts/{post}', function ($postt) {
    //find a post by its slug and pass it to a view called "pst"
    $post=Post::find($postt);

    return view('post', ['single' => Post::find($postt)]);
    //return $slug;
//format wildcard with regular expression
})->where('single', '[A-z_\-]+');
