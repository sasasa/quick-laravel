@forelse ($records as $record)
  <tr><td>{{$record}}</td></tr>
@empty
  <p>データが存在しません</p>
@endforelse