@handheld
@include('mobile.socials_dropdown')
@elsehandheld
    <div class="brands-list" id="scrollToSocials">
        <div class="container">
            <h3>{!! __('Наши бренды в социальных сетях') !!}</h3>
            <div class="brands-items flex item-center space-between">
                <div class="brand-item">
                    <div class="imgs">
                        <img class="lazy" data-src="{{ url('i/logos/socials/damiani-2.png') }}" alt="">
                        <img class="lazy" data-src="{{ url('i/logos/socials/damiani-1.png') }}" alt="">
                    </div>
                    <a target="_blank" href="https://www.instagram.com/damiani_kazakhstan/?hl=ru" class="unactive flex item-center">
                        <img data-src="{{ asset('i/logos/socials/damiani.svg') }}" alt="" class="logo lazy">
                        <img src="{{ url('i/icons/instagram.svg') }}" alt="" class="inst">
                    </a>
                </div>
                <div class="brand-item">
                    <div class="imgs">
                        <img data-src="{{ url('i/logos/socials/constella-2.png') }}" alt="" class="lazy">
                        <img data-src="{{ url('i/logos/socials/constella-1.png') }}" alt="" class="lazy">
                    </div>
                    <a target="_blank" href="https://www.instagram.com/constella_jewelry/?hl=ru" class="unactive flex item-center">
                        <img data-src="{{ asset('i/logos/socials/constella.svg') }}" alt="" class="logo lazy">
                        <img src="{{ url('i/icons/instagram.svg') }}" alt="" class="inst">
                    </a>
                </div>
                <div class="brand-item">
                    <div class="imgs">
                        <img data-src="{{ url('i/logos/socials/laperla-2.png') }}" alt="" class="lazy">
                        <img data-src="{{ url('i/logos/socials/laperla-1.png') }}" alt="" class="lazy">
                    </div>
                    <a target="_blank" href="https://www.instagram.com/perla.by.constella/?hl=ru" class="unactive flex item-center">
                        <img data-src="{{ asset('i/logos/socials/laperla.svg') }}" alt="" class="logo lazy">
                        <img src="{{ url('i/icons/instagram.svg') }}" alt="" class="inst">
                    </a>
                </div>
                <div class="brand-item">
                    <div class="imgs">
                        <img data-src="{{ url('i/logos/socials/zardozi-2.png') }}" alt="" class="lazy">
                        <img data-src="{{ url('i/logos/socials/zardozi-1.png') }}" alt="" class="lazy">
                    </div>
                    <a target="_blank" href="https://www.instagram.com/zardozi_fashion/?utm_medium=copy_link" class="unactive flex item-center">
                        <img data-src="{{ asset('i/logos/socials/zardozi.svg') }}" alt="" class="logo lazy">
                        <img src="{{ url('i/icons/instagram.svg') }}" alt="" class="inst">
                    </a>
                </div>
            </div>
            <div class="index-divider">
                <svg width="546" height="1" viewBox="0 0 546 1" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <line y1="0.5" x2="546" y2="0.5" stroke="#272727"/>
                    <line y1="0.5" x2="546" y2="0.5" stroke="url(#paint0_linear_3298_34432)"/>
                    <line y1="0.5" x2="546" y2="0.5" stroke="url(#paint1_linear_3298_34432)"/>
                    <defs>
                        <linearGradient id="paint0_linear_3298_34432" x1="0" y1="1" x2="546" y2="1" gradientUnits="userSpaceOnUse">
                            <stop stop-color="#F8F8F8"/>
                            <stop offset="0.36667" stop-color="#F8F8F8" stop-opacity="0"/>
                        </linearGradient>
                        <linearGradient id="paint1_linear_3298_34432" x1="0" y1="1" x2="546" y2="1" gradientUnits="userSpaceOnUse">
                            <stop offset="0.598958" stop-color="#F8F8F8" stop-opacity="0"/>
                            <stop offset="1" stop-color="#F8F8F8"/>
                        </linearGradient>
                    </defs>
                </svg>
            </div>

            <a href="https://youtube.com/channel/UCiKtQ8kVb2oDu38krKq55Ig" target="_blank" class="youtube">
                <img src="{{ asset('i/banner-logo.png') }}" class="youtube-img" alt="">
                <img src="{{ asset('i/yt-logo.png') }}" class="youtube-logo" alt="">
                <p class="youtube-title">{{ __('Zhanna Kan YouTube Channel') }}</p>
                <svg width="41" height="16" viewBox="0 0 41 16" fill="none" xmlns="http://www.w3.org/2000/svg" class="yt-arrow">
                    <path d="M39 8L39.5297 7.46909L40.0618 8L39.5297 8.53091L39 8ZM1 8.75C0.585786 8.75 0.25 8.41421 0.25 8C0.25 7.58579 0.585786 7.25 1 7.25V8.75ZM32.5144 0.469088L39.5297 7.46909L38.4703 8.53091L31.4549 1.53091L32.5144 0.469088ZM39.5297 8.53091L32.5144 15.5309L31.4549 14.4691L38.4703 7.46909L39.5297 8.53091ZM39 8.75H1V7.25H39V8.75Z" fill="white"/>
                </svg>
            </a>
        </div>
    </div>
@endhandheld
