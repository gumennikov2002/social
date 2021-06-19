<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="bootstrap.min.css">
    <title>BOOX | @yield('title')</title>
</head>
<body>



<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container">
    <a class="navbar-brand" href="/">BOOX</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarColor02">
      <ul class="navbar-nav me-auto">
        <li class="nav-item">
          <a class="nav-link active" href="/">Последние посты
            <span class="visually-hidden">(current)</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Книги</a>
        </li>
      </ul>
      @if(session('LoggedUser'))
        <a href="/profile" style="color:rgba(255,255,255,.55);" class="nav-link"> <span class="del-space">@</span> {{ $LoggedUserInfo['name'] }}</a>
        <a href="/logout" style="color:rgba(255,255,255,.55);" class="nav-link">Выйти</a>
      @else
        <a href="/auth" style="color:rgba(255,255,255,.55);" class="nav-link">Авторизация</a>
      @endif
    </div>
  </div>
</nav>

@yield('content')

<script src="script.js"></script>
</body>
</html>