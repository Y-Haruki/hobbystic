<a href="{{ route('hobbies.create') }}"> 投稿する</a>
<hr>

@foreach ($hobbies as $hobby)
<a href="{{ route('hobbies.show', $hobby->id) }}">
  <div>
    {{ $hobby->image }}
  </div>
  <h3>{{ $hobby->title }}</h3>
</a>
<form action="{{ route('hobbies.destroy', $hobby->id) }}" method="POST">
  @csrf
  @method('DELETE')
  <button type='submit'>Delete</button>
</form>
<hr>
@endforeach
