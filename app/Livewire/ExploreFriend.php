<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\Follow;
use App\Models\Notification;

class ExploreFriend extends Component
{
  public $users;
  public $border;
  public $notif;
  public $title = 'explore';
  public $keyword;
  
  public function render()
  {
      $this->notif = Notification::where('user_id', auth()->user()->id)->latest()->first();
      
      $this->border = 'friends';
      
      if($this->keyword !== null){
        $this->users = User::with('followers')->where('name', 'like', '%' . $this->keyword . '%')->latest()->get();
      }else{
        $this->users = User::with('followers')->latest()->get();
      }
      
      return view('livewire.explore-friend');
  }


  
  public function handleFollow($id, $username)
  {
      Follow::create([
          "from_user_id" => auth()->user()->id,
          "to_user_id" => $id
      ]);
      
      Notification::create([
        "body" => auth()->user()->username . ' follow your account',
        "user_id" => $id,
        "hyperlink" => "/user/" . $username,
        "is_read" => false
      ]);
  }
  
  public function handleUnfollow($id)
  {
    $userId = auth()->user()->id;

    $follow = Follow::where('to_user_id', $id)->where('from_user_id', $userId)->first();

    if ($follow) {
      $follow->delete();
    }
  }


}
