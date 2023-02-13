@extends('layouts.theme')

@section('title', 'Добавить адрес')

@section('content')
    <div class="profile-page">
        <div class="container">
            <div class="inner">
                <div class="heads">
                    @desktop
                    <p class="title flex item-center space-center"><img src="{{ url('i/icons/r-location.svg') }}" alt="">{{ __('Новый адрес') }}</p>
                    @enddesktop
                    @handheld
                    <p class="title flex item-center space-center"><img src="{{ asset('i/icons/location-black.svg') }}" alt="">{!! __('Редактирование адреса') !!}</p>
                    @endhandheld
                </div>

                <form action="{{ route('user.profile.address.create') }}" method="post" class="form styled minified">
                    @csrf
                    <div class="form-duo">
                        <div class="form-group @error('country') form-error @enderror">
                            <label for="">{{ __('Страна') }}</label>
                            @error('country') <span class="error-msg">{{ $message }}</span> @enderror
                            <input type="text" name="country" placeholder="{{ __('Введи страну') }}">
                        </div>
                        <div class="form-group @error('area') form-error @enderror">
                            <label for="">{{ __('Область') }}</label>
                            @error('area') <span class="error-msg">{{ $message }}</span> @enderror
                            <input type="text" name="area" placeholder="{{ __('Введи область') }}">
                        </div>
                    </div>
                    <div class="form-duo">
                        <div class="form-group @error('city') form-error @enderror">
                            <label for="">{{ __('Город') }}</label>
                            @error('city') <span class="error-msg">{{ $message }}</span> @enderror
                            <input type="text" name="city" placeholder="{{ __('Введи город') }}">
                        </div>
                        <div class="form-group @error('index') form-error @enderror">
                            <label for="">{{ __('Индекс') }}</label>
                            @error('index') <span class="error-msg">{{ $message }}</span> @enderror
                            <input type="text" name="index" placeholder="{{ __('Введи индекс') }}">
                        </div>
                    </div>
                    <div class="form-group form-address @error('address') form-error @enderror">
                        <label for="">{{ __('Адрес') }}</label>
                        @error('address') <span class="error-msg">{{ $message }}</span> @enderror
                        <input type="text" name="address" placeholder="{{ __('Введи адрес') }}">
                    </div>
                    <div class="form-duo">
                        <div class="form-group @error('name') form-error @enderror">
                            <label for="">{{ __('Имя получателя') }}</label>
                            @error('name') <span class="error-msg">{{ $message }}</span> @enderror
                            <input type="text" name="name" placeholder="{{ __('Введи имя') }}">
                        </div>
                        <div class="form-group @error('surname') form-error @enderror">
                            <label for="">{{ __('Фамилия получателя') }}</label>
                            @error('surname') <span class="error-msg">{{ $message }}</span> @enderror
                            <input type="text" name="surname" placeholder="{{ __('Введи фамилию') }}">
                        </div>
                    </div>
                    <div class="form-duo">
                        <div class="form-group @error('title') form-error @enderror">
                            <label for="">{{ __('Название адреса или компании') }}</label>
                            @error('title') <span class="error-msg">{{ $message }}</span> @enderror
                            <input type="text" name="title" placeholder="{{ __('Введи адрес') }}">
                        </div>
                        <div class="form-group @error('phone') form-error @enderror">
                            <label for="">{{ __('Телефон получателя') }}</label>
                            @error('phone') <span class="error-msg">{{ $message }}</span> @enderror
                            <input type="text" name="phone" placeholder="{{ __('Введи телефон') }}">
                        </div>
                    </div>
                    @desktop
                    <div class="form-duo">
                        <a href="{{ route('user.profile.details') }}" class="btn-white">{{ __('Отменить') }}</a>
                        <button class="btn-black" type="submit">{{ __('Сохранить адрес') }}</button>
                    </div>
                    @enddesktop
                    @handheld
                    <div class="holder-right">
                        <a href="{{ route('user.profile.details') }}" class="btn-white">Отменить</a>
                        <button class="btn-black" type="submit">Сохранить адрес</button>
                    </div>
                    @endhandheld
                </form>
            </div>
        </div>
    </div>
@stop
