@extends('layouts.base')

@section('title', '書籍情報フォーム(編集)')

@section('main')
<form method="POST" action="/save/{{$b->id}}">
@csrf
@method('PATCH')

<div class="pl-2">
<label for="isbn">ISBNコード：</label><br>
<input type="text" id="isbn" name="isbn" value="{{old('isbn', $b->isbn)}}">
</div>

<div class="pl-2">
<label for="title">書名：</label><br>
<input type="text" id="title" name="title" value="{{old('title', $b->title)}}">
</div>

<div class="pl-2">
<label for="price">価格：</label><br>
<input type="text" id="price" name="price" value="{{old('price', $b->price)}}">
</div>

<div class="pl-2">
<label for="publihsher">出版社：</label><br>
<input type="text" id="publisher" name="publisher" value="{{old('publisher', $b->publisher)}}">
</div>

<div class="pl-2">
  <label for="publihshed">刊行日：</label><br>
  <input type="text" id="published" name="published" value="{{old('published', $b->published)}}">
</div>

<div class="pl-2">
  <input type="submit" value="送信">
</div>

</form>
@endsection