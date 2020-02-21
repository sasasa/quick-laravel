@extends('layouts.base')
@section('title', "Skills一覧")

@section('main')
@if(session('store'))
<div class="alert alert-primary" role="alert">{{session('store')}}</div>
@endif
@if(session('update'))
<div class="alert alert-info" role="alert">{{session('update')}}</div>
@endif
@if(session('destroy'))
<div class="alert alert-danger" role="alert">{{session('destroy')}}</div>
@endif
<div class="container">
  <table class="table">
    <tr>
      <th>{{__('validation.attributes.skill.type')}}</th>
      <th>{{__('validation.attributes.skill.name')}}</th>
      <th>{{__('validation.attributes.skill.users')}}</th>
      <th></th>
    </tr>
    @each('skills.each', $skills, 'skill', 'skills.empty')
  </table>
  <a href="/skills/create" class="btn btn-info mt-3">新規追加</a>
</div>
@endsection