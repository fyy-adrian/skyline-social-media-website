<div class="lg:grid lg:grid-flow-dense lg:grid-cols-3">

  <div class="col-span-2 mt-6">
    <!-- <form id="searchPost" class="flex w-[100%] mt-20 px-5 mb-4" action="/search" method="GET">   
        <label for="simple-search" class="sr-only">Search</label>
        <div class="w-full">
            <div class="inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
            </div>
            <input type="search" id="simple-search" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2 pl-4" placeholder="Search posts and friends..." style="outline-color: none;" required name="result">
        </div>
        <button type="submit" class="p-2.5 ms-2 text-sm font-medium text-white bg-sky-500 rounded-lg hover:bg-sky-700 transition-all">
            <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
            </svg>
            <span class="sr-only">Search</span>
        </button>
    </form> -->

    @if ($commentModal)
        <div class="overflow-y-auto overflow-x-hidden fixed  z-50 justify-center items-center w-full md:inset-0 h-screen flex backdrop-blur-sm bg-white/30">
          @include('layouts.modalComment')
        </div> 
    @endif  
    
    @foreach($posts as $post)
      @include('layouts.templatePost')
    @endforeach
  </div>

  <div class="bg-white overflow-hidden border-b-4 border-blue-500 mr-4 mt-7">
    <img src="https://images.unsplash.com/photo-1573748240263-a4e9c57a7fcd" alt="People" class="w-full object-cover h-32 sm:h-48 md:h-64">
    <div class="p-4 md:p-6">
      <p class="text-blue-500 font-semibold text-xs mb-1 leading-none">News</p>
      <h3 class="font-semibold mb-2 text-xl leading-tight sm:leading-normal">The Coldest Sunset</h3>
      <div class="text-sm flex items-center">
        <svg class="opacity-75 mr-2" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" width="12" height="12" viewBox="0 0 97.16 97.16" style="enable-background:new 0 0 97.16 97.16;" xml:space="preserve">
          <path d="M48.58,0C21.793,0,0,21.793,0,48.58s21.793,48.58,48.58,48.58s48.58-21.793,48.58-48.58S75.367,0,48.58,0z M48.58,86.823    c-21.087,0-38.244-17.155-38.244-38.243S27.493,10.337,48.58,10.337S86.824,27.492,86.824,48.58S69.667,86.823,48.58,86.823z"/>
          <path d="M73.898,47.08H52.066V20.83c0-2.209-1.791-4-4-4c-2.209,0-4,1.791-4,4v30.25c0,2.209,1.791,4,4,4h25.832    c2.209,0,4-1.791,4-4S76.107,47.08,73.898,47.08z"/>
        </svg>
        <p class="leading-none">21 Oct 2019</p>
      </div>
    </div>
  </div>

  <div class="block sm:hidden">
    @include('layouts.footer')
  </div>
</div>
