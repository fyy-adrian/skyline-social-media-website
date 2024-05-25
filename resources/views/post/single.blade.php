@extends('layouts.noNav-layout')
@section('container')
  
  <div class="grid grid-cols-5 grid-rows-2 gap-5">
    
    <main class="col-span-3 row-span-2">
      
      @include('layouts.templatePost')
      
    </main>
    <aside class="col-span-2 row-span-4">
      
    </aside>
    <div class="col-span-3 row-span-2 bg-gray-400 h-96 border border-2">
      
    </div>
  </div>
  
@endsection