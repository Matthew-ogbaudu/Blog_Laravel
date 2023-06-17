<?php

namespace App\Http\Controllers;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Models\Category;

class PostsController extends Controller
{
    public function index()
    {


        return view('welcome', ['posts' => Post::latest()->filter(request(['search']))->paginate(3)->withQueryString(), 'categories' => Category::all()]);
        ////
    }
    public function show(Post $post){
        return view('post', ['single' =>$post]);
    }
//    protected function getPosts(){
//        return Post::latest()->filter()->get();
////        if (request('search')) {
////            $posts->where('title', 'like', '%' . request('search') . '%')
////                ->orWhere('body', 'like', '%' . request('search') . '%');
////        }
////        return $posts->get();
//    }
}
