<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;

class UserController extends Controller
{
  public function index(){
    return view('users.friends', [
      "users" => User::all()
    ]);
  }
  
  public function single(User $user){
    return view('users.single', [
        "user" => $user
    ]);
  }
}
