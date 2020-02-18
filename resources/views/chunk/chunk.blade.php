<h1>chunk</h1>
<p>nameの順番に塊で取り出して処理する
  この例では2個ずつ取り出して最初のものだけ処理している。
</p>
<p>{{$msg}}</p>
<ul>
  @foreach ($data as $user)
    <li>{{$user->id}}({{$user->name}})</li>
  @endforeach
</ul>