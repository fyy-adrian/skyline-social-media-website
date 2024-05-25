<div>
    @foreach($posts as $post => $value)
      <p>{{$value->caption}}</p>
    @endforeach
</div>
