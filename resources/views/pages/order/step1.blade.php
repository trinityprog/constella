@inject('cart', 'Gloudemans\Shoppingcart\Facades\Cart')
@inject('pinfo', 'App\Models\Product')

@extends('layouts.theme')

@section('title', 'Главная страница')

@section('content')
{{--    @desktop--}}
        <section class="order-page cart-page">
            <div class="container">
                <div class="order-page-contact">
                    <form action="{{ route('order.create') }}" class="form styled" method="post">
                        @csrf
                        <div class="cart-holder pt-0 flex items-start space-between">
                            <div class="holder-left">
                                @include('partials.order_steps')
                                <div class="flex">
                                    <div class="order-page-form__item">
                                        <div class="contacts">
                                            <div class="dropdown sorting">
                                                <a href="#" class="element link flex">КОНТАКТЫ <img src="{{ url('i/icons/arrow-down-sort.svg') }}" class="img" alt=""></a>
                                            </div>
                                        </div>
                                        <h3 class="order-page-form__title">
                                            {{ __('Ваши контакты') }}
                                        </h3>
                                        <div class="form-group">
                                            <label class="order-page-form__template">Email</label>
                                            <input value="{{ (auth()->check()) ? auth()->user()->email : Cookie::get('guest_email') }}" name="order_user_email" type="email" class="" placeholder="myemail@mail.com">
                                            @error('order_user_email') <span class="error-msg">{{ $message }}</span> @enderror
                                        </div>
                                        <div class="form-group">
                                            <label class="infoed trans">{{ __('Имя') }}</label>
                                            <input value="{{ auth()->check() ? auth()->user()->name : '' }}" name="order_user_name" type="text" class="" placeholder="{{ __('Ваше имя') }}">
                                            @error('order_user_name') <span class="error-msg">{{ $message }}</span> @enderror
                                        </div>
                                        <div class="form-group">
                                            <label>{{ __('Телефон') }}</label>
                                            <input value="{{ (auth()->check() && !empty(auth()->user()->info->phone)) ? auth()->user()->info->phone : '' }}" name="order_user_phone" type="tel" placeholder="{{ __('Телефон') }}" class="">
                                            @error('order_user_phone') <span class="error-msg">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                    <div class="order-page-form__item another">
                                        <h3 class="order-page-form__title">
                                            {{ __('Информация о получателе') }}
                                        </h3>
                                        <p class="order-page-form__text">
                                            {{ __('Вы можете указать себя как получателя') }}
                                        </p>
                                        <div class="order-page-form__dropdown dropdown-list">
                                            <p class="title">{!! __('Получатель другой человек') !!}</p>
                                            <img src="{{ asset('i/icons/step-plus.svg') }}" alt="">
                                        </div>
                                        @handheld
                                        <div class="order-page-form__slide slidedown-element">
                                        @elsehandheld
                                            <div class="order-page-form__slide">
                                        @endhandheld
{{--                                        <div class="order-page-form__slide slidedown-element">--}}
                                            <div class="form-group @error('order_recipient_fio') form-error @enderror">
                                                <label class="infoed trans">
                                                    {{ __('ФИО') }} <a class="info-tooltip" data-microtip-size="large" aria-label="Введите корректные данные" data-microtip-position="right" role="tooltip"><img src="{{ url('i/icons/info.svg') }}" alt=""></a>
                                                </label>
                                                @error('order_recipient_fio') <span class="error-msg">{{ $message }}</span> @enderror
                                                <input value="{{ old('order_recipient_fio') }}" name="order_recipient_fio" type="text" class="" placeholder="{{ __('Фамилия Имя Отчество') }}">
                                            </div>
                                            <div class="form-group @error('order_recipient_phone') form-error @enderror">
                                                <label>{{ __('Телефон') }}</label>
                                                @error('order_recipient_phone') <span class="error-msg">{{ $message }}</span> @enderror
                                                <input value="{{ old('order_recipient_phone') }}" name="order_recipient_phone" type="tel" placeholder="{{ __('Телефон') }}" class="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="holder-right">
                                <div class="holder-title">
                                    <p class="cart-total"><span class="cart-items-count {{ ($cart::count() == 0) ? 'none' : '' }}">{{ $cart::count() }}</span> {{ \App\Http\Controllers\Api\CDEKController::true_wordform($cart::count(), 'товар', 'товара', 'товаров') }}</p>
                                </div>
                                <div class="cart-slide">
                                    <div class="cart-full-price">
                                        <p>{{ __('Итого к оплате:') }} <span class="cart_total">{{ \App\Services\CartService::getTotal(true, session('promocode')) }}</span></p>
                                    </div>
    {{--                                <x-promocode :order-promocode="$order->promocode->code ?? null"/>--}}
                                    <x-promocode/>
                                    <button type="submit" class="btn-black {{ $cart::count() == 0 ? 'disabled' : '' }}">{{ __('Оформить заказ') }}</button>
                                    <a href="{{ route('user.profile.orders') }}"
                                       class="save-order-for-later flex item-center space-center {{ $cart::count() == 0 ? 'disabled' : '' }}">
                                        <svg width="15" height="16" viewBox="0 0 15 16" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M10.5202 1.59163C9.98937 1.59163 9.48028 1.8025 9.10493 2.17785L2.97826 8.30452C2.35273 8.93006 2.0013 9.77847 2.0013 10.6631C2.0013 11.5478 2.35273 12.3962 2.97826 13.0217C3.6038 13.6473 4.45222 13.9987 5.33686 13.9987C6.22151 13.9987 7.06992 13.6473 7.69546 13.0217L13.8221 6.89505C14.0825 6.6347 14.5046 6.6347 14.7649 6.89505C15.0253 7.1554 15.0253 7.57751 14.7649 7.83786L8.63826 13.9645C7.76268 14.8401 6.57513 15.332 5.33686 15.332C4.09859 15.332 2.91104 14.8401 2.03546 13.9645C1.15987 13.0889 0.667969 11.9014 0.667969 10.6631C0.667969 9.42485 1.15987 8.2373 2.03546 7.36171L8.16212 1.23505C8.78752 0.609646 9.63575 0.258301 10.5202 0.258301C11.4046 0.258301 12.2529 0.609646 12.8783 1.23505C13.5037 1.86045 13.855 2.70867 13.855 3.59312C13.855 4.47756 13.5037 5.32579 12.8783 5.95119L6.74493 12.0779C6.36972 12.4531 5.86082 12.6639 5.33019 12.6639C4.79956 12.6639 4.29067 12.4531 3.91546 12.0779C3.54024 11.7026 3.32945 11.1937 3.32945 10.6631C3.32945 10.1325 3.54024 9.62359 3.91546 9.24838L9.57573 3.59477C9.83624 3.33457 10.2583 3.33482 10.5185 3.59532C10.7787 3.85583 10.7785 4.27794 10.518 4.53813L4.85826 10.1912C4.73328 10.3163 4.66279 10.4862 4.66279 10.6631C4.66279 10.8401 4.7331 11.0099 4.85826 11.135C4.98343 11.2602 5.15319 11.3305 5.33019 11.3305C5.5072 11.3305 5.67696 11.2602 5.80212 11.135L11.9355 5.00838C12.3106 4.63305 12.5217 4.12382 12.5217 3.59312C12.5217 3.06229 12.3108 2.55321 11.9355 2.17785C11.5601 1.8025 11.051 1.59163 10.5202 1.59163Z" fill="#B4ADB8"/></svg>
                                        {{ __('Сохранить и продолжить позже') }}
                                    </a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                @include('partials.user_support', ['withLoyalty' => true])
            </div>
        </section>
{{--    @enddesktop--}}
{{--    @handheld--}}
{{--        @include('mobile.step1_mobile')--}}
{{--    @endhandheld--}}
@stop

