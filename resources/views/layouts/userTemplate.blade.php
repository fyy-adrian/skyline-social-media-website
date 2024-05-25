<main class="mt-14 bg-gray-100 bg-opacity-25">

  <div class="lg:w-8/12 lg:mx-auto">

    <header class="flex flex-wrap items-center p-4 md:py-8">

      <div class="md:w-3/12 md:ml-16">
        <!-- profile image -->
        @if (auth()->user()->profile_photo_path)       
          <img class="w-20 h-20 md:w-40 md:h-40 object-cover rounded-full
                      border-2 border-pink-600 p-1" src="{{asset('storage/' . $user->profile_photo_path)}}" alt="profile">
        @else
          <img class="w-20 h-20 md:w-40 md:h-40 object-cover rounded-full
                    border-2 border-pink-600 p-1" src="{{asset('storage/component/profile.png')}}" alt="profile">
        @endif
      </div>

      <!-- profile meta -->
      <div class="w-8/12 md:w-7/12 ml-4">
        <div class="md:flex md:flex-wrap md:items-center mb-4">
          <h2 class="text-3xl inline-block font-light md:mr-2 mb-2 sm:mb-0">
            {{$user->username}}
          </h2>

          <!-- badge -->
          <span class="inline-block fas fa-certificate fa-lg text-blue-500 
                              relative mr-6  text-xl transform -translate-y-2" aria-hidden="true">
            <i class="fas fa-check text-white text-xs absolute inset-x-0
                              ml-1 mt-px"></i>
          </span>

          <!-- follow button -->
          @if($user->id === auth()->user()->id)
            <a href="{{ route('profile.show') }}" class="text-white text-sm text-center font-semibold bg-sky-500 py-1 px-2 border border-sky-400 rounded-lg transition-colors duration-300 ease-in-out hover:bg-sky-700 sm:inline-block block md:px-5">Profile Settings</a>
          @else
            @if($user->followers->isNotEmpty())
              <a class="text-white text-sm text-center font-semibold bg-sky-500 py-1 px-2 border border-sky-400 rounded-lg transition-colors duration-300 ease-in-out hover:bg-sky-700 sm:inline-block block md:px-5" wire:click="handleUnfollow('{{$user->id}}')">unfollow</a>
            @else
              <a class="text-white text-sm text-center font-semibold bg-sky-500 py-1 px-2 border border-sky-400 rounded-lg transition-colors duration-300 ease-in-out hover:bg-sky-700 sm:inline-block block md:px-5" wire:click="handleFollow('{{$user->id}}')">follow</a>
            @endif
          @endif
        </div>

        <!-- post, following, followers list for medium screens -->
        <ul class="hidden md:flex space-x-8 mb-4">
          <li>
            <span class="font-semibold count">{{$user->posts->count()}}</span>
            posts
          </li>

          <li>
            <span class="font-semibold count" data-target="">{{$followersCount}}</span>
            followers
          </li>
          <li>
            <span class="font-semibold" data-target="">{{$followingCount}}</span>
            following
          </li>
        </ul>

        <!-- user meta form medium screens -->
        <div class="hidden md:block">
          <h1 class="font-semibold">{{$user->name}}</h1>
          <p>{{$user->bio}}</p>
          
        </div>
        
      </div>

      <!-- user meta form small screens -->
      <div class="md:hidden text-sm my-2">
        <h1 class="font-semibold">{{$user->name}}</h1>
          <span class="bioclass">Internet company</span>
          <p>{{$user->bio}}</p>
          
      </div>

    </header>

    <!-- posts -->
    <div class="px-7 md:px-3 pb-3">

      <!-- user following for mobile only -->
      <ul class="flex md:hidden justify-around space-x-8 border-t 
                text-center p-2 text-gray-600 leading-snug text-sm">
        <li>
          <span class="font-semibold text-gray-800 block count" data-target="">{{$user->posts->count()}}</span>
          posts
        </li>

        <li>
          <span class="font-semibold text-gray-800 block count" data-target="">{{$followersCount}}</span>
          followers
        </li>
        <li>
          <span class="font-semibold text-gray-800 block count" data-target="">{{$followingCount}}</span>
          following
        </li>
      </ul>
      
    </div>
  </div>
</main>
<div class="lg:w-8/12 lg:mx-auto">
  @foreach($posts as $post)
    @if ($post)
      @include('layouts.templatePost')
    @else
       <p>tidak ada postingan</p> 
    @endif
  @endforeach
</div>