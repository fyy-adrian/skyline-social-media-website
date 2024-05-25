<div class="lg:grid lg:grid-flow-dense lg:grid-cols-3 lg:ml-16">
    <div class="font-inter flex flex-col justify-start px-5 gap-3 pt-20 pb-5 col-span-2 lg:pr-40">
      <div class="flex flex-row justify-between items-center">
        <img src="{{ asset('storage/' . auth()->user()->profile_photo_path) }}" class="w-20 rounded-full h-20">
        <div class="items-center flex flex-col">
          <p class="font-bold text-[15px]">{{ $followingCount }}</p>
          <p class="text-sm">following</p>
        </div>
          <div class="items-center flex flex-col">
          <p class="font-bold text-[15px]">{{ $postsCount }}</p>
          <p  class="text-sm">posts</p>
        </div>
        <div class="items-center flex flex-col">
          <p class="font-bold text-[15px]">{{ $followersCount }}</p>
          <p  class="text-sm">followers</p>
        </div>
      </div>
      <div class="flex flex-col">
        <p class="font-bold text-[15px]">{{ auth()->user()->name }}</p>
        <p class="text-[15px] font-medium text-slate-900">{{ auth()->user()->bio ?? '' }}</p>
      </div>
      <a href="{{ route('profile.show') }}" class="text-center items-center rounded-2xl bg-gray-200 text-black py-3 px-3 mt-3 text-[15px]">Edit profile</a>
        
      @foreach($posts as $post)
        @include('layouts.templatePost')
      @endforeach

      <div class="mt-3 flex flex-row gap-5">
        
        <form method="POST" action="{{ route('logout') }}" x-data>
          @csrf
          <x-dropdown-link class="border border-sky-500 bg-none text-sky-500 px-4 py-2 hover:border-white hover:bg-sky-500 hover:text-white h-[100%]" href="#"
            @click.prevent="
              if (window.confirm('Yakin ingin logout?')) {
                $root.submit();
              }
            ">{{ __('Log Out') }}
          </x-dropdown-link>
        </form>
      </div>
    </div>

    <div class="border border-2">
    
    </div>
  </div>

  
  <div class="block sm:hidden">
    @include('layouts.footer')
  </div>