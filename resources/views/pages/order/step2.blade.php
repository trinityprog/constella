@inject('cart', 'Gloudemans\Shoppingcart\Facades\Cart')
@inject('pinfo', 'App\Models\Product')

@extends('layouts.theme')

@section('title', 'Информация о доставке')

@section('content')
    <section class="cart-page order-page">
        <div class="container">
            <div class="order-page-contact">
                <form action="{{ route('order.delivery', $order->id) }}" class="form styled" method="post">
                    @csrf
                    <div class="cart-holder pt-0 flex items-start space-between">
                        <div class="holder-left w-70">
                            @desktop
                            @include('partials.order_steps')
                            @enddesktop
                            <div class="flex">
                                <div class="order-page-form__item delivery-infos wider">
                                    <h3 class="order-page-form__title">
                                        {{ __('Адрес доставки') }}
                                    </h3>
                                    <div class="contacts">
                                        <div class="dropdown sorting">
                                            <a href="#" class="element link flex">{!! __('ДОСТАВКА') !!} <img src="{{ url('i/icons/arrow-down-sort.svg') }}" class="img" alt=""></a>
                                        </div>
                                    </div>
                                    <div class="my-addresses data-adresses">
                                        @if(auth()->user()->addresses()->exists())
                                            <input type="hidden" name="address_id"
                                                   value="{{ isset($order) ? $order->info->delivery_address_id : '' }}">
                                            <p class="my-addresses-title">{{ __('Мои адреса') }}</p>
                                            <p class="my-addresses-title-mob">{{ __('Адрес доставки') }}</p>
                                            <div class="addresses-list flex item-center wrap">
                                                @foreach(auth()->user()->addresses as $address)
                                                    <a href="#"
                                                       class="{{ (isset($order) && $address->id == $order->info->delivery_address_id) ? 'active' : '' }}"
                                                       data-order-id="{{ $order->id }}"
                                                       data-address-id="{{ $address->id }}">{{ $address->title }}</a>
                                                @endforeach
                                            </div>
                                            <a href="{{ route('user.profile.address') }}"
                                               class="add-location flex item-center">
                                                <img src="{{ url('i/icons/plus.svg') }}" alt="">
                                                {{ __('Новый адрес') }}
                                            </a>
                                            <a href="{{ route('user.profile.address') }}" class="add-location-mob">
                                                <p>{{ __('Новый адрес') }}</p>
                                                <img src="{{ asset('i/icons/step-plus.svg') }}" alt="">
                                            </a>
                                        @else
{{--                                            <form action="{{ route('user.profile.address.create') }}" method="post"--}}
{{--                                                  class="form styled minified">--}}
{{--                                                @csrf--}}
{{--                                                <div class="form-duo">--}}
{{--                                                    <div class="form-group @error('country') form-error @enderror">--}}
{{--                                                        <label for="">{{ __('Страна') }}</label>--}}
{{--                                                        @error('country') <span--}}
{{--                                                            class="error-msg">{{ $message }}</span> @enderror--}}
{{--                                                        <input type="text" name="country" placeholder="Введи страну">--}}
{{--                                                    </div>--}}
{{--                                                    <div class="form-group @error('area') form-error @enderror">--}}
{{--                                                        <label for="">{{ __('Область') }}</label>--}}
{{--                                                        @error('area') <span--}}
{{--                                                            class="error-msg">{{ $message }}</span> @enderror--}}
{{--                                                        <input type="text" name="area" placeholder="Введи область">--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                                <div class="form-duo">--}}
{{--                                                    <div class="form-group @error('city') form-error @enderror">--}}
{{--                                                        <label for="">{{ __('Город') }}</label>--}}
{{--                                                        @error('city') <span--}}
{{--                                                            class="error-msg">{{ $message }}</span> @enderror--}}
{{--                                                        <input type="text" name="city" placeholder="Введи город">--}}
{{--                                                    </div>--}}
{{--                                                    <div class="form-group @error('index') form-error @enderror">--}}
{{--                                                        <label for="">{{ __('Индекс') }}</label>--}}
{{--                                                        @error('index') <span--}}
{{--                                                            class="error-msg">{{ $message }}</span> @enderror--}}
{{--                                                        <input type="text" name="index" placeholder="Введи индекс">--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                                <div class="form-duo">--}}
{{--                                                    <div class="form-group @error('address') form-error @enderror">--}}
{{--                                                        <label for="">{{ __('Адрес') }}</label>--}}
{{--                                                        @error('address') <span--}}
{{--                                                            class="error-msg">{{ $message }}</span> @enderror--}}
{{--                                                        <input type="text" name="address" placeholder="Введи адрес">--}}
{{--                                                    </div>--}}
{{--                                                    <div class="form-group @error('phone') form-error @enderror">--}}
{{--                                                        <label for="">{{ __('Телефон получателя') }}</label>--}}
{{--                                                        @error('phone') <span--}}
{{--                                                            class="error-msg">{{ $message }}</span> @enderror--}}
{{--                                                        <input type="text" name="phone" placeholder="Введи телефон">--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                                <div class="form-group @error('title') form-error @enderror">--}}
{{--                                                    <label for="">{{ __('Название адреса или компании') }}</label>--}}
{{--                                                    @error('title') <span--}}
{{--                                                        class="error-msg">{{ $message }}</span> @enderror--}}
{{--                                                    <input type="text" name="title" placeholder="Введи адрес">--}}
{{--                                                </div>--}}
{{--                                            </form>--}}
                                            <a href="{{ route('user.profile.address') }}"
                                               class="add-location flex item-center"><img
                                                    src="{{ url('i/icons/plus.svg') }}" alt="">{{ __('Новый адрес') }}</a>
                                        @endif
                                    </div>
                                    @error('address_id') <span class="error-msg" style="margin-top: 2rem;">{{ $message }}</span> @enderror
                                </div>
                                <div class="order-page-form__item another wider">
                                    <h3 class="order-page-form__title">
                                        {{ __('Упаковка изделий') }}
                                    </h3>
                                    <p class="my-addresses-title-mob">{{ __('Упаковка изделий') }}</p>
                                    <br>
                                    <div class="coverup-list">
                                        <input type="hidden" name="coverup"
                                               value="{{ isset($order) ? $order->info->package_type : 'unique_branded' }}">
                                        <div
                                            class="coverup-item {{ (isset($order) && $order->info->package_type == 'unique_branded') ? 'active' : '' }}"
                                            data-type="unique_branded">
                                            <svg width="16" height="14" viewBox="0 0 8 6" fill="none"
                                                 xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                      d="M7.7805 0.151861C8.04316 0.379477 8.07454 0.780408 7.85058 1.04736L3.95777 5.68766C3.6512 6.05311 3.11452 6.10515 2.74548 5.80522L0.234689 3.7646C-0.0348929 3.5455 -0.0786741 3.14577 0.136901 2.87178C0.352475 2.59779 0.745772 2.55329 1.01535 2.77239L3.24235 4.58236L6.8994 0.223094C7.12335 -0.0438632 7.51783 -0.0757555 7.7805 0.151861Z"
                                                      fill="#272727"/>
                                            </svg>
                                            <p>
                                                {{ __('Изделия в подарочной упаковке бренда') }}
                                                <x-price :price="5000" />
                                            </p>
                                        </div>
                                        <div
                                            class="coverup-item {{ (isset($order) && $order->info->package_type == 'standartly_branded') ? 'active' : '' }}"
                                            data-type="standartly_branded">
                                            <svg width="16" height="14" viewBox="0 0 8 6" fill="none"
                                                 xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                      d="M7.7805 0.151861C8.04316 0.379477 8.07454 0.780408 7.85058 1.04736L3.95777 5.68766C3.6512 6.05311 3.11452 6.10515 2.74548 5.80522L0.234689 3.7646C-0.0348929 3.5455 -0.0786741 3.14577 0.136901 2.87178C0.352475 2.59779 0.745772 2.55329 1.01535 2.77239L3.24235 4.58236L6.8994 0.223094C7.12335 -0.0438632 7.51783 -0.0757555 7.7805 0.151861Z"
                                                      fill="#272727"/>
                                            </svg>
                                            <p>
                                                {{ __('Стандартная упаковка') }}
                                                <span>{{ __('Входит в стоимость') }}</span>
                                            </p>
                                        </div>
                                        @error('coverup') <br><span class="error-msg">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                            </div>

                            @handheld
                            <div class="delivery-mob">
                                <div class="delivery-mob__courier">
                                    <div class="dropdown-list">
                                        <div data-link-tab="courierdelivery" class="d-type {{ (isset($order) && $order->info->delivery_type == 'courier') ? 'active' : '' }}">
                                            {{ __('Курьерская доставка') }}
                                            <div>
                                                <img src="{{ asset('i/icons/arrow-down.svg') }}" alt="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="slidedown-element">
                                        <div
                                            class="tab-content courier-delivery {{ (isset($order) && $order->info->delivery_type == 'courier') ? 'active' : '' }}"
                                            data-tab="courierdelivery">

                                            <div class="courier-delivery-time">
                                                <div class="courier-delivery-info">
                                                    <input id="almaty_c" type="radio" class="checkbox" name="delivery_country" value="almaty">
                                                    <label for="almaty_c">Алматы (внутри города):</label>
                                                    <x-price price="2500" />
                                                </div>
                                            </div>
                                            <div class="courier-delivery-time">
                                                <div class="courier-delivery-info">
                                                    <input id="shymkent_c" type="radio" class="checkbox" name="delivery_country" value="shymkent">
                                                    <label for="shymkent_c">Шымкент (внутри города):</label>
                                                    <x-price price="2500" />
                                                </div>
                                            </div>
                                            <div class="courier-delivery-time">
                                                <div class="courier-delivery-info">
                                                    <input id="nursultan_c" type="radio" class="checkbox" name="delivery_country" value="nursultan">
                                                    <label for="nursultan_c">Нур-султан (внутри города):</label>
                                                    <x-price price="2500" />
                                                </div>
                                            </div>
                                            <div class="courier-delivery-time">
                                                <div class="courier-delivery-info">
                                                    <input id="kz_c" type="radio" class="checkbox" name="delivery_country" value="kazakhstan">
                                                    <label for="kz_c">По Казахстану:</label>
                                                    <x-price price="7000" />
                                                </div>
                                            </div>
                                            <div class="courier-delivery-time">
                                                <div class="courier-delivery-info">
                                                    <input id="rus_c" type="radio" name="delivery_country" value="russia">
                                                    <label for="rus_c">Москва, Питер и соседние города:</label>
                                                    <x-price price="14000" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="delivery-mob__selfpickup">
                                    <div class="dropdown-list">
                                        <div data-link-tab="courierdelivery" class="d-type {{ (isset($order) && $order->info->delivery_type == 'courier') ? 'active' : '' }}">
                                            {{ __('Самовызов') }}
                                            <div>
                                                <img src="{{ asset('i/icons/arrow-down.svg') }}" alt="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="slidedown-element">
                                        <div
                                            class="tab-content {{ (!$order->info->delivery_type) ? 'active' : '' }} {{ (isset($order) && $order->info->delivery_type == 'selfpickup') ? 'active' : '' }}"
                                            data-tab="byyourself">

                                            <div class="delivery-cities">
                                                <div class="delivery-city">
                                                    <p class="city">
                                                    <span>
                                                        {{ __('Алматы') }}
                                                    </span>
                                                    </p>

                                                    <div class="form-group checkbox">
                                                        <label for="esentai" class="remember wider">
                                                        <span>
                                                            <b>ТЦ Esentai Mall</b><br>
                                                            {{ __('Аль-Фараби проспект, 77/8') }} <br>
                                                            <small>{{ __('Готово к самовывозу с 12-ого марта') }}</small>
                                                            <a href="#2g"><img src="{{ url('i/icons/2gis.png') }}"
                                                                               alt=""></a>
                                                        </span>
                                                            <input type="checkbox"
                                                                   {{ (isset($order) && $order->info->delivery_pickup === 'almaty-esentai') ? 'checked' : '' }} id="esentai"
                                                                   value="almaty-esentai" name="citychosen"><span
                                                                class="checkmark"></span>
                                                        </label>
                                                    </div>

                                                    <div class="form-group checkbox">
                                                        <label for="rixos-ata" class="remember wider">
                                                        <span>
                                                            <b>Rixos Almaty</b> <br>
                                                            {{ __('Сейфуллина проспект, 506/99') }} <br>
                                                            <small>{{ __('Готово к самовывозу с 12-ого марта') }}</small>
                                                            <a href="#2g"><img src="{{ url('i/icons/2gis.png') }}"
                                                                               alt=""></a>
                                                        </span>
                                                            <input type="checkbox"
                                                                   {{ (isset($order) && $order->info->delivery_pickup === 'rixos-almaty') ? 'checked' : '' }} id="rixos-ata"
                                                                   value="rixos-almaty" name="citychosen"><span
                                                                class="checkmark"></span>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="delivery-city">
                                                    <p class="city">
                                                    <span>
                                                        {{ __('Нур-султан') }}
                                                    </span>
                                                    </p>

                                                    <div class="form-group checkbox">
                                                        <label for="talan-nursultan" class="remember wider">
                                                        <span>
                                                            <b>Talan Gallery</b> <br>
                                                            {{ __('Достык, 16') }} <br>
                                                            <small>{{ __('Готово к самовывозу с 12-ого марта') }}</small>
                                                            <a href="#2g"><img src="{{ url('i/icons/2gis.png') }}"
                                                                               alt=""></a>
                                                        </span>
                                                            <input type="checkbox"
                                                                   {{ (isset($order) && $order->info->delivery_pickup === 'nursultan-talan') ? 'checked' : '' }} id="talan-nursultan"
                                                                   value="nursultan-talan" name="citychosen"><span
                                                                class="checkmark"></span>
                                                        </label>
                                                    </div>
                                                </div>

                                                <div class="delivery-city">
                                                    <p class="city">
                                                    <span>
                                                        {{ __('Шымкент') }}
                                                    </span>
                                                    </p>

                                                    <div class="form-group checkbox">
                                                        <label for="rixos-shym" class="remember wider">
                                                        <span>
                                                            <b>Rixos Khadisha Shymkent</b> <br>
                                                            {{ __('Желтоксан, 17') }} <br>
                                                            <small>{{ __('Готово к самовывозу с 12-ого марта') }}</small>
                                                            <a href="#2g"><img src="{{ url('i/icons/2gis.png') }}"
                                                                               alt=""></a>
                                                        </span>
                                                            <input type="checkbox"
                                                                   {{ (isset($order) && $order->info->delivery_pickup === 'shymkent-rixos') ? 'checked' : '' }} id="rixos-shym"
                                                                   value="shymkent-rixos" name="citychosen"><span
                                                                class="checkmark"></span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endhandheld


                            <div class="order-delivery-types tabos">
                                <div class="tabs-header">
                                    <a href="#" data-link-tab="courierdelivery"
                                       class="d-type {{ (isset($order) && $order->info->delivery_type == 'courier') ? 'active' : '' }}">{{ __('Курьерская доставка') }}</a>
                                    <a href="#" data-link-tab="byyourself"
                                       class="d-type {{ (!$order->info->delivery_type) ? 'active' : '' }}{{ (isset($order) && $order->info->delivery_type == 'selfpickup') ? 'active' : '' }}">{{ __('Самовызов') }}</a>
                                </div>
                                @if($errors->has('delivery_country') && $errors->has('citychosen'))
                                    <span class="error-msg" style="margin-top: 2rem;">{{ $errors->get('delivery_country')[0] }}</span>
                                @else
                                    @error('delivery_country') <span class="error-msg" style="margin-top: 2rem;">{{ $message }}</span> @enderror
                                    @error('citychosen') <span class="error-msg" style="margin-top: 2rem;">{{ $message }}</span> @enderror
                                @endif

                                <div class="tabs-content">
                                    <div
                                        class="tab-content {{ (!$order->info->delivery_type) ? 'active' : '' }} {{ (isset($order) && $order->info->delivery_type == 'selfpickup') ? 'active' : '' }}"
                                        data-tab="byyourself">
                                        <h3 class="order-page-form__title">
                                            {{ __('Выберите пункт самовывоза') }}
                                            <span>{{ __('Бесплатно') }}</span>
                                        </h3>

                                        <div class="delivery-cities">
                                            <div class="delivery-city">
                                                <p class="city">
                                                    <span>
                                                        {{ __('Алматы') }}
                                                    </span>
                                                </p>

                                                <div class="form-group checkbox">
                                                    <label for="esentai" class="remember wider">
                                                        <span>
                                                            <b>ТЦ Esentai Mall</b><br>
                                                            {{ __('Аль-Фараби проспект, 77/8') }} <br>
                                                            <small>{{ __('Готово к самовывозу с 12-ого марта') }}</small>
                                                            <a href="#2g"><img src="{{ url('i/icons/2gis.png') }}"
                                                                               alt=""></a>
                                                        </span>
                                                        <input type="checkbox"
                                                               {{ (isset($order) && $order->info->delivery_pickup === 'almaty-esentai') ? 'checked' : '' }} id="esentai"
                                                               value="almaty-esentai" name="citychosen"><span
                                                            class="checkmark"></span>
                                                    </label>
                                                </div>

                                                <div class="form-group checkbox">
                                                    <label for="rixos-ata" class="remember wider">
                                                        <span>
                                                            <b>Rixos Almaty</b> <br>
                                                            {{ __('Сейфуллина проспект, 506/99') }} <br>
                                                            <small>{{ __('Готово к самовывозу с 12-ого марта') }}</small>
                                                            <a href="#2g"><img src="{{ url('i/icons/2gis.png') }}"
                                                                               alt=""></a>
                                                        </span>
                                                        <input type="checkbox"
                                                               {{ (isset($order) && $order->info->delivery_pickup === 'rixos-almaty') ? 'checked' : '' }} id="rixos-ata"
                                                               value="rixos-almaty" name="citychosen"><span
                                                            class="checkmark"></span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="delivery-city">
                                                <p class="city">
                                                    <span>
                                                        {{ __('Нур-султан') }}
                                                    </span>
                                                </p>

                                                <div class="form-group checkbox">
                                                    <label for="talan-nursultan" class="remember wider">
                                                        <span>
                                                            <b>Talan Gallery</b> <br>
                                                            {{ __('Достык, 16') }} <br>
                                                            <small>{{ __('Готово к самовывозу с 12-ого марта') }}</small>
                                                            <a href="#2g"><img src="{{ url('i/icons/2gis.png') }}"
                                                                               alt=""></a>
                                                        </span>
                                                        <input type="checkbox"
                                                               {{ (isset($order) && $order->info->delivery_pickup === 'nursultan-talan') ? 'checked' : '' }} id="talan-nursultan"
                                                               value="nursultan-talan" name="citychosen"><span
                                                            class="checkmark"></span>
                                                    </label>
                                                </div>
                                            </div>

                                            <div class="delivery-city">
                                                <p class="city">
                                                    <span>
                                                        {{ __('Шымкент') }}
                                                    </span>
                                                </p>

                                                <div class="form-group checkbox">
                                                    <label for="rixos-shym" class="remember wider">
                                                        <span>
                                                            <b>Rixos Khadisha Shymkent</b> <br>
                                                            {{ __('Желтоксан, 17') }} <br>
                                                            <small>{{ __('Готово к самовывозу с 12-ого марта') }}</small>
                                                            <a href="#2g"><img src="{{ url('i/icons/2gis.png') }}"
                                                                               alt=""></a>
                                                        </span>
                                                        <input type="checkbox"
                                                               {{ (isset($order) && $order->info->delivery_pickup === 'shymkent-rixos') ? 'checked' : '' }} id="rixos-shym"
                                                               value="shymkent-rixos" name="citychosen"><span
                                                            class="checkmark"></span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div
                                        class="tab-content courier-delivery {{ (isset($order) && $order->info->delivery_type == 'courier') ? 'active' : '' }}"
                                        data-tab="courierdelivery">

                                        <p class="courier-delivery-time">
                                            <input id="almaty_c" type="radio" class="checkbox" name="delivery_country" value="almaty">
                                            <label for="almaty_c">Алматы (внутри города): <x-price price="2500" /></label>
                                        </p>
                                        <p class="courier-delivery-time">
                                            <input id="shymkent_c" type="radio" class="checkbox" name="delivery_country" value="shymkent">
                                            <label for="shymkent_c">Шымкент (внутри города): <x-price price="2500" /></label>
                                        </p>
                                        <p class="courier-delivery-time">
                                            <input id="nursultan_c" type="radio" class="checkbox" name="delivery_country" value="nursultan">
                                            <label for="nursultan_c">Нур-султан (внутри города): <x-price price="2500" /></label>
                                        </p>
                                        <p class="courier-delivery-time">
                                            <input id="kz_c" type="radio" class="checkbox" name="delivery_country" value="kazakhstan">
                                            <label for="kz_c">По Казахстану: <x-price price="7000" /></label>
                                        </p>
                                        <p class="courier-delivery-time">
                                            <input id="rus_c" type="radio" name="delivery_country" value="russia">
                                            <label for="rus_c">Москва, Питер и соседние города: <x-price price="14000" /></label>
                                        </p>



                                        {{--                                        <p class="courier-delivery-time choose-address-to" style="{{ !empty($order->info->delivery_price) ? 'display:none' : '' }}">--}}
                                        {{--                                            {{ __('Выберите адрес для расчета доставки') }}--}}
                                        {{--                                        </p>--}}

                                        {{--                                        <div class="choose-address-chosen" style="{{ !empty($order->info->delivery_price) ? 'display:block' : '' }}">--}}
                                        {{--                                            <p class="courier-delivery-time">--}}
                                        {{--                                                {{ __('Предполагаемый срок доставки') }}--}}
                                        {{--                                                <b class="datetime">{{ $order->info->delivery_days }} {{ \App\Http\Controllers\Api\CDEKController::true_wordform($order->info->delivery_days, 'день', 'дня', 'дней') }}</b>--}}
                                        {{--                                            </p>--}}
                                        {{--                                            <p class="price flex item-center">--}}
                                        {{--                                                <svg width="8" height="8" viewBox="0 0 8 8" fill="none"--}}
                                        {{--                                                     xmlns="http://www.w3.org/2000/svg">--}}
                                        {{--                                                    <circle cx="4" cy="4" r="4" fill="#2E3338"/>--}}
                                        {{--                                                </svg>--}}
                                        {{--                                            </p>--}}
                                        {{--                                        </div>--}}
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="holder-right">
                            <p class="cart-total text-center"><span>{{ $order->products()->sum('count') }}</span> {{ __('товара') }}
                            </p>
                            <div class="cart-full-price">
                                <p>
                                    {{ __('Итого к оплате:') }}
                                    <span class="cart_total">{{ \App\Services\CartService::formatTotal($order->getFullSumm()) }}</span>
                                </p>
                            </div>
                            <x-promocode :order-promocode="$order->promocode->code ?? null" :order-id="$order->id"/>
                            {{--                            <x-promocode/>--}}
                            <button type="submit" class="btn-black">{{ __('Перейти к оплате') }}</button>
                        </div>
                    </div>
                </form>
            </div>

            @include('partials.user_support', ['withLoyalty' => true])
        </div>
    </section>
@stop

@section('scripts')
    {{--    @if(!empty($order->info->delivery_address_id))--}}
    {{--        <script>--}}
    {{--            $(document).ready(function() {--}}
    {{--                $('[data-address-id]').click();--}}
    {{--            });--}}
    {{--        </script>--}}
    {{--    @endif--}}
@stop
