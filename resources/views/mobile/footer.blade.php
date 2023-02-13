@if(!request()->is('/'))
    @include('mobile.socials_dropdown')
@endif

<footer class="footer">
    <div class="subscribe-m p-25">
        <p>{!! __('Подпишитесь и узнавайте о новинках!') !!}</p>
        <form action="{{ route('subscription.store') }}" class="form styled" method="post">
            @csrf
            <div class="form-group">
                <input type="email" name="sup_email" placeholder="{{ __('Введи email') }}">
            </div>
            <div class="form-group">
                <button type="submit" class="btn-black">{{ __('Подписаться') }}</button>
            </div>
        </form>
    </div>

    <div class="footer-content-m">
        <div class="f-section">
            <p class="dropdown-list mobile-slideover">{{ __('О компании') }} <img src="{{ url('i/icons/plus-footer.svg') }}" alt=""></p>
            <div class="slidedown-element">
                <ul>
                    <li><a href="{{ route('about.about') }}">{{ __('О нас') }}</a></li>
                    <li><a href="{{ route('about.contacts') }}">{{ __('Адреса') }}</a></li>
                    <li><a href="{{ route('about.news') }}">{{ __('События') }}</a></li>
                    <li><a href="{{ route('career.list') }}">{{ __('Карьера') }}</a></li>
                </ul>
            </div>
        </div>
        <div class="f-section">
            <p class="dropdown-list mobile-slideover">{{ __('Поддержка') }} <img src="{{ url('i/icons/plus-footer.svg') }}" alt=""></p>
            <div class="slidedown-element">
                <ul>
                    <li><a href="{{ route('page.info.delivery') }}">{{ __('Доставка') }}</a></li>
                    <li><a href="{{ route('page.info.return') }}">{{ __('Возврат товара') }}</a></li>
                    <li><a href="{{ route('page.info.payment') }}">{{ __('Способы оплаты') }}</a></li>
                    <li><a href="{{ route('page.info.size_guide') }}">{{ __('Гид по размерам') }}</a></li>
                    <li><a href="{{ route('page.info.loyalty') }}">{{ __('Программа лояльности') }}</a></li>
                    <li><a href="{{ route('page.info.repair') }}">{{ __('Ремонт и чистка украшений') }}</a></li>
                    <li><a href="{{ route('page.info.faq') }}">FAQ</a></li>
                </ul>
            </div>
        </div>
        <div class="f-section">
            <p class="dropdown-list mobile-slideover">{{ __('Сотрудничество') }} <img src="{{ url('i/icons/plus-footer.svg') }}" alt=""></p>
            <div class="slidedown-element">
                <ul>
                    <li><a href="{{ route('partnership.partners') }}">{{ __('ПАРТНЕРАМ') }}</a></li>
                    <li><a href="{{ route('partnership.sponsors') }}">{{ __('СПОНСОРАМ') }}</a></li>
                    <li><a href="{{ route('partnership.press') }}">{{ __('ДЛЯ ПРЕССЫ') }}</a></li>
                    <li><a href="{{ route('partnership.agents') }}" target="_blank">{{ __('Представителям') }}</a></li>
                </ul>
            </div>
        </div>
        <div class="f-section">
            <p class="dropdown-list mobile-slideover">{{ __('Юридический раздел') }} <img src="{{ url('i/icons/plus-footer.svg') }}" alt=""></p>
            <div class="slidedown-element">
                <ul>
                    <li><a href="{{ route('page.info.law') }}">{{ __('ЮРИДИЧЕСКИЙ РАЗДЕЛ') }}</a></li>
                </ul>
            </div>
        </div>

        <div class="zhanna-m-letter">
            <img src="{{ url('i/z-m-letter.svg') }}" alt="">
            <a href="{{ route('zhannas.letter') }}">{{ __('Письмо Жанны') }}</a>
        </div>
    </div>

    @desktop
    <a class="help-m-btn" href="">{{ __('Нужна помощь?') }}</a>
    @enddesktop

    @handheld
        <div class="right-side flex item-center">
            <div class="dropdown w-8 cl-block">
                <a href="#" class="help-m-btn element link flex">{{ __('Нужна помощь?') }}</a>
                <div class="droppable right services-pops">
                    <a class="close-dropdown"><img src="{{ asset('i/icons/close-black.svg') }}" alt=""></a>

                    <div class="client-services">
                        <p class="text-fonted">{{ __('Нужна помощь?') }}</p>

                        <ul class="help-menu">
                            <li><a href="{{ route('page.info.return') }}"><figure class="flex item-center"><img src="{{ url('i/icons/undo.svg') }}" alt=""></figure> {{ __('Возврат товара') }}</a></li>
                            <li><a href="{{ route('page.info.delivery') }}"><figure class="flex item-center"><img src="{{ url('i/icons/delivery.svg') }}" alt=""></figure> {{ __('Доставка') }}</a></li>
                            <li><a href="{{ route('page.info.payment') }}"><figure class="flex item-center"><img src="{{ url('i/icons/payment.svg') }}" alt=""></figure>{{ __('Способы оплаты') }}</a></li>
                            <li><a href="{{ route('page.info.size_guide') }}"><figure class="flex item-center"><img src="{{ url('i/icons/sizes.svg') }}" alt=""></figure>{{ __('Гид по размерам') }}</a></li>
                        </ul>

                        <a class="client-service-link btn-black" href="{{ route('page.info.delivery') }}">{{ __('Раздел клиентской службы') }}</a>

                        <div class="client-links">
                            <div class="online-functions flex">
                                <a href="#" data-type="feedback" class="customer-request">{!! __('Закажите личный звонок') !!}</a>
                                <a href="#" data-type="feedback" class="customer-request">{!! __('Задайте вопрос') !!}</a>
                            </div>
                            <div class="text-center"><img src="{{ url('i/icons/zhanna-v2-black.svg') }}" alt=""></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="merchants-m">
                <a href="https://kaspi.kz/shop/search/?q=%3AallMerchants%3A11610000&ref=shared_link" target="_blank"><img src="{{ url('i/logos/kaspi-m.svg') }}" alt=""></a>
                <a href="https://forte.kz/" target="_blank"><img src="{{ url('i/logos/forte-m.svg') }}" alt=""></a>
            </div>

            <div class="copyrights-m">
                <p>
                    © 2021 ZK Group <br>
                    - ALL RIGHTS RESERVED
                </p>
            </div>
        </div>
    @endhandheld
</footer>
