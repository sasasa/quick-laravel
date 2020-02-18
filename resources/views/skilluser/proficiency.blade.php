@extends('layouts.base')
@section('title', "skills習熟度設定")

@section('main')
<div class="container">
  <div class="row">
    <div class="col-3"></div>
    <div class="col-6">

      <form method="POST" action="/proficiency">
        @csrf

        @foreach ($skills as $skill)
        <div class="form-group">
          <label for="skill_{{$skill->id}}">{{$skill->name}}</label>
          <input class="form-control-range" type="range" max="10" min="0" name="skills[{{$skill->id}}]" id="skill_{{$skill->id}}" value="{{$skill->pivot->proficiency}}">
        </div>
        @endforeach

        <div class="form-group d-flex justify-content-end">
          <input type="submit" value="送信" class="btn btn-primary btn-lg" >
        </div>
      </form>

    </div>
    <div class="col-3"></div>
  </div>
</div>
@endsection