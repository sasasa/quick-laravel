@extends('layouts.base')

@section('title', '書籍情報フォーム')

@section('main')

@component('components.errors', ['errors' => $errors])
@endcomponent


<form method="POST" action="/save/store">
@csrf

<div class="pl-2">
  @if ($errors->has('isbn'))
    {{$errors->first('isbn')}}
    @foreach ($errors->get('isbn') as $err)
      <div class="text-danger">{{$err}}</div>
    @endforeach
  @endif
  @error('isbn')
    <div class="text-danger">{{$message}}</div>
  @enderror
  <label for="isbn">{{__('validation.attributes.isbn')}}/@lang('validation.attributes.isbn')：</label><br>
  <input type="text" id="isbn" name="isbn" value="{{old('isbn')}}">
</div>

<div class="pl-2">
  @if ($errors->has('title'))
    {{$errors->first('title')}}
    @foreach ($errors->get('title') as $err)
      <div class="text-danger">{{$err}}</div>
    @endforeach
  @endif
  @error('title')
    <div class="text-danger">{{$message}}</div>
  @enderror

  <label for="title">@lang('validation.attributes.title')：</label><br>
  <input type="text" id="title" name="title" value="{{old('title')}}">
</div>

<div class="pl-2">
  @if ($errors->has('price'))
    {{$errors->first('price')}}
    @foreach ($errors->get('price') as $err)
      <div class="text-danger">{{$err}}</div>
    @endforeach
  @endif
  @error('price')
    <div class="text-danger">{{$message}}</div>
  @enderror

  <label for="price">@lang('validation.attributes.price')：</label><br>
  <input type="text" id="price" name="price" value="{{old('price')}}">
</div>

<div class="pl-2">
  @if ($errors->has('publisher'))
    {{$errors->first('publisher')}}
    @foreach ($errors->get('publisher') as $err)
      <div class="text-danger">{{$err}}</div>
    @endforeach
  @endif
  @error('publisher')
    <div class="text-danger">{{$message}}</div>
  @enderror

  <label for="publihsher">@lang('validation.attributes.publisher')：</label><br>
  <input type="text" id="publisher" name="publisher" value="{{old('publisher')}}">
</div>

<div class="pl-2">
  @if ($errors->has('published'))
    {{$errors->first('published')}}
    @foreach ($errors->get('published') as $err)
      <div class="text-danger">{{$err}}</div>
    @endforeach
  @endif
  @error('published')
    <div class="text-danger">{{$message}}</div>
  @enderror

  <label for="publihshed">@lang('validation.attributes.published')：</label><br>
  <input type="text" id="published" name="published" value="{{old('published')}}">
</div>


<div class="pl-2">
  @error('consent')
    <div class="text-danger">{{$message}}</div>
  @enderror
  <label for="consent">@lang('validation.attributes.consent')：</label><br>
  <input type="checkbox" id="consent" name="consent" value="1" {{old('consent')=="1" ? "checked" : null}}>
</div>

<div class="pl-2">
  @error('password')
    <div class="text-danger">{{$message}}</div>
  @enderror
  <label for="password">@lang('validation.attributes.password')：</label><br>
  <input type="text" id="password" name="password">
  <input type="text" id="password_confirmation" name="password_confirmation">
</div>

<div class="pl-2">
  <input type="submit" value="送信">
</div>

</form>
@endsection