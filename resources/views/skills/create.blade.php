@extends('layouts.base')
@section('title', "Skills一覧")

@section('main')
<form action="/skills" method="POST">
  @csrf
  <div class="form-group">
    <label for="name">{{__('validation.attributes.skill.name')}}</label>
    <input class="form-control" type="text" name="name" id="name" value="{{old('name')}}">
    @error('name')
      <div class="text-danger">{{$message}}</div>
    @enderror
  </div>
  <div class="form-group">
    <label for="type">{{__('validation.attributes.skill.type')}}</label>
    <input class="form-control" type="text" name="type" id="type" value="{{old('type')}}">
    @error('type')
      <div class="text-danger">{{$message}}</div>
    @enderror
  </div>

  <div class="form-group">
    <label for="type">{{__('validation.attributes.skill.type')}}</label>
    {{
    Form::select('type',
    $skill_types,
    old('type'),
    ['placeholder' => '選択してください', 'id' => 'type', 'class' => 'form-control'])
    }}

    @error('type')
      <div class="text-danger">{{$message}}</div>
    @enderror
  </div>

  <div class="form-group  d-flex justify-content-end">
    <button type="submit" class="btn btn-primary">Submit</button>
  </div>
</form>

@endsection