@extends('layouts.base')
@section('title', "ポリモーフィック関連と画像添付")

@section('main')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-8">

      <form action="posts" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
          <label for="subject">題名</label>
          <input class="@error('subject') is-invalid @enderror form-control" type="text" name="subject" id="subject" value="{{old('subject')}}">
          @error('subject')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
        <div class="form-group">
          <label for="body">本文</label>
          <textarea class="@error('body') is-invalid @enderror form-control" name="body" id="body" cols="50" rows="8">{{old('body')}}</textarea>
          @error('body')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
        <div class="form-group">
          <label for="files">添付画像</label>
          <input class="@error('files') is-invalid @enderror @error('files.*') is-invalid @enderror form-control-file" type="file" name="files[]" id="files" multiple>
          @error('files')
          <span class="text-danger invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
          @enderror
          @error('files.*')
          <span class="text-danger invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
        <div class="form-group d-flex justify-content-end">
          <input type="submit" value="投稿" class="btn btn-primary btn-lg" >
        </div>
    </form>

    @foreach ($posts as $post)
      <hr>
      <p>{{ $post->subject }}</p>
      <p>{!! nl2br(e($post->body)) !!}</p>
      <p>
        @foreach ($post->images as $image)
          <img src="{{ 'storage/' . $image->filename }}">
        @endforeach
      </p>
      <blockquote>
        @foreach ($post->comments as $comment)
            <p>{!! nl2br(e($comment->body)) !!}</p>
            <p>
              @foreach ($comment->images as $image)
                <img src="{{ 'storage/' . $image->filename }}">
              @endforeach
            </p>
        @endforeach
        <form method="POST" action="comments" enctype="multipart/form-data">
          @csrf
          <p>
            コメント<br>
            <textarea name="comment_body" cols="50" rows="3"></textarea>
            @error('comment_body')
            <div class="text-danger">
              <strong>{{ $message }}</strong>
            </div>
            @enderror
          </p>
          <p>
            添付<br>
            <input type="file" name="comment_files[]" multiple>
            @error('comment_files')
            <div class="text-danger">
              <strong>{{ $message }}</strong>
            </div>
            @enderror
            @error('comment_files.*')
            <div class="text-danger">
              <strong>{{ $message }}</strong>
            </div>
            @enderror
          </p>
          <input type="hidden" name="post_id" value="{{ $post->id }}">
          <button>コメント投稿</button>
        </form>
      </blockquote>
    @endforeach
    </div>
  </div>
</div>
@endsection