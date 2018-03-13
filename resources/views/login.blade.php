@extends('layout')

@section('title')
    Вход
@endsection

@section('header')
    Вход
@endsection

@section('content')
    @if(isset($error))
        <div class="alert alert-danger" role="alert"><strong>Не удалось войти! </strong><br>{{ $error }}</div>
    @endif
    <form action="" method="post">
        <div class="form-group">
            {{ csrf_field() }}
            <label for="">Email</label><input class="form-control" name="email" placeholder="ivan@petrov.ru" type="text" value="{{ $email or '' }}">
            <div class="pre-icon os-icon os-icon-user-male-circle"></div>
        </div>
        <div class="form-group">
            <label for="">Пароль</label><input class="form-control" placeholder="********" type="password">
            <div class="pre-icon os-icon os-icon-fingerprint"></div>
        </div>
        <div class="buttons-w">
            <button class="btn btn-primary">Войти</button>
            <div class="form-check-inline">
                <label class="form-check-label"><input class="form-check-input" type="checkbox" checked>Запомнить меня</label>
            </div>
        </div>
    </form>
@endsection