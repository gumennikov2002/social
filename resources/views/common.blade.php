<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bootstrap.min.css">
    <link rel="stylesheet" href="../style.css">
    <title>BOOX | @yield('title')</title>
</head>

<body>



    <nav class="navbar navbar-expand-lg navbar-light bg-light alert-light alert">
        <div class="container">
            <a class="navbar-brand" href="/">BOOX</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor02"
                aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
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
                <a href="/profile/{{ $LoggedUserInfo['id'] }}"
                    class="nav-link  profile-link">{{ $LoggedUserInfo['name'] }}</a>
                <span class="cp nav-link" onclick="showHide('addpostsec')">Добавить пост</span>
                <a href="/logout" class="nav-link">Выйти</a>
                @else
                <a href="/auth" class="nav-link">Авторизация</a>
                @endif
            </div>
        </div>
    </nav>

    @if(session('LoggedUser'))
    <div id="addpostsec" style="display:none">
        <form id="addpost" class="mt-4 container d-flex flex-column" method="POST" action="/profile/addpost">
            @csrf
            <input type="text" class="form-control" name="title" placeholder="Заголовок поста">
            <textarea placeholder="Текст вашего поста" class="form-control mt-2" name="text"></textarea>
            <input type="text" value="{{ $LoggedUserInfo['id'] }}" name="user_id" style="display:none">
            <input type="submit" value="Добавить пост" class="btn btn-primary mt-2">
        </form>
    </div>
    @endif
    @yield('content')

    <script src="/script.js"></script>
</body>

</html>