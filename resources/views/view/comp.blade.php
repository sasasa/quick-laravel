@extends('layouts.base')

@section('title','共通レイアウトの基本')

@section('main')
  @component('components.alert', ['type' => 'success'])
      @slot('alert_title')
          初めてのコンポーネント
      @endslot
      コンポーネントは普通のビューと同じように.blade.phpファイルを定義できます！
  @endcomponent

  @include('components.alert', [
    'type' => 'info',
    'alert_title' => "二回目のサブビュー",
    'slot' => 'サブビューでは親テンプレートの変数はそのまま使えます。',
  ])

  <h2>サービスプロバイダー（アクションでのメソッドインジェクションなど）</h2>
  <p>{{$msg1}}</p>
  <ul>
  @foreach ($data1 as $item)
    <li>{{$item}}</li>
  @endforeach
  </ul>

  <h2>ファサード（Class::mathodを直接呼び出す）</h2>
  <p>{{$msg2}}</p>
  <ul>
  @foreach ($data2 as $item)
    <li>{{$item}}</li>
  @endforeach
  </ul>
@endsection

