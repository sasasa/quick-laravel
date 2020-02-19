<tr>
  <td>{{$skill->type}}</td>
  <td>{{$skill->name}}</td>
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
</tr>