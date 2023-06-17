<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models;

class registercontroller extends Controller
{
    //
    public function create(){
        return view ('register');
    }
    public function store(){
       $attributes= request()->validate(
            [
                'name'=>'required|max:20',
                'username'=>'required|max:15|min:3|unique:users,username',
                'email'=>'required|email|unique:users,email',
                'password'=>'required|min:8|max:15'
            ]

        );
       $attributes['password']=bcrypt($attributes['password']);
       Models\User::create($attributes);

       session()->flash('success', 'Your account has been created.');
       return redirect('/');
    }
}
