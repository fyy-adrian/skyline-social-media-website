<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Skychat;
use App\Models\User;

class SkychatController extends Controller
{
    public $chats;
    
    public function message(User $user){
      return view('skychat.messages', [
        "title" => "singglePost",
        "user" => $user
      ]);
    }

}
