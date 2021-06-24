<html>

<head>
    <title>{{ $book->title }}</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/bootstrap.min.css">
    <link rel="stylesheet" href="/style.css">
</head>

<body class="readmode light-theme" id="body">
    <div class="container d-flex justify-content-between">
        <a href="/library">Назад</a>
        <span class="cp" id="changeTheme" onclick="changeTheme()">Переключить тему</span>
    </div>
    <h1 class="text-center mt-3">{{ $book->title }}</h1>
    <div class="container mb-5">
        <span>
            {{ $book->content }}
        </span>
    </div>
    <script src="/script.js"></script>
</body>

</html>