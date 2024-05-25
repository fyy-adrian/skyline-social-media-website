<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\Post;
use Illuminate\Support\Str;

class DashboardAdmin extends Component
{
    public $users;
    public $userCount;
    public $posts;
    public $postCount;
    public $keyword;
    
    public function render()
    {
        if($this->keyword !== null){
        $this->users = User::with('followers')->where('name', 'like', '%' . $this->keyword . '%')->latest()->take(10)->get();
        }else{
          $this->users = User::with('followers')->latest()->take(10)->get();
        }
        
        $this->posts = Post::with('likes')->latest()->get();
        
        $this->userCount = User::all()->count();
        
        $this->postCount = Post::all()->count();
        
        return view('livewire.dashboard-admin');
    }
}
