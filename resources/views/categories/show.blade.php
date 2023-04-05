@extends('layouts.app')

@section('content')
<div class="container hobby-index-container">
  <h2>{{ $category->name }}</h2>
  <div class="row justify-content-center">
    <div class="col-10">
      <div class="d-flex flex-wrap">
        @foreach ($hobbies as $hobby)
        <div class="item">
          <a href="{{ route('hobbies.show', $hobby->id) }}">
            <div class="hobby-image">
              <img src="{{ asset('storage/images/'.$hobby->image) }}" alt="" width="100%" height="100%">
              <!-- {{ $hobby->image }} -->
            </div>
            <h3 class="hobby-title">{{ $hobby->title }}</h3>
          </a>
        </div>
        @endforeach
      </div>
    </div>
  </div>
</div>

@endsection