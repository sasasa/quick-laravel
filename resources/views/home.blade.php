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
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection