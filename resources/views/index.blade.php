@extends('common')
@section('title', 'Главная страница')
@section('content')
<div class="container mt-5 ">

    <!-- Начало карточки -->
    @foreach($post as $row)
    <div class="card border-primary mb-3" style="max-width: 100rem;">
        <div class="card-header d-flex justify-content-between">
            <span> <span class="del-space">@</span> {{ $row->name }}</span>
            <span>{{ $row->created_at }}</span>
        </div>
        <div class="card-body">
          <h4 class="card-title">{{ $row->title }}</h4>
          <p class="card-text">{{ $row->text }}</p>
        </div>
        <div class="card-footer d-flex justify-content-end nav-link cp" onclick="showHide('comments')">Комментарии (2)</div>
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
            <div class="card-footer d-flex justify-content-end nav-link cp" onclick="showHide('replies')">Ответы (1)</div>
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
        @endforeach
</div>
@endsection