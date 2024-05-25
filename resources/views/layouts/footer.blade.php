<div class="py-5"></div>
    <nav class="flex flex-row justify-between fixed bottom-0 w-[100%] px-7 py-2 border-t border-t-slate-20p bg-white">
        <a href="/">
          <div class="flex flex-col justify-center items-center">
            <i class="bi {{$title == 'home' ? 'bi-house-door-fill text-sky-500' : 'bi-house-door'}} text-xl"></i>
            <p class="hidden lg:block">home</p>
          </div>
        </a>
        <a href="/explore">
          <div class="flex flex-col justify-center items-center">
            <i class="bi text-xl {{$title == 'explore' ? 'bi-grid-fill text-sky-500' : 'bi-grid'}}"></i>
            <p class="hidden lg:block">explore</p>
          </div>
        </a>
        <a href="/createpost">
          <div class="flex flex-col justify-center items-center">
            <i class="bi text-xl {{$title == 'create post' ? 'bi-plus-circle-fill text-sky-500' : 'bi-plus-circle'}}"></i>
            <p class="hidden lg:block">create post</p>
          </div>
        </a>
        
        <a href="/notification" class="relative">
            <div class="@if($notif && !$notif->is_read) relative @endif flex flex-col justify-center items-center">
                <i class="bi {{$title == 'notifications' ? 'bi-bell-fill text-sky-500' : 'bi-bell'}} text-xl"></i>
                @if($notif)
                  @if($notif->is_read === 0)
                    <span class="absolute top-1 right-0 bg-sky-500 h-2 w-2 rounded-full"></span>
                  @endif
                @endif
                <p class="hidden lg:block">notifications</p>
            </div>
        </a>

        <a href="/profile">
          <div class="flex flex-col justify-center items-center">
            <i class="bi {{$title == 'profile' ? 'bi-person-circle text-sky-500' : 'bi-person-circle'}} text-xl"></i>
            <p class="hidden lg:block">profile</p>
          </div>
        </a>
      </nav>   