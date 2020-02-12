@extends('layouts.base')
@section('title', "Review詳細")

@section('main')
<div class="container">
  <div class="row">
    <div class="col-3"></div>
    <div class="col-6">

      <h1>Review 詳細
      </h1>
      <form class="delteForm" method="POST" action="/reviews/{{$form->id}}">
        @csrf
        @method('DELETE')
        <div class="form-group">
          <label for="name">名前</label>{{$form->name}}
        </div>

        <div class="form-group">
          <label for="book_id">書籍</label>{{$form->book->title}}
        </div>

        <div class="form-group">
          <label for="body">本文</label>{{$form->body}}
        </div>

        <div class="form-group">
          <input type="submit" value="削除" class="btn btn-danger btn-lg" >
        </div>

      </form>
      <a href="/reviews" class="btn btn-lg btn-success mt-5">一覧に戻る</a>

    </div>
    <div class="col-3"></div>
  </div>
</div>
@endsection

@section('js')
$('.delteForm').submit(function(){
  return confirm("削除してよろしいですか？")
})
@endsection