@extends('layouts.base')
@section('title', $title)

@section('main')
<table class="table">
  <tr>
    <th>出版社</th>
    <th>平均価格</th>
  </tr>
  @foreach($records as $index => $record)
  <tr>
    <td>{{$record->publisher}}</td>
    <td>{{round($record->price_avg)}}</td>
  </tr>
  @endforeach
</table>
@endsection