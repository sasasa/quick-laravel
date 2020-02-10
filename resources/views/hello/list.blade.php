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
  <form method="POST" action="/hello/search">
  @csrf
  <label for="min">値段の絞り込み+1000円</label>
  <input type="text" name="min" id="min" value="{{isset($min)? $min : ""}}">
  <input type="submit" value="検索">
  </form>

  {{$view_composer}}
  <caption>レビューがあるものだけ</caption>
  <table class="table">
    <tr>
      <th>No.</th>
      <th>書名</th>
      <th>価格</th>
      <th>出版社</th>
      <th>刊行日</th>
      <th></th>
      <th></th>
    </tr>
    @foreach($records as $index => $record)
    <tr>
      <td>{{$index + 1}}</td>
      <td>{{$record->title}}</td>
      <td>{{$record->price}}</td>
      <td>{{$record->publisher}}</td>
      <td>{{$record->published}}</td>
      <td>
        @if($record->reviews != null)
        <table>
          @foreach ($record->reviews as $review)
            <tr>
              <td>{{$review->getData()}}</td>
            </tr>
          @endforeach
        </table>
        @endif
      </td>
      <td>
        <a href="/save/{{$record->id}}/edit">編集</a>
        <a href="/save/{{$record->id}}">削除</a>
      </td>
    </tr>
    @endforeach
  </table>

  @isset($has_not_records)
  <caption>レビューが無いものだけ</caption>
  <table class="table">
    <tr>
      <th>No.</th>
      <th>書名</th>
      <th>価格</th>
      <th>出版社</th>
      <th>刊行日</th>
      <th></th>
      <th></th>
    </tr>
    @foreach($has_not_records as $index => $record)
    <tr>
      <td>{{$index + 1}}</td>
      <td>{{$record->title}}</td>
      <td>{{$record->price}}</td>
      <td>{{$record->publisher}}</td>
      <td>{{$record->published}}</td>
      <td>
      </td>
      <td>
        <a href="/save/{{$record->id}}/edit">編集</a>
        <a href="/save/{{$record->id}}">削除</a>
      </td>
    </tr>
    @endforeach
  </table>
  @endisset

  <caption>コレクションビューの呼び出し</caption>
  <table class="table">
    <tr>
      <th>書名</th>
      <th>価格</th>
      <th>出版社</th>
      <th>刊行日</th>
    </tr>
    {{-- コレクションビュー呼び出し --}}
    @each('subviews.book', $records, 'record', 'subviews.empty')
  </table>
</body>
</html>