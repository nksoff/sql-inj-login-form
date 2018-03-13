@extends('layout')

@section('title')
    Главная
@endsection

@section('header')
    Вы вошли
@endsection

@section('content')
    <div class="logged-user-w">
        <div class="avatar-w">
            <img alt="" src="{{ Auth::user()->email === 'admin@user.ru' ? '/img/avatar1.jpg' : '/img/avatar3.jpg' }}">
        </div>
        <div class="logged-user-name">
            {{ Auth::user()->name }}
        </div>
        <div class="logged-user-role">
            {{ Auth::user()->email === 'admin@user.ru' ? 'Администратор' : 'Пользователь' }}
        </div>
    </div>

    @if(Auth::user()->email === 'admin@user.ru')
        <div class="alert alert-success" role="alert"><strong>Поздравляем!</strong> Вы вошли как администратор!</div>
    @else
        <div class="alert alert-warning" role="alert"><strong>Вы вошли!</strong> Теперь попробуйте войти как администратор.</div>
    @endif

    <div class="text-center">
        <a class="btn btn-secondary btn-lg mb-4" href="{{ route('logout') }}">Выйти</a>
    </div>
@endsection