<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserPostController extends Controller
{
    public function userPosts(){
          $id = auth()->user()->id;
          $user_posts=User::with('posts')->where('id', $id)->get();
          return view('post.my_post',compact('user_posts'));
    }    
}
