@extends('layouts.app')

@section('content')
<div class="container">
  <h2>カテゴリ一覧</h2>
  <div>
    @foreach ($categories as $category)
    {{ $category->image }}
    {{ $category->name }}
    @endforeach
  </div>
</div>
@endsection