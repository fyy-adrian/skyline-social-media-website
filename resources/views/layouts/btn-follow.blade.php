@if($user->followers->isNotEmpty())
          <button class="bg-white hover:bg-gray-100 text-gray-800 font-semibold py-1 px-2 border border-gray-400 rounded-lg shadow hover:bg-zinc-200" wire:click="handleUnfollow('{{$user->id}}')">Unfollow</button>
          @else
            <button class="text-white font-semibold bg-sky-500 py-1 px-2 border border-sky-400 rounded-lg shadow transition-colors duration-300 ease-in-out hover:bg-sky-700" wire:click="handleFollow('{{$user->id}}', '{{$user->username}}')">Follow</button>
          @endif