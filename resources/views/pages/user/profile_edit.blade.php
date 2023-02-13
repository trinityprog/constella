@extends('layouts.theme')

@section('title', 'Добавить адрес')

@section('content')
    <div class="profile-page">
        <div class="container">
            <div class="inner">
                <div class="heads">
                    @desktop
                    <p class="title flex item-center space-center"><img src="{{ url('i/icons/r-pen.svg') }}" alt="">{{ __('Редактирование моих данных') }}</p>
                    @enddesktop
                    @handheld
                    <p class="title flex item-center space-center">Редактирование моих данных</p>
                    @endhandheld
                </div>

                <form action="{{ route('user.profile.update') }}" method="post" class="form styled minified">
                    @csrf
                    <div class="form-group @error('surname') form-error @enderror">
                        <label for="">{{ __('Фамилия') }}</label>
                        @error('surname') <span class="error-msg">{{ $message }}</span> @enderror
                        <div class="infoed">
                            <input type="text" name="surname" placeholder="{{ __('Введи фамилию') }}" value="{{ (isset($info->surname)) ? $info->surname : old('surname') }}" required>
                            <span class="info-tooltip" data-microtip-size="large" aria-label="{{ __('Чтобы получить заказ, имя и фамилия') }}" data-microtip-position="right" role="tooltip">
                                <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M11 0C4.9346 0 0 4.93467 0 11.0001C0 17.0655 4.9346 22 11 22C17.0654 22 22 17.0655 22 11.0001C22 4.93467 17.0654 0 11 0ZM11 20C6.03733 20 2 15.9627 2 11.0001C2 6.03747 6.03733 2 11 2C15.9627 2 20 6.03747 20 11.0001C20 15.9627 15.9626 20 11 20Z" fill="#DCDCDC"/>
                                <path d="M11.001 4.66797C10.266 4.66797 9.66797 5.26637 9.66797 6.0019C9.66797 6.73677 10.266 7.33464 11.001 7.33464C11.7361 7.33464 12.3341 6.73677 12.3341 6.0019C12.3341 5.26637 11.7361 4.66797 11.001 4.66797Z" fill="#5A5A5A"/>
                                <path d="M11 9.33203C10.4477 9.33203 10 9.77976 10 10.332V16.332C10 16.8843 10.4477 17.332 11 17.332C11.5523 17.332 12 16.8843 12 16.332V10.332C12 9.77976 11.5523 9.33203 11 9.33203Z" fill="#5A5A5A"/>
                                </svg>
                            </span>
                        </div>
                    </div>
                    <div class="form-group @error('name') form-error @enderror">
                        <label for="">{{ __('Имя') }}</label>
                        @error('name') <span class="error-msg">{{ $message }}</span> @enderror
                        <div class="infoed">
                            <input type="text" name="name" placeholder="Введи имя" value="{{ auth()->user()->name }}" required>
                        </div>
                    </div>
                    <div class="form-group @error('phone') form-error @enderror">
                        <label for="">{{ __('Телефон') }}</label>
                        @error('phone') <span class="error-msg">{{ $message }}</span> @enderror
                        <input type="text" name="phone" placeholder="Введи телефон" value="{{ (isset($info->phone)) ? $info->phone : old('phone') }}" required>
                    </div>
                    <div class="form-group @error('dob') form-error @enderror">
                        <label for="">{{ __('Дата рождения') }}</label>
                        @error('dob') <span class="error-msg">{{ $message }}</span> @enderror
                        <input rel="dob" type="text" name="dob" placeholder="{{ __('Введи дату рождения') }}" value="{{ (isset($info->dob)) ? $info->formattedDob() : old('dob') }}" required>
                    </div>
                    <div class="form-group selects">
                        <input type="hidden" name="sex" value="{{ (auth()->user()->isMale()) ? 'male' : 'female' }}">
                        <a href="#"  class="{{ (!auth()->user()->isMale()) ? 'active' : '' }}" data-sex="female">{{ __('Женщина') }}</a>
                        <a href="#"  class="{{ (auth()->user()->isMale()) ? 'active' : '' }}" data-sex="male">{{ __('Мужчина') }}</a>
                    </div>

                    <div class="form-divider"></div>

                    <div class="form-group @error('iin') form-error @enderror">
                        <label for="">{{ __('ИИН:') }} <span>{{ __('необязательно') }}</span></label>
                        @error('iin') <span class="error-msg">{{ $message }}</span> @enderror
                        <div class="infoed">
                            <input type="text" name="iin" placeholder="ИИН" value="{{ (isset($info->iin)) ? $info->iin : old('iin') }}">
                            <span class="info-tooltip" data-microtip-size="large" aria-label="{{ __('Введите ИИН, если вы являетесь гражданином Республики Казахстан') }}" data-microtip-position="right" role="tooltip">
                                <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M11 0C4.9346 0 0 4.93467 0 11.0001C0 17.0655 4.9346 22 11 22C17.0654 22 22 17.0655 22 11.0001C22 4.93467 17.0654 0 11 0ZM11 20C6.03733 20 2 15.9627 2 11.0001C2 6.03747 6.03733 2 11 2C15.9627 2 20 6.03747 20 11.0001C20 15.9627 15.9626 20 11 20Z" fill="#DCDCDC"/>
                                <path d="M11.001 4.66797C10.266 4.66797 9.66797 5.26637 9.66797 6.0019C9.66797 6.73677 10.266 7.33464 11.001 7.33464C11.7361 7.33464 12.3341 6.73677 12.3341 6.0019C12.3341 5.26637 11.7361 4.66797 11.001 4.66797Z" fill="#5A5A5A"/>
                                <path d="M11 9.33203C10.4477 9.33203 10 9.77976 10 10.332V16.332C10 16.8843 10.4477 17.332 11 17.332C11.5523 17.332 12 16.8843 12 16.332V10.332C12 9.77976 11.5523 9.33203 11 9.33203Z" fill="#5A5A5A"/>
                                </svg>
                            </span>
                        </div>
                    </div>

                    <div class="form-group checkbox @error('rules_accept') form-error @enderror">
                        <label for="rules-accept-profile" class="remember wider">
                            <span>{{ __('Я соглашаюсь с') }} <a target="_blank" href="{{ route('page.info.law') }}">{{ __('Условиями Пользования Zhanna Kan Group') }}</a></span>
                            <input type="checkbox" id="rules-accept-profile" name="rules_accept"><span class="checkmark"></span>
                        </label>
                        @error('rules_accept') <br><span class="error-msg">{{ $message }}</span> @enderror
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
