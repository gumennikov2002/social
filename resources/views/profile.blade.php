@extends('common')
@section('title', 'Профиль')
@section('content')

      <form class="mt-4 container d-flex flex-column" method="POST" action="/profile/addpost">
      @csrf
          <input type="text" class="form-control" name="title" placeholder="Заголовок поста">
          <div class="d-flex">
            <textarea placeholder="Текст вашего поста" class="form-control mt-2" name="text"></textarea>
            <input type="text" value="{{ $LoggedUserInfo['id'] }}" name="user_id" style="display:none">
            <input type="submit" value="+" class="btn btn-primary mt-2">
          </div>
      </form>
      @if(count($errors) > 0)
      <div class="container">
        <div class="alert alert-danger mt-3">
                <span class="text-white">@error('title'){{ $message }} @enderror</span> <br>
                <span class="text-white">@error('text'){{ $message }} @enderror</span>
         </div>
      </div>
        @endif

<div class="container mt-4">
@if(Session::get('fail'))
      <div class="alert alert-danger mt-3" style="width:300px">
        <span class="text-white">{{ Session::get('fail') }}</span>
      </div>
      @endif

@foreach($post as $row)
       <!-- Начало карточки -->
    <div class="card border-primary mb-3" style="max-width: 100rem;">
        <div class="card-header d-flex justify-content-between">
            <span> <span class="del-space">@</span>{{ $LoggedUserInfo['name'] }}</span>
            <span>{{ $row->created_at }}</span>
        </div>
        <div class="card-body">
          <h4 class="card-title">{{ $row->title }}</h4>
          <p class="card-text">{{ $row->text }}</p>
        </div>
        <div class="d-flex justify-content-between">
            <a href="profile/delpost/{{ $row->id }}" class="btn btn-outline-danger">Удалить</a>
            <div class="card-footer d-flex justify-content-end nav-link cp" onclick="showHide('comments')">Комментарии (2)</div>
        </div>
      </div>
      <!-- Конец карточки -->

      <!-- Комментарии -->
      <div id="comments" style="display: none;;">
        <h3>Комментарии</h3>
        <div class="card text-white bg-primary mb-3" style="max-width: 60rem;">
            <div class="card-header d-flex justify-content-between">
                <span>@nickrandom</span>
                <span>19.06.2021</span>
            </div>
            <div class="card-body">
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            </div>
            <div class="card-footer d-flex justify-content-end nav-link cp text-white" onclick="showHide('replies')">Ответы (1)</div>
        </div>
    </div>
        <!-- Конец комментариев -->

        <!-- Ответы -->
        <div id="replies" style="display:none;">
            <h4>Отвыты на комментарий @nickrandom</h4>
            <div class="card text-white bg-info mb-3" style="max-width: 50rem;">
            <div class="card-header d-flex justify-content-between">
                <span>@ussr</span>
                <span>23.06.2021</span>
            </div>
            <div class="card-body">
                <p class="card-text">Somzxe quxzcick examfsdfzxple text to build on the card title andsxc make up the bcvcxulk of the card's contadsfent.</p>
            </div>
        </div>
        </div>
        <!-- Конец ответов -->
@endforeach
    </div>
@endsection