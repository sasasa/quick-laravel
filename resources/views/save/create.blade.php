@extends('layouts.base')

@section('title', '書籍情報フォーム')

@section('main')
@if(count($errors) > 0)
<ul>
  @foreach ($errors->all() as $err)
    <li class="text-danger">{{$err}}</li>
  @endforeach
</ul>
@endif


<form method="POST" action="/save/store">
@csrf

<div class="pl-2">
<label for="isbn">ISBNコード：</label><br>
<input type="text" id="isbn" name="isbn" value="{{old('isbn')}}">
</div>

<div class="pl-2">
<label for="title">書名：</label><br>
<input type="text" id="title" name="title" value="{{old('title')}}">
</div>

<div class="pl-2">
<label for="price">価格：</label><br>
<input type="text" id="price" name="price" value="{{old('price')}}">
</div>

<div class="pl-2">
<label for="publihsher">出版社：</label><br>
<input type="text" id="publisher" name="publisher" value="{{old('publisher')}}">
</div>

<div class="pl-2">
  <label for="publihshed">刊行日：</label><br>
  <input type="text" id="published" name="published" value="{{old('published')}}">
</div>

<div class="pl-2">
  <input type="submit" value="送信">
</div>

</form>
@endsection