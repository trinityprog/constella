<aside class="sidebar-left pt-6">
    <h3 class="info-page-title sidebar-left-title">{{ __('Сотрудничество') }}</h3>
    <nav class="info-page-nav partnership">
        <ul class="info-page-list">

            <li class="info-page-list__item">
                <a href="{{ route('partnership.press') }}" class="info-page-list__link {{ (request()->is('partnership/press') || request()->routeIs('partnership.press')) ? 'active' : ''}}">
                    <p class="info-page-list__text">{{ __('ДЛЯ ПРЕССЫ') }}</p>
                    <div class="info-page-tab__mark">
                        <span class="info-page-tab__mark-item"></span>
                        <span class="info-page-tab__mark-item {{ (request()->is('partnership/press') || request()->routeIs('partnership.press')) ? 'active' : ''}}"></span>
                    </div>
                </a>
            </li>
            <li class="info-page-list__item">
                <a href="{{ route('partnership.sponsors') }}" class="info-page-list__link {{ (request()->routeIs('partnership.sponsors')) ? 'active' : ''}}">
                    <p class="info-page-list__text">{{ __('СПОНСОРАМ') }}</p>
                    <div class="info-page-tab__mark"><span class="info-page-tab__mark-item"></span><span class="info-page-tab__mark-item  {{ (request()->routeIs('partnership.sponsors')) ? 'active' : ''}}"></span></div>
                </a>
            </li>
            <li class="info-page-list__item">
                <a href="{{ route('partnership.partners') }}" class="info-page-list__link  {{ (request()->routeIs('partnership.partners')) ? 'active' : ''}}">
                    <p class="info-page-list__text">{{ __('ПАРТНЕРАМ') }}</p>
                    <div class="info-page-tab__mark"><span class="info-page-tab__mark-item"></span><span class="info-page-tab__mark-item  {{ (request()->routeIs('partnership.partners')) ? 'active' : ''}}"></span></div>
                </a>
            </li>
        </ul>
    </nav>
</aside>
