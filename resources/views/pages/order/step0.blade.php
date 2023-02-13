@extends('layouts.theme')

@section('title', 'Главная страница')

@section('content')
    @desktop
    <section class="order-page">
        <div class="container">
            <div class="order-page-block">
                <form action="{{ route('auth.login') }}" class="order-page-form form styled" method="post">
                    <h3 class="order-page-form__title">
                        {{ __('У меня уже есть аккаунт') }}
                    </h3>
                    @csrf
                    <div class="form-group">
                        <label class="order-page-form__template">Email</label>
                        <input type="email" name="log_email" class="order-page-form__template-input" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <label class="order-page-form__template template-two">{{ __('Пароль') }}</label>
                        <input type="password" name="log_password" class="order-page-form__template-input" placeholder="Пароль">
                    </div>
                    <div class="form-group checkbox">
                        <label for="remember_me" class="remember">{{ __('Запомнить меня') }} <input type="checkbox" name="remember" id="remember_me"><span class="checkmark"></span> </label>
                    </div>
                    <div class="form-group">
                        <button class="btn-black" type="submit">{{ __('Войти') }}</button>
                    </div>
                </form>
                <form action="{{ route('auth.login.guest') }}" class="order-page-form another form styled" method="post">
                    <h3 class="order-page-form__title">
                        {{ __('Продолжить как гость') }}
                    </h3>
                    <p class="order-page-form__text">
                        {{ __('Мы сохраним ваши данные') }}
                    </p>
                    @csrf
                    <div class="form-group @error('g_email') form-error @enderror">
                        <label class="order-page-form__template">Email</label>
                        @error('g_email') <span class="error-msg">{{ $message }}</span> @enderror
                        <input type="email" name="g_email" class="order-page-form__template-input" placeholder="Email">
                    </div>

                    <div class="form-group checkbox @error('rules_accept') form-error @enderror">
                        <label for="rules-accept-order" class="remember wider">
                            <span class="black">{!! __('Я соглашаюсь с Условиями Пользования') !!}</a></span>
                            <input type="checkbox" id="rules-accept-order" name="rules_accept"><span class="checkmark"></span>
                        </label>
                        @error('rules_accept') <span class="error-msg">{{ $message }}</span> @enderror
                    </div>

                    <div class="form-group">
                        <button class="btn-black" type="submit">{{ __('продолжить оформление') }}</button>
                    </div>
                </form>
            </div>
            @include('partials.user_support')
        </div>
    </section>
    @enddesktop
    @handheld
        @include('mobile.step0_guest')
    @endhandheld
@stop
