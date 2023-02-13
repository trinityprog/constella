@extends('layouts.theme')

@section('title', 'Информация о доставке')

@section('content')
    <section>
        <div class="container">
            <div class="contacts">
                <div class="dropdown sorting">
                    <a href="#" class="element link flex">{{ __('Оплата заказа') }} <img src="{{ url('i/icons/arrow-down-sort.svg') }}" class="img" alt=""></a>
                </div>
            </div>

            <div class="check-before-pay">
                <h1 class="title">{{ __('Проверьте заказ перед оплатой') }}</h1>
                <div class="check-before-pay__list">
                    <p class="list-title">{{ __('Контактная информация:') }}</p>
                    <p>Алексей Буревольный</p>
                    <p>Nesstore@mail.com</p>
                </div>
                <div class="check-before-pay__list">
                    <p class="list-title">{{ __('Адрес и способ доставки:') }}</p>
                    <p class="list-info"><img src="{{ asset('i/icons/pin.png') }}" alt="">Карасай батыра 121, Алматы, 050000</p>
                    <p class="list-info"><img src="{{ asset('i/logos/dhl.png') }}" style="width: 24px; height: 24px;" alt="">DHL Premium (1-3 days) $ 100</p>
                </div>
            </div>

            <div class="content-order">
                <p class="content-order__title">{{ __('Содержание заказа') }} (2)</p>
                <div class="cart-item flex discounted">
                    <figure><img src="{{ url('i/products/pr-1.png') }}" alt=""></figure>
                    <div class="cart-content">
                        <div>
                            <div class="cart-title">
                                <h2 class="title"><a href="#" target="_blank">Gold Bracelet <br> With Corals</a></h2>
                                <a href="#" class="close">
                                    <svg width="16" height="16" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M6.00015 4.58926L1.7027 0.291588C1.31394 -0.0971957 0.682504 -0.0971957 0.292501 0.291588C-0.0975011 0.681611 -0.0975011 1.31308 0.292501 1.7031L4.58996 6.00077L0.292502 10.2972C-0.0975006 10.6872 -0.0975006 11.3187 0.292502 11.7075C0.682504 12.0975 1.31394 12.0975 1.7027 11.7075L6.00015 7.40981L10.2976 11.7075C10.6876 12.0975 11.3178 12.0975 11.7078 11.7075C11.9034 11.5131 12 11.258 12 11.003C12 10.7479 11.9034 10.4928 11.7078 10.2972L7.41159 6.00077L11.7078 1.7031C11.9034 1.50871 12 1.25241 12 0.997343C12 0.742281 11.9034 0.487218 11.7078 0.291587C11.3178 -0.0971961 10.6876 -0.0971961 10.2976 0.291587L6.00015 4.58926Z" fill="#272727"/>
                                    </svg>
                                </a>
                            </div>
                            <div>
                                <p class="cart-price">$ 800</p>
                                <p class="cart-size">44</p>
                                <p class="cart-color">Черный</p>
                            </div>
                            <div class="counters flex item-center">
                                <a href="#" class="minus flex item-center">-</a>
                                <span>1</span>
                                <a href="#" class="plus flex item-center">+</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="cart-item flex discounted">
                    <figure><img src="{{ url('i/products/pr-1.png') }}" alt=""></figure>
                    <div class="cart-content">
                        <div>
                            <div class="cart-title">
                                <h2 class="title"><a href="#" target="_blank">Gold Bracelet <br> With Corals</a></h2>
                                <a href="#" class="close">
                                    <svg width="16" height="16" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M6.00015 4.58926L1.7027 0.291588C1.31394 -0.0971957 0.682504 -0.0971957 0.292501 0.291588C-0.0975011 0.681611 -0.0975011 1.31308 0.292501 1.7031L4.58996 6.00077L0.292502 10.2972C-0.0975006 10.6872 -0.0975006 11.3187 0.292502 11.7075C0.682504 12.0975 1.31394 12.0975 1.7027 11.7075L6.00015 7.40981L10.2976 11.7075C10.6876 12.0975 11.3178 12.0975 11.7078 11.7075C11.9034 11.5131 12 11.258 12 11.003C12 10.7479 11.9034 10.4928 11.7078 10.2972L7.41159 6.00077L11.7078 1.7031C11.9034 1.50871 12 1.25241 12 0.997343C12 0.742281 11.9034 0.487218 11.7078 0.291587C11.3178 -0.0971961 10.6876 -0.0971961 10.2976 0.291587L6.00015 4.58926Z" fill="#272727"/>
                                    </svg>
                                </a>
                            </div>
                            <div>
                                <p class="cart-price">$ 800</p>
                                <p class="cart-size">44</p>
                                <p class="cart-color">Черный</p>
                            </div>
                            <div class="counters flex item-center">
                                <a href="#" class="minus flex item-center">-</a>
                                <span>1</span>
                                <a href="#" class="plus flex item-center">+</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <nav class="info-page-nav partnership">
                <ul class="info-page-list">
                    <li class="info-page-list__item">
                        <a href="#promo-code" class="info-page-list__link ">
                            <p class="info-page-list__text">{{ __('Ввести промокод') }}</p>
                            <div class="info-page-tab__mark"><span class="info-page-tab__mark-item"></span><span class="info-page-tab__mark-item  "></span></div>
                        </a>
                    </li>
                </ul>
            </nav>
            <div class="holder-right">
                <p class="cart-total"><span class="cart-items-count {{ ($cart::count() == 0) ? 'none' : '' }}">{{ $cart::count() }}</span> {{ \App\Http\Controllers\Api\CDEKController::true_wordform($cart::count(), 'товар', 'товара', 'товаров') }}</p>
                <div class="cart-full-price">
                    <p class="total">{{ __('Итого к оплате:') }} <br><br> <span>{{ \App\Services\CartService::formatCurrency($cart::total()) }}</span></p>
                </div>
                <x-promocode/>
                <a href="{{ route('order.main') }}" class="btn-black {{ $cart::count() == 0 ? 'disabled' : '' }}">{{ __('Перейти к оплате') }}</a>
            </div>
            @include('partials.user_support')
            <p class="save"><img src="{{ asset('i/icons/staple.svg') }}" class="img" alt="">{{ __('Сохранить и продолжить позже') }}</p>
        </div>
    </section>
@endsection

@section('modal')
    <div class="remodal" data-remodal-id="promo-code">
        <button data-remodal-action="close" class="remodal-close"></button>
        <img src="{{ asset('i/icons/zhanna.svg') }}" alt="">
        <h1>{{ __('Введите промокод') }}</h1>
        <div class="modal-body">
            <form action="" method="post" class="form styled">
                @csrf
                <div class="widthed">
                    <div class="form-group @error('promocode') form-error @enderror">
                        <input type="text" name="promocode" placeholder="Промокод">
                    </div>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn-black">
                        {{ __('Применить') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
@stop
