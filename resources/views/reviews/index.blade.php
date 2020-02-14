@extends('layouts.base')
@section('title', "Reviews一覧")

@section('main')
<div class="container">
  <h1>Review 一覧</h1>

  @component('components.flash', ['key' => 'store'])
  @slot('mess')
    作成しました。
  @endslot
  @endcomponent
  
  @component('components.flash', ['key' => 'update'])
  @slot('mess')
    更新しました。
  @endslot
  @endcomponent
  
  @component('components.flash', ['key' => 'delete'])
  @slot('mess')
    削除しました。
  @endslot
  @endcomponent

  @if (Auth::check())
    <p>USER: {{$user->name. '('. $user->email. ')'}}</p>
  @else
    ログインしていません。<a href="/login">ログイン</a>|
    <a href="/register">登録</a>
  @endif

  <form class="form-inline my-5" action="/reviews" method="get">
    <input type="search" name="search" value="{{$search}}" class="form-control mr-2">
    <input type="submit" value="検索" class="btn btn-info btn-sm">
  </form>

  <table class="table">
    <tr>
      <th><a href="/reviews?sort=book_id">書籍</a></th>
      <th><a href="/reviews?sort=name">名前</a></th>
      <th style="width:360px;"><a href="/reviews?sort=body">本文</a></th>
      <th></th>
      <th></th>
      <th></th>
    </tr>
    @foreach($reviews as $review)
    <tr>
      <td>{{$review->book->title}}</td>
      <td>{{$review->name}}</td>
      <td>{{$review->body}}</td>
      <td><a href="/reviews/{{$review->id}}/edit">編集</a></td>
      <td><a href="/reviews/{{$review->id}}/">詳細</a></td>
      <td>
        <form class="delteForm" method="POST" action="/reviews/{{$review->id}}">
          @csrf
          @method('DELETE')
          <input type="submit" value="削除" class="btn btn-danger btn-sm" >
        </form>
      </td>
    </tr>
    @endforeach
  </table>
  {{ $reviews->appends(['sort'=>$sort])->links('vendor.pagination.bootstrap-4') }}
  {{-- {{ $reviews->appends(['sort'=>$sort])->links('vendor.pagination.simple-bootstrap-4') }} --}}
  {{-- {{ $reviews->appends(['sort'=>$sort])->links('vendor.pagination.simple-default') }} --}}
  <a href="/reviews/create" class="btn btn-lg btn-success mt-5">新規作成</a>
</div>

@endsection

@section('js')
$('.toast').toast('show');
$('.delteForm').submit(function(){
  return confirm("削除してよろしいですか？")
})
@endsection