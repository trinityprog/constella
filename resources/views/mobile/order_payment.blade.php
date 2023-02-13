@extends('layouts.theme')

@section('title', 'Информация о доставке')

@section('content')
    <section>
        <div class="container">
            <div class="contacts">
                <div class="dropdown sorting">
                    <a href="#" class="element link flex">ОПЛАТА ЗАКАЗА <img src="{{ url('i/icons/arrow-down-sort.svg') }}" class="img" alt=""></a>
                </div>
            </div>
            <div class="order">
                <p class="order-info">
                    Ваш заказ состоит из категорий,<br>
                    которые оплачиваются отдельно
                </p>
                <div class="order-items">
                    <p class="order-items__count">
                        Ювелирные украшения (3)<br><br>
                        $ 15 500
                    </p>
                    <div class="order-bonuses">
                        <div class="bonuses">
                            <p class="bonuses__count">11 000</p>
                            <p class="bonuses__text">МОИ БОНУСЫ</p>
                        </div>
                        <div class="bonuses">
                            <p class="bonuses__count">10%</p>
                            <p class="bonuses__text">МОЯ СКИДКА</p>
                        </div>
                    </div>
                    <a href="#promo-code" class="use_bonuses">
                        <p class="use_bonuses__text">ИСПОЛЬЗОВАТЬ БОНУСЫ</p>
                        <div class="info-page-tab__mark"><span class="info-page-tab__mark-item"></span><span class="info-page-tab__mark-item  "></span></div>
                    </a>
                    <button class="btn-black">ОПЛАТИТЬ</button>
                </div>
                <div class="order-items">
                    <p class="order-items__count">
                        Ювелирные украшения (3)<br><br>
                        $ 15 500
                    </p>
                    <div class="order-bonuses">
                        <div class="bonuses">
                            <p class="bonuses__count">11 000</p>
                            <p class="bonuses__text">МОИ БОНУСЫ</p>
                        </div>
                        <div class="bonuses">
                            <p class="bonuses__count">10%</p>
                            <p class="bonuses__text">МОЯ СКИДКА</p>
                        </div>
                    </div>
                    <a href="#promo-code" class="use_bonuses">
                        <p class="use_bonuses__text">ИСПОЛЬЗОВАТЬ БОНУСЫ</p>
                        <div class="info-page-tab__mark"><span class="info-page-tab__mark-item"></span><span class="info-page-tab__mark-item  "></span></div>
                    </a>
                    <button class="btn-black">ОПЛАТИТЬ</button>
                </div>
            </div>
            <nav class="info-page-nav partnership">
                <ul class="info-page-list">
                    <li class="info-page-list__item">
                        <a href="#promo-code" class="info-page-list__link ">
                            <p class="info-page-list__text">ВВЕСТИ ПРОМОКОД</p>
                            <div class="info-page-tab__mark"><span class="info-page-tab__mark-item"></span><span class="info-page-tab__mark-item  "></span></div>
                        </a>
                    </li>
                </ul>
            </nav>
            <div class="holder-right">
                <p class="cart-total"><span class="cart-items-count {{ ($cart::count() == 0) ? 'none' : '' }}">{{ $cart::count() }}</span> {{ \App\Http\Controllers\Api\CDEKController::true_wordform($cart::count(), 'товар', 'товара', 'товаров') }}</p>
                <div class="cart-full-price">
                    <p class="total">Итого к оплате: <br><br> <span>{{ \App\Services\CartService::formatCurrency($cart::total()) }}</span></p>
                </div>
                <x-promocode/>
            </div>
            @include('partials.user_support')
            <p class="save"><img src="{{ asset('i/icons/staple.svg') }}" class="img" alt="">Сохранить и продолжить позже</p>
        </div>
    </section>
@endsection

@section('modal')
    <div class="remodal" data-remodal-id="promo-code">
        <button data-remodal-action="close" class="remodal-close"></button>
        <img src="{{ asset('i/icons/zhanna.svg') }}" alt="">
        <h1>Введите промокод</h1>
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
                        ПРИМЕНИТЬ
                    </button>
                </div>
            </form>
        </div>
    </div>
@stop
