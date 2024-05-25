<div class="font-inter">
  <div class="flex flex-row justify-between mt-20 block xl:hidden">
    <div class="w-[50%] text-center">
      <a href="/explore" class="{{ $border == 'post' ? 'border-b-2 border-b-sky-500 px-3 py-1' : '' }}">categories</a>
    </div>
    <div class="w-[50%] text-center">
      <a href="/explore/friends" class="{{ $border != 'post' ? 'border-b-2 border-b-sky-500 px-3 py-1' : '' }}">friends</a>
    </div>
  </div>

  @yield('explore')

  <div class="block md:hidden">
    @include('layouts.footer')
   </div>
</div>
