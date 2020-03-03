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

  <form class="form-inline my-5" action="/reviews?sort={{$sort}}&" method="get">
    <input type="search" name="search" value="{{$search}}" class="form-control mr-2">
    <input type="submit" value="検索" class="btn btn-info btn-sm">
  </form>

  <table class="table">
    <tr>
      <th>
        <a href="/reviews?sort=book_id&next={{$next}}">書籍
          @if($sort == 'book_id')
            {{$actual == 'asc' ? '↑':'↓'}}
          @endif
        </a>
      </th>
      <th>
        <a href="/reviews?sort=name&next={{$next}}">名前
          @if($sort == 'name')
            {{$actual == 'asc' ? '↑':'↓'}}
          @endif
        </a>
      </th>
      <th style="width:360px;">
        <a href="/reviews?sort=body&next={{$next}}">本文
          @if($sort == 'body')
            {{$actual == 'asc' ? '↑':'↓'}}
          @endif
        </a>
      </th>
      <th></th>
      <th></th>
      <th></th>
      <th></th>
    </tr>
    @foreach($reviews as $review)
    <tr>
      <td>{{$review->book->title}}</td>
      <td>{{$review->name}}</td>
      <td>{{$review->body}}</td>
      <td>
        <table>
          @foreach ($review->reviewComments as $reviewComment)
          <tr>
            <td>
              {{$reviewComment->body}}
              <form action="/review_comments/{{$reviewComment->id}}" id="form_{{ $reviewComment->id }}" method="POST" style="display:inline">
                @csrf
                @method('delete')
                <a href="#" data-id="{{ $reviewComment->id }}" onclick="deletePost(this);" class="fs12">[&times;]</a>
              </form>
            </td>
          </tr>
          @endforeach
          <tr>
            <td>
              <form method="POST" action="review_comments">
                @csrf
                <input type="hidden" name="review_id" value="{{$review->id}}">
                <input type="text" name="body" value="{{old('body')}}">
                @error("body")
                <div class="text-danger">{{$message}}</div>
                @enderror

                <input type="submit" value="コメント">
              </form>
            </td>
          </tr>
        </table>
      </td>
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
  {{ 
    $reviews->appends([
      'sort' => $sort,
      'search' => $search,
      'actual' => $actual,
    ])->links('vendor.pagination.bootstrap-4')
  }}
  {{-- {{ $reviews->appends(['sort'=>$sort])->links('vendor.pagination.simple-bootstrap-4') }} --}}
  {{-- {{ $reviews->appends(['sort'=>$sort])->links('vendor.pagination.simple-default') }} --}}
  <a href="/reviews/create" class="btn btn-lg btn-success mt-5">新規作成</a>
</div>

@endsection

@section('js')
'use strict';

$('.toast').toast('show');
$('.delteForm').submit(function(){
  return confirm("削除してよろしいですか？")
})

function deletePost(e) {
  if (confirm('本当に削除しますか?')) {
    document.getElementById('form_' + e.dataset.id).submit();
  }
}
@endsection