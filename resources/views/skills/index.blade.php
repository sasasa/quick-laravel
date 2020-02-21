@extends('layouts.base')
@section('title', "Skills一覧")

@section('main')
<div class="container">
  <table class="table">
    <tr>
      <th>{{__('validation.attributes.skill.type')}}</th>
      <th>{{__('validation.attributes.skill.name')}}</th>
      <th>{{__('validation.attributes.skill.users')}}</th>
    </tr>
    @each('skills.each', $skills, 'skill', 'skills.empty')
  </table>
  <a href="/skills/create" class="btn btn-info mt-3">新規追加</a>
</div>
@endsection