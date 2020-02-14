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
            <label class="mr-5 mb-3 form-check-label" for="skill_{{$skill->id}}">
              <input name="skills[]" class="form-check-input" type="checkbox" value="{{$skill->id}}" id="skill_{{$skill->id}}" {{in_array($skill->id, $userskillids) ? "checked" : null}}>{{$skill->name}}
            </label>
          @endforeach
        </div>
        <div class="form-group d-flex justify-content-end">
          <input type="submit" value="送信" class="btn btn-primary btn-lg" >
        </div>
      </form>

      <form method="POST" action="/skilluser">
        @csrf
        <div class="form-group row">
          <label class="col-sm-2 col-form-label" for="skills">スキル</label>
          <div class="col-sm-10">
          {{
            Form::select('skills[]',
            Arr::pluck($skills, 'name', 'id'),
            $userskillids,
            [
              'class' => "form-control",
              'id' => "skills",
              'multiple' => true,
              'size' => $skills->count()
            ])
          }}
          </div>
        </div>
        <div class="form-group d-flex justify-content-end">
          <input type="submit" value="送信" class="btn btn-primary btn-lg" >
        </div>
      </form>
    </div>
    <div class="col-3"></div>
  </div>
</div>
@endsection