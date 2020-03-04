<tr>
  <td>{{$skill->type}}</td>
  <td>{{$skill->name}}</td>
  <td>
    <table>
      @foreach ($skill->tags as $tag)
      <tr>
        <td>
          {{$tag->name}}
        </td>
      </tr>
      @endforeach
    </table>    
  </td>
  <td>
    <table>
      @foreach ($skill->users as $user)
      <tr>
        <td>
          {{$user->name}}
        </td>
      </tr>
      @endforeach
    </table>
  </td>
  <td>
    <a href="/skills/{{$skill->id}}/edit">編集</a>
    <form action="/skills/{{$skill->id}}" method="POST">
      @csrf
      @method('delete')
      <input type="submit" value="削除" class="btn btn-danger btn-sm" onclick='return confirm("本当に削除しますか？");'>
    </form>
  </td>
</tr>