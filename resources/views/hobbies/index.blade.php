@extends('layouts.app')

@section('content')
<a href="{{ route('hobbies.create') }}"> 投稿する</a>
<hr>

<div class="container hobby-index-container">
  <div class="row justify-content-center">
    <div class="col-10">
      <div class="d-flex flex-wrap">
        @foreach ($hobbies as $hobby)
        <div class="item">
          <a href="{{ route('hobbies.show', $hobby->id) }}">
            <div>
              {{ $hobby->image }}
            </div>
            <h3>{{ $hobby->title }}</h3>
          </a>
          <hr>
        </div>
        @endforeach
      </div>
    </div>
  </div>
</div>

@endsection
