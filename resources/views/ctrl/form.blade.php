@extends('layouts.base')
@section('title','フォームの基本')

@section('main')
<form method="POST" action="/ctrl/result">
{{-- CSRF対策 --}}
@csrf
<label for="name">名前：</label>
<input type="text" id="name" name="name" value="">
<input type="submit" value="送信">
<p>{{$result}}</p>
</form>
@endsection