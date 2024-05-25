<x-skychat-layout>
  <p>{{$user->username}}</p>
  @livewire('skychat-form', ['pengguna' => $user])
</x-skychat-layout>
