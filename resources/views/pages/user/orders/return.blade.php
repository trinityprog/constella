@extends('layouts.theme')

@section('title', 'Заявка на возврат')

@section('content')
    <div class="profile-page return">
        <div class="container">
            <div class="inner">
                <div class="heads edit">
                    <p class="title flex item-center space-center"><img src="{{ url('i/icons/r-b-return.svg') }}" alt="">{{ __('Заявка на возврат') }}</p>
                </div>

                <div class="three-blocks flex item-center space-center">
                    <div class="t-block">
                        <img src="{{ url('i/icons/b-calendar.svg') }}" alt="">
                        <p class="title">{{ __('14 календарных дней') }}</p>
                        <p class="description">{{ __('С момента получения товара') }}</p>
                    </div>
                    <div class="t-block">
                        <img src="{{ url('i/icons/b-money-back.svg') }}" alt="">
                        <p class="title">{{ __('Возврат денежных средств') }}</p>
                        <p class="description">{{ __('Осуществляется в течении 14 рабочих дней̆') }}</p>
                    </div>
                </div>

                <form action="{{ route('page.return.action') }}" method="post" class="form styled minified">
                    @csrf
                    <div class="form-group @error('order_number') form-error @enderror">
                        <label for="">{{ __('Номер заказа') }}</label>
                        @error('order_number') <span class="error-msg">{{ $message }}</span> @enderror
                        <input type="text" name="order_number" value="{{ (!empty($order)) ? $order->unique_id : '' }}" placeholder="{{ __('Введи номер заказа') }}" rel="order_number">
                    </div>

                    <div class="form-group @error('name') form-error @enderror">
                        <label for="">{{ __('ФИО') }}</label>
                        @error('name') <span class="error-msg">{{ $message }}</span> @enderror
                        <input type="text" name="name" placeholder="{{ __('Введи имя')}}">
                    </div>

                    <div class="form-group @error('phone') form-error @enderror">
                        <label for="">{{ __('Телефон') }}</label>
                        @error('phone') <span class="error-msg">{{ $message }}</span> @enderror
                        <input value="{{ (auth()->check() && !empty(auth()->user()->info->phone)) ? auth()->user()->info->phone : '' }}" type="text" name="phone" placeholder="{{ __('Телефон') }}" rel="phone">
                    </div>

                    <div class="form-group @error('reason') form-error @enderror">
                        <label for="">{{ __('Причина возврата') }}</label>
                        @error('reason') <span class="error-msg">{{ $message }}</span> @enderror
                        <input type="text" name="reason" placeholder="{{ __('Введи причину возврата') }}">
                    </div>

                    <div class="rk-law">
                        <p class="flex items-start">
                            <img src="{{ url('i/icons/i-sign.png') }}" alt="">
                            <span>
                                {{ __('В соответствии с законодательством РК, чтобы вернуть') }}
                                <a href="https://naceks.kz/" target="_blank">{{ __('Узнать подробности') }}</a>
                            </span>
                        </p>
                    </div>

                    <p class="head flex item-center space-center"><img src="{{ url('i/icons/r-simple-location.svg') }}" alt="">{{ __('Ваш адрес') }}</p>
                    <br>
                    <div class="form-duo">
                        <div class="form-group @error('city') form-error @enderror">
                            <label for="">{{ __('Город') }}</label>
                            @error('city') <span class="error-msg">{{ $message }}</span> @enderror
                            <input type="text" name="city" placeholder="{{ __('Введи город') }}">
                        </div>
                        <div class="form-group @error('address') form-error @enderror">
                            <label for="">{{ __('Адрес') }}</label>
                            @error('address') <span class="error-msg">{{ $message }}</span> @enderror
                            <input type="text" name="address" placeholder="{{ __('Введи адрес') }}">
                        </div>
                    </div>

                    <div class="form-duo">
                        <a href="{{ route('user.profile') }}" class="btn-white">{{ __('Отменить') }}</a>
                        <button class="btn-black" type="submit">
                            <svg width="14" height="18" viewBox="0 0 14 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M13 4.11111L13.3485 4.46961L13.7173 4.11111L13.3485 3.75261L13 4.11111ZM0.5 8C0.5 8.27614 0.723858 8.5 1 8.5C1.27614 8.5 1.5 8.27614 1.5 8L0.5 8ZM10.1485 7.58072L13.3485 4.46961L12.6515 3.75261L9.45146 6.86372L10.1485 7.58072ZM13.3485 3.75261L10.1485 0.641502L9.45146 1.3585L12.6515 4.46961L13.3485 3.75261ZM13 3.61111L4.88889 3.61111L4.88889 4.61111L13 4.61111L13 3.61111ZM4.88889 3.61111C2.46497 3.61111 0.5 5.57608 0.5 8L1.5 8C1.5 6.12837 3.01726 4.61111 4.88889 4.61111L4.88889 3.61111Z" fill="white"/>
                                <path d="M1 13.8889L0.651461 13.5304L0.282721 13.8889L0.651461 14.2474L1 13.8889ZM13.5 10C13.5 9.72386 13.2761 9.5 13 9.5C12.7239 9.5 12.5 9.72386 12.5 10L13.5 10ZM3.85146 10.4193L0.651461 13.5304L1.34854 14.2474L4.54854 11.1363L3.85146 10.4193ZM0.651461 14.2474L3.85146 17.3585L4.54854 16.6415L1.34854 13.5304L0.651461 14.2474ZM1 14.3889L9.11111 14.3889L9.11111 13.3889L1 13.3889L1 14.3889ZM9.11111 14.3889C11.535 14.3889 13.5 12.4239 13.5 10L12.5 10C12.5 11.8716 10.9827 13.3889 9.11111 13.3889L9.11111 14.3889Z" fill="white"/>
                            </svg>
                            {{ __('Оформить возврат') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop
