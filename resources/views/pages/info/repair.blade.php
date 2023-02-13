@extends('layouts.theme')

@section('title', 'Доставка')

@section('content')
    <div class="info-page">
        <div class="container">
            <section class="info-page delivery">
                @desktop
                @include('partials.info_nav')
                @enddesktop

                @handheld
                <p class="title-1"> Чистка и ремонт <img src="{{ url('i/icons/arrow-down-sort.svg') }}" class="img" alt=""></p>
                <div class="user-btns flex item-center">
                    <a href="#clean-and-repair" class="btn-black">
                        ОСТАВИТЬ ЗАЯВКУ
                        <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M16.9362 7.9446H10.0386V1.047C10.0386 0.4692 9.57 0 8.9916 0C8.4132 0 7.9446 0.4692 7.9446 1.047V7.9446H1.0476C0.4692 7.9446 0 8.4132 0 8.9916C0 9.57 0.4692 10.0386 1.0476 10.0386H7.9446V16.9362C7.9446 17.5146 8.4132 17.9832 8.9916 17.9832C9.57 17.9832 10.0386 17.5146 10.0386 16.9362V10.0386H16.9362C17.5146 10.0386 17.9832 9.57 17.9832 8.9916C17.9832 8.4132 17.5146 7.9446 16.9362 7.9446Z" fill="#ffffff"/>
                        </svg>
                    </a>
                    <a href="{{ route('about.about') }}" class="btn-black">
                        О МАСТЕРСКОЙ
                        <svg width="16" height="13" viewBox="0 0 16 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M8.66932 0.236651C8.35809 0.551863 8.35846 1.06255 8.67013 1.37731L12.944 5.69343L0.797516 5.69343C0.35706 5.69343 4.24369e-07 6.05454 3.85426e-07 6.5C3.46483e-07 6.94545 0.35706 7.30657 0.797516 7.30657L12.944 7.30657L8.67013 11.6227C8.35846 11.9374 8.35809 12.4481 8.66932 12.7633C8.98054 13.0786 9.4855 13.0789 9.79718 12.7642L16 6.5L9.79718 0.235826C9.4855 -0.0789312 8.98054 -0.078562 8.66932 0.236651Z" fill="white"/>
                        </svg>
                    </a>
                </div>
                <img src="{{ asset('i/info/size-guide1.jpg') }}" class="banner-img" alt="">
                @endhandheld
                @desktop
                <div class="info-page-block">

                    <div class="bged flex item-center space-center">
                        <img src="{{ url('i/logos/dam-zardozi.png') }}" alt="">
                    </div>

                    <h3 class="info-page-title">{{ __('Чистка и ремонт ювелирных изделий') }}</h3>

                    <div class="info-page-content">
                        <div class="info-page-conditional flex space-center">
                            <figure class="info-page-conditional__item mr-0 w-full">
                                <img src="{{ url('i/icons/star.svg')}}" class="info-page-conditional__image" alt="icon">
                                <h5 class="info-page-conditional__title">
                                    {{ __('Профессиональные мастера') }}
                                </h5>
                                <figcaption class="info-page-conditional__description">
                                    <p class="info-page-conditional__text">
                                        {!! __('Каждое ваше украшение заслуживает самого') !!}
                                    </p>
                                </figcaption>
                            </figure>
                        </div>
                    </div>

                    <div class="info-page-content text-center lists-icons">
                        <p class="minit">
                            {!! __('Мы рады предложить полный спектр обслуживания') !!}
                        </p>

                        <div class="ulist flex space-between">
                            <div>
                                <p><img src="{{ url('i/icons/size-mi.svg') }}" alt="">{{ __('Подгонку по размеру') }}</p>
                                <p><img src="{{ url('i/icons/pusa.svg') }}" alt="">{{ __('Персональную гравировку') }}</p>
                            </div>
                            <div>
                                <p><img src="{{ url('i/icons/brush.svg') }}" alt="">{{ __('Чистку и полировку') }} </p>
                                <p><img src="{{ url('i/icons/repair-b.svg') }}" alt="">{{ __('Профессиональный ремонт') }}</p>
                            </div>
                        </div>

                        <a href="#clean-and-repair" class="btn-black">{{ __('Оформить заявку') }}</a>
                    </div>

                    <div class="info-page-content">
                        <h3 class="info-page-title">{!! __('Мы принимаем изделия для обслуживания') !!}</h3>
                        @handheld
                        @elsehandheld
                        <br><br><br>
                        @endhandheld
                        <div class="info-page-content__container">
                            <address class="info-page-address">
                                <p class="info-page-address__text">
                                    <span class="info-page-address__city">{{ __('Алматы') }}</span>
                                    <span>ТЦ Esentai Mall</span>
                                    <span> {{ __('Аль-Фараби проспект, 77/8') }}</span>
                                    <span> {{ __('10:00-22:00 ежедневно') }}</span>
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

                @include('partials.info_sidebar', ['pt' => 'pt-6'])
                @enddesktop
            </section>
        </div>
    </div>
