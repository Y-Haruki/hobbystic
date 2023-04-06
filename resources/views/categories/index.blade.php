@extends('layouts.app')

@section('content')
<div class="container">
  <h2>カテゴリ一覧</h2>
  <div class="row justify-content-center">
    <div class="col-12">
      <div class="d-flex flex-wrap">
        @foreach ($categories as $category)
        <div class="category-item text-center d-flex">
          <img src="{{ asset('storage/images/'.$category->image) }}" alt="" width="100%" height="100%">
          <div class="mt-2">
            <a href="{{ route('categories.show', $category->id) }}">{{ $category->name }}</a>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </div>
</div>
@endsection