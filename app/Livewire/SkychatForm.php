<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\Skychat;

class SkychatForm extends Component
{
    public $pengguna;
    public $user;
    public $message;
    public $chats;
    public $mychats;
    public $yourchats;
    public $userId;
    
    public function mount($pengguna)
    {
      $this->pengguna = $pengguna;
    }
    
    public function render()
    {
        $userId = $this->pengguna->id;
        $this->userId = $this->pengguna->id;
        
        $this->user = User::find($userId);
        
        $this->chats = Skychat::with('user')->where(function ($query) use ($userId) {
              $query->where('from_id', auth()->user()->id)
                    ->where('to_id', $userId);
          })->orWhere(function ($query) use ($userId) {
              $query->where('from_id', $userId)
                    ->where('to_id', auth()->user()->id);
          })->get();
        
        return view('livewire.skychat-form');
    }
    
    public function handleMessage($id){
      Skychat::create([
        'from_id' => auth()->user()->id,
        'message' => $this->message,
        'to_id' => $id
      ]);
    }
}