@stop

@section('modal')
    <div class="remodal" data-remodal-id="leave-request">
        <button data-remodal-action="close" class="remodal-close"></button>
        <h1>
            {!! __('Профессиональные услуги ювелира-2') !!}
        </h1>
        <div class="modal-body">
            <div class="choose-btn">
                <p class="btn">
                    <svg width="13" height="14" viewBox="0 0 13 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M3.73204 9.1875H12.4532C12.7552 9.1875 13.0001 8.94266 13.0001 8.64062V7.49079C13.0017 6.70277 12.4432 6.02372 11.6722 5.87612L9.93319 5.54323C9.49451 5.45926 9.20749 5.04998 9.2771 4.60972C9.32684 4.35447 9.7563 2.27478 9.74613 1.88595C9.74381 1.38195 9.54062 0.90784 9.17336 0.549965C8.80939 0.195344 8.33085 2.73438e-05 7.82583 0C7.3191 0 6.8448 0.198105 6.49037 0.557785C6.14007 0.913281 5.94664 1.38614 5.94538 1.88975C5.93955 2.28599 6.37205 4.60898 6.37205 4.60898C6.44186 5.04938 6.15464 5.45896 5.71599 5.54291L3.97168 5.87664C3.19998 6.02427 2.63966 6.70168 2.63933 7.48691C2.63933 7.48691 2.63807 9.69776 2.63807 10.3906C2.63807 11.9384 1.20898 12.9999 1.19591 13.0095C1.00341 13.1482 0.922331 13.3953 0.995229 13.6211C1.06818 13.847 1.27837 14 1.51569 14H4.49616C4.63446 14 4.7676 13.9476 4.86883 13.8534C5.20855 13.5371 5.51797 13.1658 5.78569 12.7589C5.75307 12.933 5.70519 13.0885 5.64378 13.2165C5.56243 13.3859 5.5738 13.5853 5.67394 13.7444C5.77407 13.9035 5.94882 14 6.13678 14H11.6055C11.7149 14 11.8217 13.9672 11.9122 13.9059C12.0236 13.8305 13.0001 13.1133 13.0001 11.1836C13.0001 10.8816 12.7552 10.6367 12.4532 10.6367C12.1512 10.6367 11.9063 10.8816 11.9063 11.1836C11.9063 12.1966 11.5702 12.7076 11.3935 12.9062H9.06866C9.09316 12.6951 9.11378 12.4363 9.1172 12.1471C9.11977 11.9276 9.10361 11.6964 9.08827 11.497C9.06508 11.1958 8.80182 10.9707 8.50103 10.9937C8.19987 11.0169 7.97456 11.2798 7.99772 11.5809C8.01128 11.757 8.02555 11.9594 8.02348 12.1342C8.01981 12.444 7.99282 12.7124 7.96611 12.9062H6.87044C6.90725 12.6927 6.92726 12.4653 6.92967 12.2282C6.93558 11.6459 6.83123 11.0321 6.63592 10.4998C6.55364 10.2755 6.33538 10.1313 6.09656 10.142C5.85788 10.1533 5.65422 10.3183 5.59355 10.5494C5.36525 11.419 4.8781 12.2848 4.27325 12.9062H2.82001C3.28191 12.3015 3.73179 11.4426 3.73179 10.3906C3.73185 9.94079 3.73193 9.53862 3.73204 9.1875ZM3.7331 7.48778C3.73321 7.22591 3.92 7.00011 4.17719 6.95089L5.92151 6.61716C6.41471 6.5228 6.84452 6.24403 7.13177 5.83218C7.41901 5.42032 7.53216 4.92067 7.45029 4.42526C7.44964 4.42113 7.44887 4.417 7.44811 4.41287C7.44811 4.41287 7.03292 2.21558 7.03902 1.90548C7.0391 1.90189 7.03913 1.89831 7.03913 1.8947C7.03913 1.44558 7.3847 1.09375 7.82583 1.09375C8.27389 1.09375 8.65241 1.46054 8.65241 1.8947C8.65241 1.9008 8.20003 4.41897 8.19921 4.42394C8.11688 4.91955 8.22973 5.41953 8.51695 5.83177C8.80414 6.244 9.23409 6.52302 9.72751 6.61749L11.4665 6.95037C11.7219 6.99926 11.9069 7.22559 11.9063 7.48967V8.09375H3.73256C3.73286 7.6968 3.7331 7.48778 3.7331 7.48778Z" fill=""/>
                    </svg>
                    {{ __('Чистка') }}
                </p>
                <p class="btn">
                    <svg width="13" height="14" viewBox="0 0 13 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M10.7595 0.691557C10.5042 0.437006 10.2031 0.223022 9.8647 0.0555918C9.69933 -0.0262122 9.50344 -0.0168052 9.34672 0.0805259C9.18999 0.17783 9.09466 0.349215 9.09466 0.533722V2.85136L8.30211 3.34528L7.52098 2.85302V0.533428C7.52098 0.349082 7.42579 0.177803 7.26923 0.0804457C7.11268 -0.0168853 6.91698 -0.0265329 6.75163 0.0549772C6.39114 0.232669 6.08389 0.44684 5.83837 0.691557C5.1935 1.33436 4.75148 2.17982 4.62566 3.0112C4.47413 4.01214 4.7646 4.93609 5.44357 5.61287C5.71899 5.88736 6.20658 6.18301 6.69415 6.33441V12.0559C6.69412 12.483 6.85829 12.8842 7.15643 13.1856C7.45676 13.4892 7.85838 13.6564 8.28712 13.6564H8.28741C8.71533 13.6564 9.1178 13.4901 9.42064 13.1883C9.72653 12.8834 9.8949 12.4813 9.89482 12.0559C9.89477 11.7614 9.65593 11.5226 9.36137 11.5226C9.06676 11.5227 8.82787 11.7616 8.82792 12.0562C8.82795 12.1958 8.77094 12.3295 8.66749 12.4326C8.56599 12.5338 8.43103 12.5895 8.28725 12.5895C8.14556 12.5895 8.01325 12.5348 7.91487 12.4353C7.81564 12.335 7.76102 12.2003 7.76102 12.056V5.90064C7.76102 5.6203 7.54399 5.38779 7.26429 5.36847C6.93421 5.34568 6.41036 5.07012 6.19672 4.85718C5.76448 4.4263 5.58112 3.8274 5.68053 3.17083C5.76394 2.61977 6.04265 2.05422 6.45405 1.59258V3.14728C6.45405 3.33051 6.54807 3.5009 6.70307 3.59858L8.01608 4.42605C8.18904 4.53509 8.40912 4.53563 8.58267 4.4275L9.91024 3.6001C10.0666 3.50267 10.1616 3.33155 10.1616 3.14736V1.61281C10.6491 2.17018 10.935 2.87191 10.935 3.52883C10.935 3.89204 10.8424 4.41737 10.4012 4.85715C10.181 5.07659 9.65676 5.35396 9.33601 5.36922C9.05158 5.38277 8.82792 5.61733 8.82792 5.90208V12.0795C8.82792 12.3741 9.06676 12.613 9.36137 12.613C9.65596 12.613 9.89482 12.3741 9.89482 12.0795V6.34034C10.3817 6.19167 10.8724 5.8939 11.1544 5.61281C11.7088 5.06015 12.0019 4.33955 12.0019 3.52888C12.0019 2.52765 11.5375 1.467 10.7595 0.691557Z" fill=""/>
                        <path d="M3.26069 3.32375C3.39073 3.19178 3.44295 3.00177 3.39864 2.82186L2.81185 0.439096C2.75313 0.200713 2.53936 0.0332031 2.29387 0.0332031H1.12026C0.874765 0.0332031 0.660995 0.20074 0.602281 0.439096L0.0154884 2.82186C-0.028821 3.00177 0.0233989 3.19178 0.153441 3.32375L1.20027 4.38645V6.95276C0.579298 7.17295 0.133371 7.76626 0.133371 8.46169V12.0825C0.133264 12.51 0.299732 12.9119 0.602094 13.2143C0.90435 13.5165 1.3061 13.683 1.73332 13.683C1.73345 13.6829 1.73364 13.683 1.73377 13.683C2.16129 13.683 2.56315 13.5165 2.8654 13.2143C3.16768 12.912 3.33415 12.51 3.3341 12.0826V8.46171C3.3341 8.0342 3.1676 7.63234 2.86532 7.33006C2.69359 7.15833 2.48965 7.03042 2.2672 6.95201V4.33231L3.26069 3.32375ZM2.26717 8.46171V12.0826C2.2672 12.2252 2.21172 12.3591 2.11097 12.4598C2.01024 12.5606 1.8763 12.6161 1.73364 12.6161H1.73348C1.59109 12.6161 1.4572 12.5606 1.3565 12.4598C1.25575 12.3591 1.20027 12.2252 1.2003 12.0827V8.46171C1.2003 8.16761 1.43959 7.92829 1.73372 7.92826C1.87622 7.92826 2.01019 7.98374 2.11094 8.0845C2.21169 8.1853 2.2672 8.31925 2.2672 8.46171H2.26717ZM1.70708 3.38059L1.12277 2.78741L1.53831 1.10005H1.87584L2.29141 2.78741L1.70708 3.38059Z" fill=""/>
                    </svg>
                    {{ __('Ремонт') }}
                </p>
            </div>
            <form action="#" method="post" class="form styled minified">
                @csrf
                <div class="form-group @error('surname') form-error @enderror">
                    <label for="surname">{{ __('Фамилия') }}</label>
                    @error('surname') <span class="error-msg">{{ $message }}</span> @enderror
                    <div class="infoed">
                        <input type="text" name="surname" placeholder="Введи фамилию" value="{{ (isset($info->surname)) ? $info->surname : old('surname') }}" required>
                    </div>
                </div>
                <div class="form-group @error('name') form-error @enderror">
                    <label for="name">{{ __('Имя') }}</label>
                    @error('name') <span class="error-msg">{{ $message }}</span> @enderror
                    <div class="infoed">
                        <input type="text" name="name" placeholder="Введи имя" value="{{ (auth()->check()) ? auth()->user()->name : '' }}" required>
                    </div>
                </div>
                <div class="form-group form-group-date @error('name') form-error @enderror">
                    <label for="name">{{ __('Удобное время звонка') }}</label>
                    @error('date') <span class="error-msg">{{ $message }}</span> @enderror
                    <div class="infoed">
                        <input type="text" name="date" placeholder="c 00:00" required>
                        <input type="text" name="date" placeholder="до 00:00" required>
                    </div>
                </div>
                <button class="btn-black" type="submit">{{ __('Заказать консультацию') }}</button>
            </form>
        </div>
    </div>
@stop
