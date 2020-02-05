@extends('layouts.base')

@section('title', '書籍情報フォーム')

@section('main')

@component('components.errors', ['errors' => $errors])
@endcomponent


<form method="POST" action="/save/store">
@csrf

<div class="pl-2">
  {{$errors->first('isbn')}}
  @foreach ($errors->get('isbn') as $err)
    <div class="text-danger">{{$err}}</div>
  @endforeach
  <label for="isbn">ISBNコード：</label><br>
  <input type="text" id="isbn" name="isbn" value="{{old('isbn')}}">
</div>

<div class="pl-2">
  {{$errors->first('title')}}
  @foreach ($errors->get('title') as $err)
    <div class="text-danger">{{$err}}</div>
  @endforeach
  <label for="title">書名：</label><br>
  <input type="text" id="title" name="title" value="{{old('title')}}">
</div>

<div class="pl-2">
  {{$errors->first('price')}}
  @foreach ($errors->get('price') as $err)
    <div class="text-danger">{{$err}}</div>
  @endforeach
  <label for="price">価格：</label><br>
  <input type="text" id="price" name="price" value="{{old('price')}}">
</div>

<div class="pl-2">
  {{$errors->first('publisher')}}
  @foreach ($errors->get('publisher') as $err)
    <div class="text-danger">{{$err}}</div>
  @endforeach
  <label for="publihsher">出版社：</label><br>
  <input type="text" id="publisher" name="publisher" value="{{old('publisher')}}">
</div>

<div class="pl-2">
  {{$errors->first('published')}}
  @foreach ($errors->get('published') as $err)
    <div class="text-danger">{{$err}}</div>
  @endforeach
  <label for="publihshed">刊行日：</label><br>
  <input type="text" id="published" name="published" value="{{old('published')}}">
</div>

<div class="pl-2">
  <input type="submit" value="送信">
</div>

</form>
@endsection