@extends('layouts.agent')

@section('title', 'Авторизация агента')

@section('body-class', 'login-agent')

@section('content')
    <div class="content">
        <div class="container">
            <div class="login-form">
                <h1>{{ __('Войти как агент') }}</h1>
                <form class="form" action="{{ route('agent.login.action') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <input type="email" name="email" value="{{ old('email') }}" placeholder="E-mail">
                        @error('email') <span class="form-error">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" placeholder="Пароль">
                        @error('password') <span class="form-error">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group checkbox">
                        <label>{{ __('Запомнить меня') }}
                            <input type="checkbox" name="remember">
                            <span class="checkmark"></span>
                        </label>
                    </div>
                    <div class="form-group">
                        <button type="submit">{{ __('Войти') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop
