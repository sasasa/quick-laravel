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
@endsection

