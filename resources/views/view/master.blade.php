{{-- レイアウトを宣言 --}}
@extends('layouts.base')

{{-- title section --}}
@section('title', '共通レイアウトの基本')

{{-- main sectionのコンテンツ --}}
@section('main')
  @parent
  <p>{{$msg}}</p>
@endsection
