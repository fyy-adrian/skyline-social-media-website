<div class="flex flex-row justify-between px-3 pt-4 pb-6 font-inter border-b border-b-slate-200 hover:bg-zinc-100 transition bg-white lg:px-16">
    <div>
      <div class="flex flex-row">
        <div>
          @if(isset($post->user->profile_photo_path))
            <div class="mr-4 my-1">
              <img src="{{asset('storage/' . $post->user->profile_photo_path)}}" class="w-11 rounded-full">
            </div>
          @else
            <div class="mr-4">
              <i class="bi bi-person-circle text-[36px] mx-1"></i>
            </div>
          @endif
        </div>
        
        <div>
          @include('postComponent.main')
        </div>
      </div>
    </div>
    
    <div class="mt-3">
      <span>
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-three-dots-vertical" viewBox="0 0 16 16">
          <path d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0"/>
        </svg>
      </span>
    </div>
    
</div>