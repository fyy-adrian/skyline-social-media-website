<div class="flex justify-center items-center">
        
  <div class="w-[450px]">
    <a href="/" class="flex gap-2 py-2 border-b border-b-zinc-200 px-3 items-center">
      <i class="bi bi-arrow-left"></i>
      <p class="font-bold">add post</p>
    </a>
    <div>
      <div class="px-4 flex flex-row justify-start gap-3 items-center py-3 hover:bg-zinc-100 transition-all">
          @if(isset(auth()->user()->profile_photo_path))
                <div class="mr-4 my-1">
                  <img src="{{asset('storage/' . auth()->user()->profile_photo_path)}}" class="w-14 h-14 rounded-full">
                </div>
              @else
                <div class="mr-4">
                  <i class="bi bi-person-circle text-5xl mx-1"></i>
                </div>
              @endif
        <div class="flex flex-col text-sm">
          <p class="font-bold text-slate-700">{{auth()->user()->name}}</p>
          <p class="text-slate-700">@
            <span>
              {{auth()->user()->username}}
            </span>
          </p>
        </div>
      </div>
      
      @if(session()->has('message'))
        <p>{{session('message')}}</p>
      @endif
      
      <form class="px-5 justify-center flex flex-col gap-3 items-center" wire:submit='createPost'>
          <textarea class="border-0 bg-sky-200 text-slate-800 text-center w-full h-44 rounded whitespace-normal" style="outline-color: rgba(255, 0, 0, 0);" required wire:model="caption"></textarea>
      
          @error('caption')
              <p class="text-red-500">{{ $message }}</p>
          @enderror
      
          <div class="flex flex-row gap-[5px] items-center justify-between w-[90%]">
              <select id="underline_select" class="block py-2.5 px-0 w-full text-sm text-gray-500 bg-transparent border-0 border-b-2 border-sky-500 appearance-none focus:outline-none focus:ring-0 focus:border-sky-400 peer w-28" wire:model="category">
                  <option value="0">select category</option>
                  @foreach($categories as $index => $category)
                      <option value="{{$category->id}}">{{$category->name}}</option>
                  @endforeach
              </select>
            @if($image)
              <img src="{{ $image->temporaryUrl() }}" class="w-16 rounded-lg">
            @else
              <div class="rounded-md border border-sky-500 bg-gray-50 p-2 shadow-md">
                <label for="upload" class="flex flex-col items-center gap-2 cursor-pointer">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-9 w-9 fill-white stroke-sky-500" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 13h6m-3-3v6m5 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                  </svg>
                </label>
                <input id="upload" wire:model="image" type="file" class="hidden" />
            </div>        
            @endif    
          </div>
          
          @error('image')
              <p class="text-red-500">{{ $message }}</p>
          @enderror

          <button class="w-[90%] rounded-lg py-2 px-3 bg-sky-500 text-white items-center my-3 hover:bg-sky-700 hover:bg-sky-600 focus:ring-4 focus:outline-none focus:ring-sky-300">posting</button>
      </form>
    </div>

  </div>
  <div class="block sm:hidden">
    @include('layouts.footer')
  </div>
</div>



