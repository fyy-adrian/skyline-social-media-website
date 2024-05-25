<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Notification;

class NotificationList extends Component
{
    public $notifs;
    public $notif;
    public $title = 'notifications';
    
    public function render()
    {
        $this->notif = Notification::where('user_id', auth()->user()->id)->count();
        
        $this->notifs = Notification::where('user_id', auth()->user()->id)
            ->where('id', '!=', auth()->user()->id)
            ->latest()
            ->get();
                
        foreach($this->notifs as $notification) {
            if($notification->user_id === auth()->user()->id) {
                $notification->update(['is_read' => true]);
            }
        }
        
        return view('livewire.notification-list');
    }
}
