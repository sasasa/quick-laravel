<h1>chunkById</h1>
<p>IDの順番に塊で取り出して処理する
  この例では2個ずつ取り出して奇数（最初）のものだけ処理している。
</p>
<p>{{$msg}}</p>
<ul>
  @foreach ($data as $user)
    <li>{{$user->id}}({{$user->name}})</li>
  @endforeach
</ul>