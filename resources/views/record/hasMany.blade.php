@extends('layouts.base')

@section('title', 'リレーションの基本')

@section('main')
<h3>「{{$book->title}}」のレビュー</h3>
<ul>
@foreach ($book->reviews as $review)
  <li>{{$review->body}}({{$review->name}})</li>
@endforeach
</ul>
    
@endsection