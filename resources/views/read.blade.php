<html>
    <head>
        <title>{{ $book->title }}</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="/bootstrap.min.css">
        <link rel="stylesheet" href="/style.css">
    </head>
    <body class="readmode">
        <div class="container">
            <a href="/library">Назад</a>
        </div>
        <h1 class="text-center mt-3">{{ $book->title }}</h1>
        <div class="container mb-5">
            <span>
                {{ $book->content }}
            </span>
        </div>
    </body>
</html>