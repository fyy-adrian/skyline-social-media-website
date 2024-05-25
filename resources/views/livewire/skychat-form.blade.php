<div>
  
  <div class="flex flex-col py-4">
    @foreach($chats as $chat)
      <div class="flex w-auto {{$chat->from_id === auth()->user()->id ? 'justify-end' : 'justify-start'}} flex-row my-1">
        <div class="max-w-[70%] flex flex-wrap flex-row justify-between py-1 px-2 relative rounded-lg bg-orange-100 pr-16">
          <p>{{$chat->message}}</p>
          <div class="absolute right-2 bottom-0">
            <span class="text-[8px]">{{$chat->created_at->diffForHumans()}}</span>
          </div>
        </div>
      </div>
    @endforeach
  </div>
  
  <form>
    <input type="text" wire:model="message">
    <button type="submit" wire:click="handleMessage('{{$user->id}}')">kirim</button>
  </form>
</div>
