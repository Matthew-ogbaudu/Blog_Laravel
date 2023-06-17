<?php

use App\Models\Post;
use Illuminate\Support\Facades\Route;
use Spatie\YamlFrontMatter\YamlFrontMatter;
use App\Models\Category;
use App\Models\User;
use App\Http\Controllers\PostsController;

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

Route::get('/',[\App\Http\Controllers\PostsController::class, 'index']

    //ddd($documents);
    // ddd($posts[0]->title);
    //return view ('posts', ['posts'=>$documents])
//    $posts=Post::latest();//->with('category','author')->get();
//    $categories=Category::all();
//    if(request('search')){
//        $posts->where('title','like','%'.request('search').'%')
//            ->orWhere('body','like','%'.request('search').'%');
//    }
//    $posts=Post::myall() ;
//    //ddd($posts[0]->getContents());
//    //ddd($posts);
//    return view("welcome",['posts'=>$posts, 'categories'=>$categories]);

    //ddd($posts[0]->getContents());
    //return Post::find('myfirstpost');
    //return  view("welcome");
    // return view('welcome',['posts'=>$posts->get(), 'categories'=>Category::all()]);
//    return view('welcome', ['posts'=>$posts]);
)->name('home');
Route::get('/posts/{post:slug}', [App\Http\Controllers\PostsController::class, 'show']);//function (Post $post) { //checking where the slug exists or bot using findorFail
    //find a post by its slug and pass it to a view called "pst"
    //$post=Post::findorFail($id);
    //dd($post);

    //return view('post', ['single' =>$post]); //Post::find($id)]);
    //return $slug;
//format wildcard with regular expression
//});
Route::get('categories/{category:slug}', function (Category $category){
    return view("welcome",['posts'=>$category->posts->load(['category','author']),'currentcategory'=>$category, 'categories'=>Category::all()]);

});
Route::get('authors/{author:username}', function (User $author){
    return view("welcome",['posts'=>$author->posts->load(['category','author']), 'categories'=>Category::all()]);

});
Route::get('register', [App\Http\Controllers\registercontroller::class, 'create']);
Route::post('register', [App\Http\Controllers\registercontroller::class, 'store']);
//where('single', '[A-z_\-]+');
