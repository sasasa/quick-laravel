@extends('layouts.base')

@section('title', 'アップロードの基本')

@section('main')
@error('upfile')
<div class="text-danger">{{$message}}</div>
@enderror
@if (session('error'))
<div class="text-danger">{{session('error')}}</div>
@endif
<form enctype="multipart/form-data" method="POST" action="/ctrl/upload">
@csrf
<input type="file" name="upfile" id="upfile">
<input type="submit" value="送信">
<p>{{$result}}</p>
</form>

@isset($path)
<p>{{$path}}</p>
@endisset

@isset($name)
<img src="/ctrl/uploadimage/{{$name}}">
<img src="/ctrl/imagedownload/{{$name}}">
@endisset

@endsection