<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>速習Laravel</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
  <table class="table">
    <tr>
      <th>No.</th>
      <th>書名</th>
      <th>価格</th>
      <th>出版社</th>
      <th>刊行日</th>
    </tr>
    @foreach($records as $index => $record)
    <tr>
      <td>{{$index + 1}}</td>
      <td>{{$record->title}}</td>
      <td>{{$record->price}}</td>
      <td>{{$record->publisher}}</td>
      <td>{{$record->published}}</td>
    </tr>
    @endforeach
    {{-- コレクションビュー呼び出し --}}
    @each('subviews.book', $records, 'record', 'subviews.empty')
  </table>
</body>
</html>