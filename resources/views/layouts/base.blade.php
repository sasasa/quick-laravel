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
  <a href="/home">
    <img src="https://wings.msn.to/image/wings.jpg" title="ロゴ"><hr>
  </a>
  <!-- b.mainコンテンツの置き場所 -->
  @section('main')
    <p>既定のコンテンツ</p>
  @show
  <hr>
  <p>Copyright(c) 1998-2019, WINGS Project. All Right Reserved.</p>

  <!-- jQuery、Popper.js、Bootstrap.jsの順番で読み込みます（下記はbundle版を使用） -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.bundle.min.js" integrity="sha384-zDnhMsjVZfS3hiP7oCBRmfjkQC4fzxVxFhBx8Hkz2aZX8gEvA/jsP3eXRCvzTofP" crossorigin="anonymous"></script>
  <script>
  @section('js')
  @show
  </script>
</body>
</html>