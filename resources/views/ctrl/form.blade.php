@extends('layouts.base')
@section('title','フォームの基本')

@section('main')

{{-- flashメッセージの表示 --}}
@if(session('alert'))
<div class="alert">{{session('alert')}}</div>
@endif

<form method="POST" action="/ctrl/result">
{{-- CSRF対策 --}}
@csrf
<label for="name">名前：</label>
                                                {{-- 入力の復元 --}}
<input type="text" id="name" name="name" value="{{old('name', '')}}">
<input type="submit" value="送信">
<p>{{$result}}</p>
</form>

@endsection