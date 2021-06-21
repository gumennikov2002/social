@extends('common')
@section('title', 'Профиль')
@section('content')

<div class="container mt-3 mb-5">
  <!-- Начало карточки -->
  <div class="alert alert-dismissible alert-light mb-3" style="max-width: 100rem; min-height: 300px;">
    <div class="card-header d-flex justify-content-between">
      <a class="profile-link" href="/profile/{{ $postinfo->user_id }}">{{ $postinfo->name }}</a>
      <span>{{$postinfo->created_at}}</span>
    </div>
    <div class="card-body">
      <h4 class="card-title">{{ $postinfo->title }} </h4>
      <p class="card-text">{{ $postinfo->text }}</p>
    </div>
  </div>
  <!-- Конец карточки -->
  <h4>Комментарии</h4>
  @if(session('LoggedUser'))
  <form action="/post/addcomment/{{ $postinfo->id }}" method="POST" class="mt-2 mb-2 sendcomment alert alert-dismissible alert-light">
    @csrf
    <textarea placeholder="Текст вашего комментария" type="text" class="form-control" name="text"></textarea>
    <div class="d-flex justify-content-between mt-2">
      <span class="pt-3">Вы можете оставить свой комментарий</span>
      <input type="submit" class="btn btn-outline-success" value="Отправить">
    </div>
  </form>
  @endif

  @foreach($comments as $comment)

  <div id="replyform" class="mt-3" style="display:none;">
    <form action="/post/addreply/{{ $comment->id }}" method="POST" class="mt-2 mb-2 sendcomment alert alert-dismissible alert-secondary">
      @csrf
      <textarea type="text" class="form-control" placeholder="Текст вашего комментария" name="text"></textarea>
      <input type="text" value="{{ $postinfo->id }}" style="display:none;" name="post_id">
      <div class="d-flex justify-content-between mt-2">
        <span class="pt-3">Ответ на комментарий пользователя <span class="profile-link">{{ $comment->name }}</span></span>
        <input type="submit" class="btn btn-outline-success" value="Отправить">
      </div>
    </form>
  </div>

  <div class="alert alert-dismissible alert-light mt-3 mb-3" style="max-width: 100rem;">
    @if($comment -> reply_id != NULL)
    <div class="card-header d-flex justify-content-between">
      <div>
        <a class="profile-link" href="/profile/{{ $comment->author_id }}">{{ $comment->name }}</a>
        <span>в ответ на комментарий {{ $comment->name }}</span>
      </div>
      <span>{{ $comment->created_at }}</span>
    </div>
    @else
    <div class="card-header d-flex justify-content-between">
      <a class="profile-link" href="/profile/{{ $comment->author_id }}">{{ $comment->name }}</a>
      <span>{{ $comment->created_at }}</span>
    </div>
    @endif
    <div class="card-body">
      <p class="card-text">{{ $comment->text }}</p>
    </div>
    @if( $comment->author_id == session('LoggedUser') )
    <div class="card-footer d-flex justify-content-between">
      <a href="/post/delcomment/{{ $comment->id }}">Удалить</a>
      <a class="cp" onclick="showHide('replyform')">Ответить</a>
    </div>
    @elseif(session('LoggedUser'))
    <div class="card-footer d-flex justify-content-end">
      <a class="cp" onclick="showHide('replyform')">Ответить</a>
    </div>
    @endif

  </div>

  @endforeach
</div>
@endsection