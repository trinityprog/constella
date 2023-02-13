@extends('layouts.theme')

@section('title', 'Информация о доставке')

@section('content')
    <section>
        <div class="container">
            <div class="contacts">
                <div class="dropdown sorting">
                    <a href="#" class="element link flex">ДОСТАВКА <img src="{{ url('i/icons/arrow-down-sort.svg') }}" class="img" alt=""></a>
                </div>
            </div>

            <div class="address">
                <p class="title">Адрес доставки</p>
                <div class="added-addresses">
                    <p>Дом Алматы</p>
                    <p>Работа</p>
                </div>
                <nav class="info-page-nav partnership">
                    <ul class="info-page-list">
                        <li class="info-page-list__item">
                            <a href="#" class="info-page-list__link ">
                                <p class="info-page-list__text">НОВЫЙ АДРЕС</p>
                                <div class="info-page-tab__mark"><span class="info-page-tab__mark-item"></span><span class="info-page-tab__mark-item"></span></div>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>

            <div class="product-package">
                <p class="title">Упаковка изделий</p>
                <div class="package">
                    <p>Подарочная упаковка</p><br>
                    <span>$ 200 за 2 изделия</span>
                    <svg width="8" height="6" viewBox="0 0 8 6" fill="none" xmlns="http://www.w3.org/2000/svg" class="check">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M7.7805 0.151861C8.04316 0.379477 8.07454 0.780408 7.85058 1.04736L3.95777 5.68766C3.6512 6.05311 3.11452 6.10515 2.74548 5.80522L0.234689 3.7646C-0.0348929 3.5455 -0.0786741 3.14577 0.136901 2.87178C0.352475 2.59779 0.745772 2.55329 1.01535 2.77239L3.24235 4.58236L6.8994 0.223094C7.12335 -0.0438632 7.51783 -0.0757555 7.7805 0.151861Z" fill="#272727"/>
                    </svg>
                </div>
                <div class="package">
                    <p>Стандартная упаковка</p><br>
                    <span>Входит в стоимость</span>
                    <svg width="8" height="6" viewBox="0 0 8 6" fill="none" xmlns="http://www.w3.org/2000/svg" class="check">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M7.7805 0.151861C8.04316 0.379477 8.07454 0.780408 7.85058 1.04736L3.95777 5.68766C3.6512 6.05311 3.11452 6.10515 2.74548 5.80522L0.234689 3.7646C-0.0348929 3.5455 -0.0786741 3.14577 0.136901 2.87178C0.352475 2.59779 0.745772 2.55329 1.01535 2.77239L3.24235 4.58236L6.8994 0.223094C7.12335 -0.0438632 7.51783 -0.0757555 7.7805 0.151861Z" fill="#272727"/>
                    </svg>
                </div>
            </div>


            <div class="delivery">
                <a href="#" class="title dropdown-list mobile-slideover">
                    Крурьерская доставка
                    <svg width="8" height="6" viewBox="0 0 8 6" fill="none" xmlns="http://www.w3.org/2000/svg" class="check">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M7.7805 0.151861C8.04316 0.379477 8.07454 0.780408 7.85058 1.04736L3.95777 5.68766C3.6512 6.05311 3.11452 6.10515 2.74548 5.80522L0.234689 3.7646C-0.0348929 3.5455 -0.0786741 3.14577 0.136901 2.87178C0.352475 2.59779 0.745772 2.55329 1.01535 2.77239L3.24235 4.58236L6.8994 0.223094C7.12335 -0.0438632 7.51783 -0.0757555 7.7805 0.151861Z" fill="#272727"/>
                    </svg>
                </a>
                <div class="delivery-list slidedown-element">
                    <ul>
                        <li>$ 800</li><br>
                    </ul>
                    <span>С 20 августа - по 30 августа </span>
                </div>
            </div>

            <div class="self-delivery">
                <div class="dropdown sorting">
                    <a href="#" class="title dropdown-list mobile-slideover">Самовывоз <img src="{{ url('i/icons/arrow-down-sort.svg') }}" class="img" alt=""></a>
                    <div class="info-page-content slidedown-element">
                        <p class="info">
                            Бесплатно <br><br>
                            Готов к выдаче с 20 августа
                        </p>
                        <div class="info-page-content__container">
                            <address class="info-page-address">
                                <p class="info-page-address__text">
                                    <span class="info-page-address__city">Алматы</span>
                                    <span>ТЦ Esentai Mall</span>
                                    <span> Аль-Фараби проспект, 77/8</span>
                                    <span> 10:00-22:00 ежедневно</span>
                                </p>
                                <div class="cart-btn">
                                    <a href="#" class="btn-transparent">ВЫБРАТЬ ПУНКТ ВЫДАЧИ</a>
                                </div>
                                <div class="info-page-map map" id="map">
                                    <a class="dg-widget-link" href="http://2gis.kz/almaty/firm/70000001017603758/center/76.928095,43.218896/zoom/16?utm_medium=widget-source&utm_campaign=firmsonmap&utm_source=bigMap">Посмотреть на карте Алматы</a><div class="dg-widget-link"><a href="http://2gis.kz/almaty/center/76.928095,43.218896/zoom/16/routeTab/rsType/bus/to/76.928095,43.218896╎CONSTELLA, мультибрендовый бутик ювелирных изделий и часов?utm_medium=widget-source&utm_campaign=firmsonmap&utm_source=route">Найти проезд до CONSTELLA, мультибрендовый бутик ювелирных изделий и часов</a></div><script charset="utf-8" src="https://widgets.2gis.com/js/DGWidgetLoader.js"></script><script charset="utf-8">new DGWidgetLoader({"width":"100%","height":300,"borderColor":"#a3a3a3","pos":{"lat":43.218896,"lon":76.928095,"zoom":16},"opt":{"city":"almaty"},"org":[{"id":"70000001017603758"}]});</script><noscript style="color:#c00;font-size:16px;font-weight:bold;">Виджет карты использует JavaScript. Включите его в настройках вашего браузера.</noscript>
                                </div>
                            </address>
                            <address class="info-page-address">
                                <p class="info-page-address__text">
                                    <span class="info-page-address__city">Алматы</span>
                                    <span>Rixos Almaty</span>
                                    <span>Сейфуллина проспект, 506/99</span>
                                    <span>10:00-20:00 ежедневно</span>
                                </p>
                                <div class="cart-btn">
                                    <a href="#" class="btn-transparent">ВЫБРАТЬ ПУНКТ ВЫДАЧИ</a>
                                </div>
                                <div class="info-page-map map" id="map">
                                    <a class="dg-widget-link" href="http://2gis.kz/almaty/firm/70000001020600168/center/76.934037,43.249469/zoom/16?utm_medium=widget-source&utm_campaign=firmsonmap&utm_source=bigMap">Посмотреть на карте Алматы</a><div class="dg-widget-link"><a href="http://2gis.kz/almaty/center/76.934037,43.249469/zoom/16/routeTab/rsType/bus/to/76.934037,43.249469╎CONSTELLA, мультибрендовый бутик ювелирных изделий и часов?utm_medium=widget-source&utm_campaign=firmsonmap&utm_source=route">Найти проезд до CONSTELLA, мультибрендовый бутик ювелирных изделий и часов</a></div><script charset="utf-8" src="https://widgets.2gis.com/js/DGWidgetLoader.js"></script><script charset="utf-8">new DGWidgetLoader({"width":'100%',"height":300,"borderColor":"#a3a3a3","pos":{"lat":43.249469,"lon":76.934037,"zoom":16},"opt":{"city":"almaty"},"org":[{"id":"70000001020600168"}]});</script><noscript style="color:#c00;font-size:16px;font-weight:bold;">Виджет карты использует JavaScript. Включите его в настройках вашего браузера.</noscript>
                                </div>
                            </address>
                            <address class="info-page-address">
                                <p class="info-page-address__text">
                                    <span class="info-page-address__city">НУР-сУЛТАН</span>
                                    <span>Talan Gallery</span>
                                    <span>Достык, 16</span>
                                    <span>10:00-22:00 ежедневно</span>
                                </p>
                                <div class="cart-btn">
                                    <a href="#" class="btn-transparent">ВЫБРАТЬ ПУНКТ ВЫДАЧИ</a>
                                </div>
                                <div class="info-page-map map" id="map">
                                    <a class="dg-widget-link" href="http://2gis.kz/nur_sultan/firm/70000001031498994/center/71.432642,51.12514/zoom/16?utm_medium=widget-source&utm_campaign=firmsonmap&utm_source=bigMap">Посмотреть на карте Нур-Султана</a><div class="dg-widget-link"><a href="http://2gis.kz/nur_sultan/center/71.432642,51.12514/zoom/16/routeTab/rsType/bus/to/71.432642,51.12514╎Constella?utm_medium=widget-source&utm_campaign=firmsonmap&utm_source=route">Найти проезд до Constella</a></div><script charset="utf-8" src="https://widgets.2gis.com/js/DGWidgetLoader.js"></script><script charset="utf-8">new DGWidgetLoader({"width":'100%',"height":300,"borderColor":"#a3a3a3","pos":{"lat":51.12514,"lon":71.432642,"zoom":16},"opt":{"city":"nur_sultan"},"org":[{"id":"70000001031498994"}]});</script><noscript style="color:#c00;font-size:16px;font-weight:bold;">Виджет карты использует JavaScript. Включите его в настройках вашего браузера.</noscript>
                                </div>
                            </address>
                        </div>
                    </div>
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
                <a href="{{ route('order.main') }}" class="btn-black {{ $cart::count() == 0 ? 'disabled' : '' }}">Перейти к ОПЛАТЕ</a>
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

