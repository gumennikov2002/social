@extends('common')
@section('title', 'Авторизация')
@section('content')
<center>
    <div class="container" id="Login">
        <h4>Авторизация</h4>
        <form action="{{ route('check') }}" method="POST" class="mt-3 custom-input">
        @csrf
            <input type="email" class="form-control mt-2" placeholder="Email" name="email">
            <input type="password" class="form-control mt-2" placeholder="Пароль" name="password">
            <input type="submit" class="btn btn-outline-primary mt-2" value="Войти">
            <span class="nav-link cp" onclick="showRegForm()">У меня нет аккаунта</span>
        </form>
        @if(count($errors) > 0)
        <div class="alert alert-danger mt-3" style="width:300px">
            <span class="text-white">@error('email'){{ $message }} @enderror</span> <br>
            <span class="text-white">@error('password'){{ $message }} @enderror</span>
        </div>
        @endif
        @if(Session::get('success'))
    <div class="alert alert-success mt-3" style="width:300px">
      <span class="text-white">{{ Session::get('success') }}</span>
    </div>
    @endif
    @if(Session::get('fail'))
      <div class="alert alert-danger mt-3" style="width:300px">
        <span class="text-white">{{ Session::get('fail') }}</span>
      </div>
      @endif
    </div>

    <div class="container" id="Reg" style="display: none;">

        <h4>Регистрация</h4>
        <form action="{{ route('save') }}" method="POST" class="mt-3 custom-input">
        @csrf
            <input type="email" class="form-control mt-2" placeholder="Email" name="email">
            <input type="password" class="form-control mt-2" placeholder="Пароль" name="password">
            <input type="submit" class="btn btn-outline-primary mt-2" value="Войти">
            <span class="nav-link cp" onclick="showLoginForm()">Я уже зарегистрирован</span>
        </form>
        @if(count($errors) > 0)
        <div class="alert alert-danger mt-3" style="width:300px">
            <span class="text-white">@error('email'){{ $message }} @enderror</span> <br>
            <span class="text-white">@error('password'){{ $message }} @enderror</span>
        </div>
        @endif

        @if(Session::get('fail'))
      <div class="alert alert-danger mt-3" style="width:300px">
        <span class="text-white">{{ Session::get('fail') }}</span>
      </div>
      @endif
    </div>
</center>
@endsection