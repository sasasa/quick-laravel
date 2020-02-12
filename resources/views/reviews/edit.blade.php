@extends('layouts.base')
@section('title', "Review編集")

@section('main')
<div class="container">
  <div class="row">
    <div class="col-3"></div>
    <div class="col-6">

      <h1>Review 編集</h1>
      <form method="POST" action="/reviews/{{$form->id}}">
        @csrf
        @method('PATCH')
        <div class="form-group">
          <label for="name">名前</label>
          <input class="form-control" type="text" name="name" id="name" value="{{old('name', $form->name)}}">
          @error('name')
          <div class="text-danger">{{$message}}</div>
          @enderror
        </div>

        <div class="form-group">
          <label for="book_id">書籍</label>
          {{Form::select('book_id',
            Arr::pluck($books, 'title', 'id'),
            old('book_id', $form->book_id),
            ['placeholder' => '選択してください', 'id' => 'book_id', 'class' => 'form-control']
          )}}
          @error('book_id')
          <div class="text-danger">{{$message}}</div>
          @enderror
        </div>

        <div class="form-group">
          <label for="body">本文</label>
          <textarea class="form-control" type="text" name="body" id="body">{{old('body', $form->body)}}</textarea>
          @error('body')
          <div class="text-danger">{{$message}}</div>
          @enderror
        </div>

        <div class="form-group">
          <input type="submit" value="送信" class="btn btn-primary btn-lg" >
        </div>

      </form>
      <a href="/reviews" class="btn btn-lg btn-success mt-5">一覧に戻る</a>
    </div>
    <div class="col-3"></div>
  </div>
</div>
@endsection