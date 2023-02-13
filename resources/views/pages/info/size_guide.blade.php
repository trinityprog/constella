@extends('layouts.theme')

@section('title', __('Гид по размерам'))

@section('content')

<div class="info-page">
    <div class="container">
        <section class="info-page size-guide">
            @include('partials.info_nav')

            <div class="info-page-block">
                <h3 class="info-page-title">{{ __('Гид по размерам') }}</h3>

                <p class="info-page-text">
                    {!! __('Воспользуйтесь нашими размерными таблицами') !!}
                </p>

                <div class="info-page-content flex column item-center">
                    <figure class="info-page-picture">
                        @handheld
                        <img src="{{ url('i/info/size-guide1-m.png') }}" alt="photo" class="info-page-image">
                        @elsehandheld
                        <img src="{{ url('i/info/size-guide1.jpg') }}" alt="photo" class="info-page-image">
                        @endhandheld
                        <figcaption class="info-page-description">
                            <h3 class="info-page-description__title">{{ __('Ювелирные украшения') }}</h3>
                                <ul class="info-page-description__list">
                                    <li class="info-page-description__item"> <a class="info-page-description__link" href="#sizeguide-ring"> {{ __('Кольца') }} </a></li>
                                    <li class="info-page-description__item"> <a class="info-page-description__link" href="#sizeguide-bracelet"> {{ __('Браслеты') }} </a></li>
                                    <li class="info-page-description__item"> <a class="info-page-description__link another" href="#get-size-ring">{{ __('Как определить размер кольца?') }}</a> </li>
                                    <li class="info-page-description__item"> <a class="info-page-description__link another" href="#get-size-bracelet">{{ __('Как определить размер браслета?') }}</a> </li>
                                </ul>
                        </figcaption>
                    </figure>
                    <figure class="info-page-picture">
                        @handheld
                        <img src="{{ url('i/info/size-guide2-m.png') }}" alt="photo" class="info-page-image">
                        @elsehandheld
                        <img src="{{ url('i/info/size-guide2.jpg') }}" alt="photo" class="info-page-image">
                        @endhandheld
                        <figcaption class="info-page-description">
                            <h3 class="info-page-description__title">{{ __('Для женщин') }}</h3>
                                <ul class="info-page-description__list">
                                    <li class="info-page-description__item"> <a class="info-page-description__link" href="#wclothes">{{ __('Одежда') }}</a></li>
                                    <li class="info-page-description__item"> <a class="info-page-description__link" href="#beachwear">{{ __('Пляжная Одежда') }}</a></li>
{{--                                    <li class="info-page-description__item"> <a class="info-page-description__link disabled" href="#">{{ __('Обувь') }}</a> </li>--}}
{{--                                    <li class="info-page-description__item"> <a class="info-page-description__link disabled" href="#">{{ __('Аксессуары') }}</a> </li>--}}
                                </ul>
                        </figcaption>
                    </figure>
                    <figure class="info-page-picture">
                        @handheld
                        <img src="{{ url('i/info/size-guide3-m.png') }}" alt="photo" class="info-page-image">
                        @elsehandheld
                        <img src="{{ url('i/info/size-guide3.jpg') }}" alt="photo" class="info-page-image">
                        @endhandheld
                        <figcaption class="info-page-description">
                            <h3 class="info-page-description__title">{{ __('Нижнее белье') }}</h3>
                                <ul class="info-page-description__list">
                                    <li class="info-page-description__item"> <a class="info-page-description__link" href="#underwear">{{ __('Трусы') }}</a></li>
                                    <li class="info-page-description__item"> <a class="info-page-description__link" href="#beachwear">{{ __('Бюстгальтеры') }}</a></li>
                                    <li class="info-page-description__item"> <a class="info-page-description__link" href="#halati">{{ __('Ночные рубашки и Халаты') }}</a></li>
                                    <li class="info-page-description__item"> <a class="info-page-description__link" href="#pijamas">{{ __('Пижамы') }}</a></li>
                                    <li class="info-page-description__item"> <a class="info-page-description__link" href="#body">{{ __('Боди') }}</a></li>
                                    <li class="info-page-description__item"> <a class="info-page-description__link" href="#chulki">{{ __('Чулочно-носочные изделия') }}</a></li>
                                </ul>
                        </figcaption>
                    </figure>
                    <figure class="info-page-picture">
                        @handheld
                        <img src="{{ url('i/info/size-guide4-m.png') }}" alt="photo" class="info-page-image">
                        @elsehandheld
                        <img src="{{ url('i/info/size-guide4.jpg') }}" alt="photo" class="info-page-image">
                        @endhandheld
                        <figcaption class="info-page-description">
                            <h3 class="info-page-description__title">{{ __('Для детей') }}</h3>
                                <ul class="info-page-description__list">
                                    <li class="info-page-description__item"> <a class="info-page-description__link" href="#kids-2-7">{{ __('от 2 до 7 лет') }}</a></li>
                                    <li class="info-page-description__item"> <a class="info-page-description__link" href="#kids-8-14">{{ __('от 8 до 14 лет') }}</a></li>
                                </ul>
                        </figcaption>
                    </figure>
                </div>

            </div>

            @include('partials.info_sidebar')
        </section>
    </div>
