<?php

namespace App\Listeners;
use App\Livewire\SkychatForum;

use App\Events\Skychat;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class RefreshSkychat implements ShouldQueue
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(Skychat $event): void
    {
        $chatWindow = app(SkychatForum::class);
        $chatWindow->messages[] = $event->message;
        $chatWindow->emit('RefreshSkychat');
    }
}
