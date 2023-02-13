@extends('layouts.theme')

@section('content')
    <section class="step-page">
        <div class="container">
            <div class="step-page-block">
                <form action="{{ route('auth.login') }}" class="step-page-form form styled" method="post">
                    <h3 class="step-page-form__title">
                        {{ __('У меня уже есть аккаунт') }}
                    </h3>
                    @csrf
                    <div class="form-group">
                        <label class="step-page-form__template"></label>
                        <input type="email" name="log_email" class="step-page-form__template-input" placeholder="Введите Email">
                    </div>
                    <div class="form-group">
                        <label class="step-page-form__template template-two"></label>
                        <input type="password" name="log_password" class="step-page-form__template-input" placeholder="Введите пароль">
{{--                        <a href="#" class="link">Забыли пароль?</a>--}}
                    </div>
                    <div class="form-group">
                        <button class="btn-black" type="submit">{{ __('Войти') }}</button>
                    </div>
                </form>
                <form action="{{ route('auth.login.guest') }}" class="step-page-form form styled" method="post">
                    <h3 class="step-page-form__title">
                        {{ __('Продолжить как гость') }}
                    </h3>
                    @csrf
                    <div class="form-group">
                        <label class="step-page-form__template"></label>
                        <input type="phone" name="phone" class="step-page-form__template-input" placeholder="Ваш email">
                    </div>
                    <div class="form-group checkbox top @error('rules_accept') form-error @enderror">
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
            <br/><br/>
        </div>
    </section>
@endsection