</div>
@stop

@section('modal')
    @if(\App\Models\SizeGuide::whereIn('menu_ids', [1])->exists())
        <div class="remodal" data-remodal-id="sizeguide-ring">
            <button data-remodal-action="close" class="remodal-close"></button>
            <embed style="object-fit: cover;" src="{{ url('sizes/'.\App\Models\SizeGuide::getSizeFile(1)) }}" frameborder="0" width="100%" height="800px">
        </div>
    @endif
    @if(\App\Models\SizeGuide::whereIn('menu_ids', [2])->exists())
        <div class="remodal" data-remodal-id="sizeguide-bracelet">
            <button data-remodal-action="close" class="remodal-close"></button>
            <embed style="object-fit: cover;" src="{{ url('sizes/'.\App\Models\SizeGuide::getSizeFile(2)) }}" frameborder="0" width="100%" height="800px">
        </div>
    @endif
    @if(\App\Models\SizeGuide::whereIn('menu_ids', [17])->exists())
        <div class="remodal" data-remodal-id="wclothes">
            <button data-remodal-action="close" class="remodal-close"></button>
            <embed style="object-fit: cover;" src="{{ url('sizes/'.\App\Models\SizeGuide::getSizeFile(17)) }}" frameborder="0" width="100%" height="800px">
        </div>
    @endif
    @if(\App\Models\SizeGuide::whereIn('menu_ids', [44])->exists())
        <div class="remodal" data-remodal-id="underwear">
            <button data-remodal-action="close" class="remodal-close"></button>
            <embed style="object-fit: cover;" src="{{ url('sizes/'.\App\Models\SizeGuide::getSizeFile(44)) }}" frameborder="0" width="100%" height="800px">
        </div>
    @endif
    @if(\App\Models\SizeGuide::whereIn('menu_ids', [26])->exists())
        <div class="remodal" data-remodal-id="halati">
            <button data-remodal-action="close" class="remodal-close"></button>
            <embed style="object-fit: cover;" src="{{ url('sizes/'.\App\Models\SizeGuide::getSizeFile(26)) }}" frameborder="0" width="100%" height="800px">
        </div>
    @endif
    @if(\App\Models\SizeGuide::whereIn('menu_ids', [46])->exists())
        <div class="remodal" data-remodal-id="pijamas">
            <button data-remodal-action="close" class="remodal-close"></button>
            <embed style="object-fit: cover;" src="{{ url('sizes/'.\App\Models\SizeGuide::getSizeFile(46)) }}" frameborder="0" width="100%" height="800px">
        </div>
    @endif
    @if(\App\Models\SizeGuide::whereIn('menu_ids', [43])->exists())
        <div class="remodal" data-remodal-id="body">
            <button data-remodal-action="close" class="remodal-close"></button>
            <embed style="object-fit: cover;" src="{{ url('sizes/'.\App\Models\SizeGuide::getSizeFile(43)) }}" frameborder="0" width="100%" height="800px">
        </div>
    @endif
    <div class="remodal" data-remodal-id="chulki">
        <button data-remodal-action="close" class="remodal-close"></button>
        <embed style="object-fit: cover;" src="{{ url('sizes/chulki_'.app()->getLocale().'.pdf') }}" frameborder="0" width="100%" height="800px">
    </div>
    <div class="remodal" data-remodal-id="kids-2-7">
        <button data-remodal-action="close" class="remodal-close"></button>
        <embed style="object-fit: cover;" src="{{ url('sizes/kids-27_'.app()->getLocale().'.pdf') }}" frameborder="0" width="100%" height="800px">
    </div>
    <div class="remodal" data-remodal-id="kids-8-14">
        <button data-remodal-action="close" class="remodal-close"></button>
        <embed style="object-fit: cover;" src="{{ url('sizes/kids-814_'.app()->getLocale().'.pdf') }}" frameborder="0" width="100%" height="800px">
    </div>
    <div class="remodal" data-remodal-id="get-size-ring">
        <button data-remodal-action="close" class="remodal-close"></button>
        <embed style="object-fit: cover;" src="{{ url('sizes/get_size_ring_'.app()->getLocale().'.pdf') }}" frameborder="0" width="100%" height="800px">
    </div>
    <div class="remodal" data-remodal-id="get-size-bracelet">
        <button data-remodal-action="close" class="remodal-close"></button>
        <embed style="object-fit: cover;" src="{{ url('sizes/get_size_bracelet_'.app()->getLocale().'.pdf') }}" frameborder="0" width="100%" height="800px">
    </div>
    <div class="remodal" data-remodal-id="beachwear">
        <button data-remodal-action="close" class="remodal-close"></button>
        <embed style="object-fit: cover;" src="{{ url('sizes/beachwear_'.app()->getLocale().'.pdf') }}" frameborder="0" width="100%" height="800px">
    </div>
@stop
