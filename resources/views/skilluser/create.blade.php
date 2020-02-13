@extends('layouts.base')
@section('title', "skills設定")

@section('main')
<div class="container">
  <div class="row">
    <div class="col-3"></div>
    <div class="col-6">
      <h1>skills設定</h1>
      <form method="POST" action="/skilluser">
        @csrf
        <div class="form-check">
          @foreach ($skills as $skill)
            <label class="form-check-label" for="skill_{{$skill->id}}">
              <input name="skills[]" class="form-check-input" type="checkbox" value="{{$skill->id}}" id="skill_{{$skill->id}}" {{in_array($skill->id, $userskillids) ? "checked" : null}}>{{$skill->name}}
          </label><br>
          @endforeach
        </div>
        <div class="form-group">
          <input type="submit" value="送信" class="btn btn-primary btn-lg" >
        </div>
      </form>
    </div>
    <div class="col-3"></div>
  </div>
</div>
@endsection