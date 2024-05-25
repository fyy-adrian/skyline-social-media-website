<div class="w-[500px]">
    
    @foreach($notifs as $notif)
      <a href="{{$notif->hyperlink}}" class="px-4 flex flex-row justify-start gap-3 w-[100%] items-center py-3 hover:bg-zinc-100 transition-all col-span-2">
          @if(isset($notif->user->profile_photo_path))
              <div class="mr-4 my-1">
                <img src="{{asset('storage/' . $notif->user->profile_photo_path)}}" class="w-14 rounded-full">
              </div>
            @else
              <div class="mr-4">
                <i class="bi bi-person text-4xl mx-1"></i>
              </div>
            @endif
        <div class="gap-2 flex">
          <p class="font-medium text-sm">
            {{$notif->body}}
          </p>
        </div>
      </a>
    @endforeach
  </div>

  <div class="block sm:hidden">
    @include('layouts.footer')
  </div>