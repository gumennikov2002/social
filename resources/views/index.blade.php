@extends('common')
@section('title', 'Главная страница')
@section('content')
<div class="container mt-4 mb-5">
    <h3 class="mb-4">Последние посты</h3>
    <!-- Начало карточки -->
    @foreach($post as $row)
    <div class="alert alert-dismissible alert-light mb-4" style="max-width: 100rem;">
        <div class="card-header d-flex justify-content-between">
            <a class="profile-link" href="/profile/{{ $row->user_id }}">{{ $row->name }}</a>
            <span>{{ $row->created_at }}</span>
        </div>
        <div class="card-body">
            <h4 class="card-title">{{ $row->title }}</h4>
            <p class="card-text">{{ $row->text }}</p>
        </div>
        @if($row->user_id == session('LoggedUser'))
        <div class="d-flex justify-content-between">
            <div class="card-footer d-flex justify-content-start nav-link cp">
                <a href="/profile/delpost/{{ $row->id }}" class="btn btn-outline-danger">Удалить</a>
            </div>
            <div class="card-footer d-flex justify-content-end nav-link cp">
                <a href="/post/{{ $row->id }}" class="btn btn-outline-success">Подробнее</a>
            </div>
        </div>
        @else
        <div class="d-flex justify-content-end">
            <div class="card-footer d-flex justify-content-end nav-link cp">
                <a href="/post/{{ $row->id }}" class="btn btn-outline-success">Подробнее</a>
            </div>
        </div>
        @endif
    </div>
    <!-- Конец карточки -->
    @endforeach
</div>
@endsection