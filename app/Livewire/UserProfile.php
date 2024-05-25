<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\Follow;
use App\Models\Notification;

class UserProfile extends Component
{
    public $user;
    public $pengguna;
    public $notif;
    public $followersCount;
    public $followingCount;
    
    public function mount($pengguna)
    {
      $this->pengguna = $pengguna;
    }
    
    public function render()
    {
        $this->notif = Notification::where('user_id', auth()->user()->id)->first();
        
        $id = $this->pengguna->id;
        
        $this->user = User::find($id);
        
        $this->followingCount = Follow::where('from_user_id', auth()->user()->id)->count();
        
        $this->followersCount = Follow::where('to_user_id', auth()->user()->id)->count();
        return view('livewire.user-profile');
    }
    
  public function handleFollow($id)
  {
      Follow::create([
          "from_user_id" => auth()->user()->id,
          "to_user_id" => $id
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
