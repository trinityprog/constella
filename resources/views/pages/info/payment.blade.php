@extends('layouts.theme')

@section('title', 'Оплата')

@section('content')

<div class="info-page">
    <div class="container">
        <section class="info-page payment">

            @include('partials.info_nav')

            <div class="info-page-block">
                <h3 class="info-page-title">{{ __('Способы оплаты') }}</h3>

                <div class="info-page-content">
                    <img src="{{ url('i/payment__items.png') }}" alt="" class="info-page-content__image">
                    <p class="info-page-text">
                        {{ __('Вы можете оплатить покупку с помощью') }}
                    </p>
                    <p class="info-page-text flex items-start iconed">
                        <img src="{{ url('i/icons/i-sign.png') }}" alt="" style="margin-right: 1.5rem;">
                        <span>{{ __('Если у вас не получается оплатить заказ') }}</span>
                    </p>
                </div>

                <h3 class="info-page-title">{{ __('Наши фирменные магазины') }}</h3>

                <p class="info-page-text text-center">{{ __('Также вы можете оплатить заказ ') }}</p>

                <div class="info-page-content">
                    <div class="info-page-content__container">
                        <address class="info-page-address">
                            <p class="info-page-address__text">
                                <span class="info-page-address__city">{{ __('Алматы') }}</span>
                                <span>ТЦ Esentai Mall</span>
                                <span> {{ __('Аль-Фараби проспект, 77/8') }}</span>
                                <span>{{ __('10:00-22:00 ежедневно') }}</span>
                            </p>
                            <div class="info-page-map map" id="map">
                                <a class="dg-widget-link" href="http://2gis.kz/almaty/firm/70000001017603758/center/76.928095,43.218896/zoom/16?utm_medium=widget-source&utm_campaign=firmsonmap&utm_source=bigMap">{{ __('Посмотреть на карте Алматы') }}</a><div class="dg-widget-link"><a href="http://2gis.kz/almaty/center/76.928095,43.218896/zoom/16/routeTab/rsType/bus/to/76.928095,43.218896╎CONSTELLA, мультибрендовый бутик ювелирных изделий и часов?utm_medium=widget-source&utm_campaign=firmsonmap&utm_source=route">{{ __('Найти проезд до CONSTELLA, мультибрендовый бутик ювелирных изделий и часов') }}</a></div><script charset="utf-8" src="https://widgets.2gis.com/js/DGWidgetLoader.js"></script><script charset="utf-8">new DGWidgetLoader({"width":"100%","height":300,"borderColor":"#a3a3a3","pos":{"lat":43.218896,"lon":76.928095,"zoom":16},"opt":{"city":"almaty"},"org":[{"id":"70000001017603758"}]});</script><noscript style="color:#c00;font-size:16px;font-weight:bold;">{{ __('Виджет карты использует JavaScript.') }}</noscript>
                            </div>
                        </address>
                        <address class="info-page-address">
                            <p class="info-page-address__text">
                                <span class="info-page-address__city">{{ __('Алматы') }}</span>
                                <span>Rixos Almaty</span>
                                <span>{{ __('Сейфуллина проспект, 506/99') }}</span>
                                <span>{{ __('10:00-20:00 ежедневно') }}</span>
                            </p>
                            <div class="info-page-map map" id="map">
                                <a class="dg-widget-link" href="http://2gis.kz/almaty/firm/70000001020600168/center/76.934037,43.249469/zoom/16?utm_medium=widget-source&utm_campaign=firmsonmap&utm_source=bigMap">{{ __('Посмотреть на карте Алматы') }}</a><div class="dg-widget-link"><a href="http://2gis.kz/almaty/center/76.934037,43.249469/zoom/16/routeTab/rsType/bus/to/76.934037,43.249469╎CONSTELLA, мультибрендовый бутик ювелирных изделий и часов?utm_medium=widget-source&utm_campaign=firmsonmap&utm_source=route">{{ __('Найти проезд до CONSTELLA, мультибрендовый бутик ювелирных изделий и часов') }}</a></div><script charset="utf-8" src="https://widgets.2gis.com/js/DGWidgetLoader.js"></script><script charset="utf-8">new DGWidgetLoader({"width":'100%',"height":300,"borderColor":"#a3a3a3","pos":{"lat":43.249469,"lon":76.934037,"zoom":16},"opt":{"city":"almaty"},"org":[{"id":"70000001020600168"}]});</script><noscript style="color:#c00;font-size:16px;font-weight:bold;">{{ __('Виджет карты использует JavaScript.') }}</noscript>
                            </div>
                        </address>
                        <address class="info-page-address">
                            <p class="info-page-address__text">
                                <span class="info-page-address__city">{{ __('НУР-сУЛТАН') }}</span>
                                <span>Talan Gallery</span>
                                <span>{{ __('Достык, 16') }}</span>
                                <span>{{ __('10:00-22:00 ежедневно') }}</span>
                            </p>
                            <div class="info-page-map map" id="map">
                                <a class="dg-widget-link" href="http://2gis.kz/nur_sultan/firm/70000001031498994/center/71.432642,51.12514/zoom/16?utm_medium=widget-source&utm_campaign=firmsonmap&utm_source=bigMap">{{ __('Посмотреть на карте Нур-Султана') }}</a><div class="dg-widget-link"><a href="http://2gis.kz/nur_sultan/center/71.432642,51.12514/zoom/16/routeTab/rsType/bus/to/71.432642,51.12514╎Constella?utm_medium=widget-source&utm_campaign=firmsonmap&utm_source=route">{{ __('Найти проезд до Constella') }}</a></div><script charset="utf-8" src="https://widgets.2gis.com/js/DGWidgetLoader.js"></script><script charset="utf-8">new DGWidgetLoader({"width":'100%',"height":300,"borderColor":"#a3a3a3","pos":{"lat":51.12514,"lon":71.432642,"zoom":16},"opt":{"city":"nur_sultan"},"org":[{"id":"70000001031498994"}]});</script><noscript style="color:#c00;font-size:16px;font-weight:bold;">{{ __('Виджет карты использует JavaScript.') }}</noscript>
                            </div>
                        </address>
                        <address class="info-page-address">
                            <p class="info-page-address__text">
                                <span class="info-page-address__city">{{ __('ШЫМКЕНТ') }}</span>
                                <span>Rixos Khadisha Shymkent</span>
                                <span>{{ __('Желтоксан, 17') }}</span>
                                <span>{{ __('10:00-19:00 пн-пт ; 10:00-18:00 сб') }}</span>
                            </p>
                            <div class="info-page-map map" id="map">
                                <a class="dg-widget-link" href="http://2gis.kz/shymkent/firm/70000001031919520/center/69.595978,42.324882/zoom/16?utm_medium=widget-source&utm_campaign=firmsonmap&utm_source=bigMap">{{ __('Посмотреть на карте Шымкента') }}</a><div class="dg-widget-link"><a href="http://2gis.kz/shymkent/center/69.595978,42.324882/zoom/16/routeTab/rsType/bus/to/69.595978,42.324882╎Constella, бутик ювелирных изделий?utm_medium=widget-source&utm_campaign=firmsonmap&utm_source=route">{{ __('Найти проезд до Constella, бутик ювелирных изделий') }}</a></div><script charset="utf-8" src="https://widgets.2gis.com/js/DGWidgetLoader.js"></script><script charset="utf-8">new DGWidgetLoader({"width":'100%',"height":300,"borderColor":"#a3a3a3","pos":{"lat":42.324882,"lon":69.595978,"zoom":16},"opt":{"city":"shymkent"},"org":[{"id":"70000001031919520"}]});</script><noscript style="color:#c00;font-size:16px;font-weight:bold;">{{ __('Виджет карты использует JavaScript.') }}</noscript>
                            </div>
                        </address>
                    </div>
                </div>
            </div>

            @include('partials.info_sidebar')

        </section>
    </div>
</div>
@stop
