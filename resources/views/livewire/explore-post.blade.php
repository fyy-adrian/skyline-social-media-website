@extends('layouts.exploreTemplate')

@section('explore')
<div class="xl:grid xl:grid-flow-dense xl:grid-cols-3">
  <div class="col-span-2">
    <div class="flex flex-row flex-wrap gap-3 px-5 py-7 lg:ml-[15%] justify-center xl:pt-24">
      <button class="border {{ $slug === null ? 'bg-sky-500' : 'bg-sky-300' }} border-sky-500 text-white py-1 px-3 rounded-full text-sm"
        wire:click="selectCategory(null)">
        All Post
      </button>
      @foreach($categories as $category)
        <button class="border {{ $slug == $category->slug ? 'bg-sky-500' : 'bg-sky-300' }} border-sky-500 text-white py-1 px-5 rounded-full text-sm"
          wire:click="selectCategory('{{ $category->slug }}')">
          {{ $category->name }}
        </button>
      @endforeach  
    </div>
    
    @foreach($posts as $category)
      @foreach($category->posts as $post)
        @include('layouts.templatePost')
      @endforeach
    @endforeach
    
    @if($openModal)
      @include('layouts.modalShare')
    @endif
  </div>

  <div class="hidden xl:block px-7 pt-20">
     @include('layouts.friend_list')
  </div>
</div>

@endsection
