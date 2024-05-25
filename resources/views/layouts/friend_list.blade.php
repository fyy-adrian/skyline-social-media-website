<form class="flex items-center pt-4 px-4 pb-3">   
      <label for="simple-search" class="sr-only">Search</label>
      <div class="w-full">
          <div class="inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
          </div>
          <input type="search" id="simple-search" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 pl-4" placeholder="Search your friends..." style="outline-color: dodgerblue;" required wire:model.live="keyword">
      </div>
      <div class="p-2.5 ms-2 text-sm font-medium text-white bg-sky-500 rounded-lg hover:bg-sky-700 transition-all">
          <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
          </svg>
          <span class="sr-only">Search</span>
      </div>
  </form>
 
  <div class="flex flex-row">
    <div class="flex flex-col md:w-[100%] items-center justify-center">
      @foreach($users as $user)
        @if($user->id !== auth()->user()->id)
          <div href="/user/{{$user->id}}" class="px-4 flex flex-row justify-start gap-3 w-[100%] items-center py-3 hover:bg-zinc-100 transition-all px-10">
              @if(isset($user->profile_photo_path))
                  <div class="mr-4 my-1">
                    <img src="{{asset('storage/' . $user->profile_photo_path)}}" class="w-14 h-14 rounded-full">
                  </div>
                @else
                  <div class="mr-4">
                    <i class="bi bi-person-circle text-5xl mx-1"></i>
                  </div>
                @endif
            <div class="flex flex-col text-sm w-48 flex-wrap text-[10px]">
              <a href="/user/{{$user->username}}" class="lg:hidden font-bold text-slate-700">{{$user->name}}</a>
              <p class="hidden lg:block font-bold text-slate-700">{{$user->name}}</p>
              @include('layouts.btn-follow')
            </div>
          </div>
        @endif
      @endforeach
    </div>
