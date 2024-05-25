<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Follow;
use App\Models\User;
use App\Models\Notification;

class PostController extends Controller
{
    public function index(){
      return view('welcome', [
        "title" => 'home',
        "posts" => Post::with(['category', 'user'])->latest()->get()
      ]);
    }
    
    public function postProfil(){
      return view('users.index', [
        "title" => "profile",
        "posts" => Post::where('user_id', auth()->user()->id)->get(),
        
        "title" => "profile",
        
        "notif" => Notification::where('user_id', auth()->user()->id)->first(),
        
        "user" => User::where('id', auth()->user()->id)->first(),
        
        "postsCount" => Post::where('user_id', auth()->user()->id)->count(),
        
        "followingCount" => Follow::where('from_user_id', auth()->user()->id)->count(),
        
        "followersCount" => Follow::where('to_user_id', auth()->user()->id)->count()
      ]);
    }
    
    public function single(Post $post){
      return view('post.single', [
        "title" => "singglePost",
        "post" => $post
      ]);
    }
    
    public function search(Request $request){
      $result = $request->result;
      
      return view('other.search', [
        'posts' => Post::where('caption', 'like', '%' . $result . '%')->latest()->get(),
        'users' => User::where('username', 'like', '%' . $result . '%')->latest()->get(),
        'title' => 'search ' . $result
      ]);
    }
}
