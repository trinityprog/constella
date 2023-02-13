@extends('layouts.theme')

@section('title', 'Изменить адрес')

@section('content')
    <div class="profile-page">
        <div class="container">
            <div class="inner">
                <div class="heads edit">
                    <p class="title flex item-center">
                        @desktop
                        <img src="{{ url('i/icons/r-location.svg') }}" alt="">
                        @enddesktop
                        {{ __('Редактирование адреса') }}
                    </p>
                    @desktop
                    <div class="dropdown">
                        <a href="#" class="btn flex item-center space-center relative">
                            <svg width="9" height="9" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M6.00015 4.58926L1.7027 0.291588C1.31394 -0.0971957 0.682504 -0.0971957 0.292501 0.291588C-0.0975011 0.681611 -0.0975011 1.31308 0.292501 1.7031L4.58996 6.00077L0.292502 10.2972C-0.0975006 10.6872 -0.0975006 11.3187 0.292502 11.7075C0.682504 12.0975 1.31394 12.0975 1.7027 11.7075L6.00015 7.40981L10.2976 11.7075C10.6876 12.0975 11.3178 12.0975 11.7078 11.7075C11.9034 11.5131 12 11.258 12 11.003C12 10.7479 11.9034 10.4928 11.7078 10.2972L7.41159 6.00077L11.7078 1.7031C11.9034 1.50871 12 1.25241 12 0.997343C12 0.742281 11.9034 0.487218 11.7078 0.291587C11.3178 -0.0971961 10.6876 -0.0971961 10.2976 0.291587L6.00015 4.58926Z" fill="#272727"/>
                            </svg>
                            {{ __('Удалить') }}
                        </a>
                        <div class="droppable right delete-one">
                            <p>{{ __('Удалить адрес?') }}</p>
                            <div class="two-drop-buttons flex item-center">
                                <a href="#" class="btn-white tdb-close">{{ __('Отменить') }}</a>
                                <a href="#" class="btn-black flex item-center" data-delete="{{ $address->id }}">{{ __('Удалить') }}
                                    <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M6.00015 4.58926L1.7027 0.291588C1.31394 -0.0971957 0.682504 -0.0971957 0.292501 0.291588C-0.0975011 0.681611 -0.0975011 1.31308 0.292501 1.7031L4.58996 6.00077L0.292502 10.2972C-0.0975006 10.6872 -0.0975006 11.3187 0.292502 11.7075C0.682504 12.0975 1.31394 12.0975 1.7027 11.7075L6.00015 7.40981L10.2976 11.7075C10.6876 12.0975 11.3178 12.0975 11.7078 11.7075C11.9034 11.5131 12 11.258 12 11.003C12 10.7479 11.9034 10.4928 11.7078 10.2972L7.41159 6.00077L11.7078 1.7031C11.9034 1.50871 12 1.25241 12 0.997343C12 0.742281 11.9034 0.487218 11.7078 0.291587C11.3178 -0.0971961 10.6876 -0.0971961 10.2976 0.291587L6.00015 4.58926Z" fill="#fff"/>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                    @enddesktop
                </div>

                <form action="{{ url()->current() }}" method="post" class="form styled minified">
                    @method('put')
                    @csrf
                    <div class="form-duo">
                        <div class="form-group @error('country') form-error @enderror">
                            <label for="">{{ __('Страна') }}</label>
                            @error('country') <span class="error-msg">{{ $message }}</span> @enderror
                            <input type="text" name="country" placeholder="{{ __('Введи страну') }}" value="{{ $address->country }}">
                        </div>
                        <div class="form-group @error('area') form-error @enderror">
                            <label for="">{{ __('Область') }}</label>
                            @error('area') <span class="error-msg">{{ $message }}</span> @enderror
                            <input type="text" name="area" placeholder="{{ __('Введи область') }}" value="{{ $address->area }}">
                        </div>
                    </div>
                    <div class="form-duo">
                        <div class="form-group @error('city') form-error @enderror">
                            <label for="">{{ __('Город') }}</label>
                            @error('city') <span class="error-msg">{{ $message }}</span> @enderror
                            <input type="text" name="city" placeholder="{{ __('Введи город') }}" value="{{ $address->city }}">
                        </div>
                        <div class="form-group @error('index') form-error @enderror">
                            <label for="">{{ __('Индекс') }}</label>
                            @error('index') <span class="error-msg">{{ $message }}</span> @enderror
                            <input type="text" name="index" placeholder="{{ __('Введи индекс') }}" value="{{ $address->index }}">
                        </div>
                    </div>
                    <div class="form-group @error('address') form-error @enderror">
                        <label for="">{{ __('Адрес') }}</label>
                        @error('address') <span class="error-msg">{{ $message }}</span> @enderror
                        <input type="text" name="address" placeholder="{{ __('Введи адрес') }}" value="{{ $address->address }}">
                    </div>
                    <div class="form-duo">
                        <div class="form-group @error('name') form-error @enderror">
                            <label for="">{{ __('Имя получателя') }}</label>
                            @error('name') <span class="error-msg">{{ $message }}</span> @enderror
                            <input type="text" name="name" placeholder="{{ __('Введи имя') }}" value="{{ $address->name }}">
                        </div>
                        <div class="form-group @error('surname') form-error @enderror">
                            <label for="">{{ __('Фамилия получателя') }}</label>
                            @error('surname') <span class="error-msg">{{ $message }}</span> @enderror
                            <input type="text" name="surname" placeholder="{{ __('Введи фамилию') }}" value="{{ $address->surname }}">
                        </div>
                    </div>
                    <div class="form-duo">
                        <div class="form-group @error('title') form-error @enderror">
                            <label for="">{{ __('Название адреса или компании') }}</label>
                            @error('title') <span class="error-msg">{{ $message }}</span> @enderror
                            <input type="text" name="title" placeholder="{{ __('Введи адрес') }}" value="{{ $address->title }}">
                        </div>
                        <div class="form-group @error('phone') form-error @enderror">
                            <label for="">{{ __('Телефон получателя') }}</label>
                            @error('phone') <span class="error-msg">{{ $message }}</span> @enderror
                            <input type="text" name="phone" placeholder="{{ __('Введи телефон') }}" value="{{ $address->phone }}">
                        </div>
                    </div>
                    <div class="form-duo">
                        <a href="{{ route('user.profile.details') }}" class="btn-white">{{ __('Отменить') }}</a>
                        <button class="btn-black" type="submit">{{ __('Сохранить адрес') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop
