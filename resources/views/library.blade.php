@extends('common')
@section('title', 'Библиотека')
@section('content')

<div class="container alert alert-light">
    <div class="d-flex lib-span">
        <span class="cp fwb" onclick="showMyLib()" id="mylib">Моя библиотека</span>
        <span class="cp" onclick="showOtherLib()" id="otherlib">Другие библиотеки</span>
        <span class="cp" onclick="showAddBook()" id="addbook">Добавить книгу</span>
        <span class="cp" onclick="showAccess()" id="access">Доступ</span>
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
    <div class="container mt-2 d-flex flex-wrap">
    @foreach($othlib as $o)
        <div class="card border-success" style="max-width: 20rem; margin-right:25px; margin-bottom: 25px;">
            <div class="card-header d-flex justify-content-between">
                <a href="{{ $o->author_id }}" class="profile-link">{{ $o->name }}</a>
                <span class="cp">{{ $o->year }}г.</span>
            </div>
            <div class="card-body">
                <h4 class="card-title">{{ $o->title }}</h4>
                <p class="card-text books-text">{{ $o->content }}</p>
            </div>
            <div class="card-footer d-flex justify-content-end">
                <a href="/library/read/{{ $o->id }}">Прочитать</a>
            </div>
        </div>
    @endforeach
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

<div id="AccessLibPage" class="mt-4" style="display:none">
    <div class="container">
        <h4>Настройки доступа библиотеки</h4>
        <form action="/library/giveaccess/{{ $library->id }}" method="POST" class="d-flex">
        @csrf
            <input type="text" class="form-control" placeholder="Логин" name="name">
            <input type="submit" value="Дать доступ" class="btn btn-outline-success" style="margin-left:10px">
        </form>
        <h4 class="mt-4">Список пользователей с доступом к вашей библиотеке</h4>
        <table class="list-of-users table table-hover mt-2">
            <tr class="table-dark">
                <td>ID пользователя</td>
                <td>Логин</td>
                <td>Действие</td>
            </tr>
            @foreach($access as $a)
            <tr class="table-light">
                <td>{{ $a->user_id }}</td>
                <td><a href="/profile/{{ $a->user_id }}" class="profile-link">{{ $a->name }}</a></td>
                <td><a href="/library/removeaccess/{{ $a->user_id }}">Убрать доступ</a></td>
            </tr>
            @endforeach
        </table>
    </div>
</div>


@endsection