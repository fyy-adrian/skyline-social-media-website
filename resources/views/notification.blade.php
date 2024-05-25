@extends('layouts.noNav-layout')
@section('container')
  <div class="w-[500px]">
    <a href="/" class="flex gap-2 py-2 border-b border-b-zinc-200 px-3 items-center">
      <i class="bi bi-arrow-left"></i>
      <p class="font-bold">notification</p>
    </a>
  </div>
  @livewire('notification-list')
@endsection