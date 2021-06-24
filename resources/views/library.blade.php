@extends('common')
@section('title', 'Библиотека')
@section('content')

<div class="container alert alert-light">
    <div class="d-flex lib-span">
        <span class="cp fwb" onclick="showMyLib()" id="mylib">Моя библиотека</span>
        <span class="cp" onclick="showOtherLib()" id="otherlib">Другие библиотеки</span>
        <span class="cp" onclick="showAddBook()" id="addbook">Добавить книгу</span>
        <span class="cp" onclick="showAccess()" id="acess">Доступ</span>
    </div>
</div>

<div id="MyLibPage">
    <div class="container mt-2 d-flex flex-wrap">

        @foreach($mybooks as $book)
        <div class="card border-success" style="max-width: 20rem; margin-right:25px; margin-bottom: 25px;">
            <div class="card-header d-flex justify-content-between">
                <a href="#" class="profile-link">{{ $book->name }}</a>
                <span class="cp">{{ $book->year }}г.</span>
            </div>
            <div class="card-body">
                <h4 class="card-title">{{ $book->title }}</h4>
                <p class="card-text books-text">{{ $book->content }}</p>
            </div>
            <div class="card-footer d-flex justify-content-between">
                <a href="/library/removebook/{{ $book->id }}">Удалить</a>
                <a href="/library/editbook/{{ $book->id }}">Изменить
                </a>
                <a href="/library/read/{{ $book->id }}">Прочитать</a>
            </div>
        </div>
        @endforeach
    </div>
</div>



<div id="OtherLibPage" style="display:none;" class="mt-3">
    <div class="container">
        <h4>Книги от пользователя othname</h4>
    </div>
    <div class="container mt-2 d-flex flex-wrap">
        <div class="card border-success" style="max-width: 20rem; margin-right:25px; margin-bottom: 25px;">
            <div class="card-header d-flex justify-content-between">
                <a href="#" class="profile-link">othname</a>
                <span class="cp">1994г.</span>
            </div>
            <div class="card-body">
                <h4 class="card-title">Книга1</h4>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                    card's
                    content.</p>
            </div>
            <div class="card-footer d-flex justify-content-end">
                <a href="#">Прочитать</a>
            </div>
        </div>
    </div>
</div>

<div id="AddLibPage" style="display:none" class="mt-5">
    <center>
        <h4>Добавить книгу</h4>
        <div class="container mt-2" style="width: 500px;">
            <form action="/library/addbook" method="POST" class="d-flex flex-column">
                @csrf
                <input type="text" style="display:none" value="{{ $LoggedUserInfo['id'] }}" name="author_id">
                <input type="text" class="form-control mt-2" placeholder="Название книги" name="title">
                <textarea placeholder="Текст книги" class="form-control mt-2" name="content"></textarea>
                <input type="text" class="form-control mt-2" placeholder="Год книги" name="year">
                <input type="submit" class="btn btn-outline-success mt-2" value="Добавить">
            </form>
        </div>
    </center>
</div>


@endsection