@php
    $types = Cache::get('types');
    $active = $types->where('slug', (session()->has('sex')) ? session('sex') : Cookie::get('sex'))->first();
    if(empty($active)) $active = $types->where('slug', 'female')->first();
    $active->load(['categories']);

    $currentLanguage = app()->getLocale() ?? 'ru';

    $rename_categoryJson = File::get(database_path('files/catalog-rename-category.json'));
    $rename_categoryLocaled = json_decode($rename_categoryJson, true)[$currentLanguage]
@endphp
@handheld
    @include('mobile.footer')
@elsehandheld
    <footer class="footer">
        <div class="container">
            <div class="footer-blocks">
                <div class="footer-block naved">
                    <h4>{{ __('О компании') }}</h4>
                    <ul>
                        <li><a href="{{ route('about.about') }}">{{ __('О нас') }}</a></li>
                        <li><a href="{{ route('about.contacts') }}">{{ __('Адреса') }}</a></li>
                        <li><a href="{{ route('about.news') }}">{{ __('События') }}</a></li>
                        <li><a href="{{ route('career.list') }}">{{ __('Карьера') }}</a></li>
                    </ul>
                </div>
                <div class="footer-block naved">
                    <h4>{{ __('Поддержка') }}</h4>
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
                <div class="footer-block naved">
                    <h4>{{ __('КАТАЛОГ') }}</h4>
                    <ul>
                        <li><a href="{{ route('page.zhannas_choice') }}">{{ $rename_categoryLocaled }}</a></li>
                        <li><a href="{{ route('page.youth_products') }}" class="cat-link clickable">{{ __('Молодежь') }}</a></li>
                        @foreach($active->categories->where('parent', 0) as $category)
                            @if($category->code == '3')
                                <li><a href="{{ route('page.catalog', ['sex' => $active->slug, 'category' => 'yuvelirnye-izdeliya']) }}" class="watch-all">{{ __('Ювелирные изделия') }}</a></li>
                            @endif
                            @if($category->code == '2')
                                <li><a href="{{ route('page.catalog', ['sex' => $active->slug, 'category' => 'odezhda']) }}" class="watch-all">{{ __('Одежда') }}</a></li>
                            @endif
                            @if($category->code == '1')
                                <li><a href="{{ route('page.catalog', ['sex' => $active->slug, 'category' => 'interer']) }}" class="watch-all">{{ __('Интерьер') }}</a></li>
                            @endif
                        @endforeach
                    </ul>
                </div>
                <div class="footer-block naved">
                    <h4>{{ __('Сотрудничество') }}</h4>
                    <ul>
                        <li><a href="{{ route('partnership.partners') }}">{{ __('ПАРТНЕРАМ') }}</a></li>
                        <li><a href="{{ route('partnership.sponsors') }}">{{ __('СПОНСОРАМ') }}</a></li>
                        <li><a href="{{ route('partnership.press') }}">{{ __('ДЛЯ ПРЕССЫ') }}</a></li>
                        <li><a href="{{ route('partnership.agents') }}" target="_blank">{{ __('Представителям') }}</a></li>
                    </ul>
                </div>
                <div class="flex merchants">
                    <div class="footer-block">
                        <a href="https://kaspi.kz/shop/search/?text=constella:allMerchants:ConstellaZ" target="_blank"><img src="{{ url('i/logos/kaspi.png') }}" alt=""></a>
                    </div>
                    <div class="footer-block">
                        <a href="https://market.forte.kz/search?query=constella%20Z" target="_blank"><img src="{{ url('i/logos/forte.png') }}" alt=""></a>
                    </div>
                </div>
                <div class="footer-block subscribe flex item-center space-between">
                    <p>{!! __('Подпишитесь и узнавайте о новинках!') !!}</p>
                    <form action="{{ route('subscription.store') }}" class="form" method="post">
                        @csrf
                        <div class="form-group">
                            <input type="email" name="sup_email" placeholder="{{ __('Введи email') }}">
                            <button type="submit"><img src="{{ url('i/icons/subs-right.svg') }}" alt=""></button>
                        </div>
                    </form>
                </div>
                <div class="footer-block flex item-center space-center zhanna-sign">
                    <a href="{{ route('zhannas.letter') }}" class="flex item-center">
                        {{ __('Письмо Жанны') }} <img src="{{ url('i/icons/zhanna.svg') }}" alt="">
                    </a>
                </div>
            </div>

            <div class="footer-copyrights flex item-center space-between">
                <p>© 2021 ZK Group - ALL RIGHTS RESERVED</p>
                <a href="{{ route('page.info.law') }}">{{ __('ЮРИДИЧЕСКИЙ РАЗДЕЛ') }}</a>
            </div>
        </div>
    </footer>
@endhandheld
