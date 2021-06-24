@extends('common')
@section('title', 'Библиотека')
@section('content')

<div class="container">
    <form action="/library/updatebook/{{ $mybooks->id }}" method="POST">
    @csrf
        <div class="card border-success" style="margin-right:25px; margin-bottom: 25px;">
            <div class="card-header d-flex justify-content-between">
                <a href="#" class="profile-link">{{ $mybooks->name }}</a>
                <input type="text" value="{{ $mybooks->year }}" name="year" class="form-control edit-control-year"
                    placeholder="Год">
            </div>
            <div class="card-body">
                <input type="text" class="card-title form-control edit-control-title" name="title" value="{{ $mybooks->title }}"
                    placeholder="Заголовок">
                <textarea class="form-control" name="content" rows="10"
                    placeholder="Текст книги">{{ $mybooks->content }}</textarea>
            </div>
            <div class="card-footer d-flex justify-content-end">
                <input type="submit" class="btn btn-outline-success" value="Примерить">
            </div>
        </div>
    </form>
</div>

@endsection