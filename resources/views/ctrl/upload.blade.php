@extends('layouts.base')

@section('title', 'アップロードの基本')

@section('main')
<form enctype="multipart/form-data" method="POST" action="/ctrl/uploadfile">
@csrf
<input type="file" name="upfile" id="upfile">
<input type="submit" value="送信">
<p>{{$result}}</p>
</form>
@endsection