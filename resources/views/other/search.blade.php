<x-app-layout>
  @foreach($posts as $post)
    @include('layouts.templatePost')
  @endforeach
</x-app-layout>