@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">ダッシュボード</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <ul>
                        <li><a href="/">welcome</a></li>
                        <li><a href="/hello/list">books一覧</a></li>
                        <li><a href="/view/comp">コンポーネント利用</a></li>
                        <li><a href="/ctrl/upload">アップロード</a></li>
                        <li><a href="/reviews">レビュー一覧</a></li>
                        <li><a href="/skilluser">スキル設定</a></li>
                        <li><a href="/proficiency">スキル習熟度設定</a></li>
                        <li><a href="/skills">スキル一覧登録</a></li>
                        <li><a href="/chunkById">テーブルチャンク</a></li>
                        <li><a href="/record/whereYear">レコード、whereYear</a></li>
                        
                    </ul>
                    @php
                    phpinfo()
                    @endphp
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
