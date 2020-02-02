<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>@yield('title')</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
  <img src="https://wings.msn.to/image/wings.jpg" title="ロゴ"><hr>
  <!-- b.mainコンテンツの置き場所 -->
  @section('main')
    <p>既定のコンテンツ</p>
  @show
  <hr>
  <p>Copyright(c) 1998-2019, WINGS Project. All Right Reserved.</p>
</body>
</html>