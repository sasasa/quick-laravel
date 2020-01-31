@isset($msg)
  <p>変数msgは{{$msg}}です。</p>
@endisset

@empty($msg)
  <p>メッセージがありません？</p>
@endempty