@extends('layouts.theme')

@section('title', 'Добавить адрес')

@section('content')
    <div class="profile-page">
        <div class="container">
            <div class="inner">
                <div class="heads edit">
                    <p class="title flex item-center space-center"><img src="{{ url('i/icons/r-password.svg') }}" alt="">{{ __('Изменение пароля') }}</p>
                </div>

                <form action="{{ url()->current() }}" method="post" class="form styled minified">
                    @csrf
                    <div class="form-group @error('current_password') form-error @enderror">
                        <label for="">{{ __('Текущий пароль') }}</label>
                        @error('current_password') <span class="error-msg">{{ $message }}</span> @enderror
                        <input type="text" name="current_password" placeholder="{{ __('Введи текущий пароль') }}">
                    </div>
                    <div class="form-group @error('new_password') form-error @enderror">
                        <label for="">{{ __('Новый пароль') }}</label>
                        @error('new_password') <span class="error-msg">{{ $message }}</span> @enderror
                        <div class="infoed">
                            <input type="text" name="new_password" placeholder="{{ __('Введи новый пароль') }}">
                            <span class="info-tooltip" data-microtip-size="large" aria-label="{{ __('Рекомендации о пароле, количество символов и так далее') }}" data-microtip-position="right" role="tooltip">
                                <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M11 0C4.9346 0 0 4.93467 0 11.0001C0 17.0655 4.9346 22 11 22C17.0654 22 22 17.0655 22 11.0001C22 4.93467 17.0654 0 11 0ZM11 20C6.03733 20 2 15.9627 2 11.0001C2 6.03747 6.03733 2 11 2C15.9627 2 20 6.03747 20 11.0001C20 15.9627 15.9626 20 11 20Z" fill="#DCDCDC"/>
                                <path d="M11.001 4.66797C10.266 4.66797 9.66797 5.26637 9.66797 6.0019C9.66797 6.73677 10.266 7.33464 11.001 7.33464C11.7361 7.33464 12.3341 6.73677 12.3341 6.0019C12.3341 5.26637 11.7361 4.66797 11.001 4.66797Z" fill="#5A5A5A"/>
                                <path d="M11 9.33203C10.4477 9.33203 10 9.77976 10 10.332V16.332C10 16.8843 10.4477 17.332 11 17.332C11.5523 17.332 12 16.8843 12 16.332V10.332C12 9.77976 11.5523 9.33203 11 9.33203Z" fill="#5A5A5A"/>
                                </svg>
                            </span>
                        </div>
                    </div>
                    <div class="form-group @error('new_password_confirmation') form-error @enderror">
                        <label for="">{{ __('Повторите новый пароль') }}</label>
                        @error('new_password_confirmation') <span class="error-msg">{{ $message }}</span> @enderror
                        <input type="text" name="new_password_confirmation" placeholder="{{ __('Введи новый пароль еще раз') }}">
                    </div>
                    <div class="form-duo">
                        <a href="{{ route('user.profile.details') }}" class="btn-white">{{ __('Отменить') }}</a>
                        <button class="btn-black" type="submit">{{ __('Сохранить пароль') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop
