@extends('layouts.theme')

@section('title', 'Главная страница')

@php
    $currentLanguage = app()->getLocale() ?? 'ru';

    $rename_categoryJson = File::get(database_path('files/catalog-rename-category.json'));
    $rename_categoryLocaled = json_decode($rename_categoryJson, true)[$currentLanguage]
@endphp

@section('content')
    <div class="index-page">
        @if(isset($data['slides']) && count($data['slides']) > 0)
            <div class="container slider">
                <div class="swiper-container">
                    <div class="swiper-wrapper">
                        @handheld
                        @foreach($data['slides'] as $slide)
                            <div class="swiper-slide mobile">
                                <a href="{{ $slide['link'] }}">
                                    <img src="{{ url('i/' . $slide['m_image']) }}" alt="" class="slide-image">
                                    <p class="go-to-collection">{{ __('Смотреть коллекцию') }}</p>
                                </a>
                            </div>
                        @endforeach
                        @elsehandheld
                        @foreach($data['slides'] as $slide)
                            <div class="swiper-slide">
                                <a href="{{ $slide['link'] }}"><img src="{{ url('i/' . $slide['image']) }}" alt="" class="slide-image"></a>
                                <a href="{{ $slide['link'] }}" class="button">{{ __('Cмотреть коллекцию') }} <img src="{{ asset('i/icons/collection-arrow.svg') }}" alt=""></a>
                            </div>
                        @endforeach
                        @endhandheld
                    </div>
                </div>
            </div>
        @endif

        <div class="brands">
            <div class="container flex items-start space-between">
                <div class="video">
                    <a href="#zhannas-video">
                        <img src="{{ url('i/icons/play.svg') }}" alt="" class="play">
                        <img src="{{ url('i/video-zhanna.jpg') }}" alt="" class="poster">
                        <span>{{ __('Смотреть фильм о брендах') }}</span>
                    </a>
                </div>

                @handheld
                <div class="jewerly-categories">
                    <h3 class="dropdown-list">{{ __('Ювелирные бренды') }} <img src="{{ url('i/icons/arrow-down-sort.svg') }}" alt=""></h3>
                    <div class="jewerly-menu slidedown-element nav-item">
                        @forelse($data['brands'] as $brand)
                            <ul>
                                <li class="cat-item">
                                    <a href="{{ route('page.catalog', ['sex' => Cookie::has('sex') ? Cookie::get('sex') : 'female', 'category' => $brand]) }}">
                                        {{ $brand }}
                                    </a>
                                </li>
                            </ul>
                        @empty
                            <ul><li>-</li></ul>
                        @endforelse
                    </div>
                    @include('mobile.brands_recommendation_dropdown')
                </div>
                @elsehandheld
                <div class="jewerly-categories">
                    <h3 class="dropdown-list">{{ __('Ювелирные бренды') }}</h3>

                    <div class="jewerly-menu flex items-start">
                        <ul class="jewerly-menu-list">
                            @forelse($data['brands'] as $brand)
                                <li>
                                    <a href="{{ route('page.catalog', ['sex' => Cookie::has('sex') ? Cookie::get('sex') : 'female', 'category' => $brand]) }}">
                                        {{ $brand }}
                                    </a>
                                </li>
                            @empty
                                <li>-</li>
                            @endforelse
                        </ul>
                    </div>
                </div>
                <div class="brands-recommendations">
                    <div class="br-list flex"></div>
                </div>
                @endhandheld
            </div>
        </div>

        @handheld
        <div class="container categories">
            @if((session('sex') == 'female'))
                <div class="swiper-slide">
                    <div class="category {{ (session('sex') === 'male') ? 'active' : '' }}">
                        <a href="{{ route('page.index', 'male') }}">
                            <div class="cat-holder">
                                <img src="{{ asset('i/categories/index/man-mobile.jpg') }}" alt="{{ __('Для него') }}">
                                <span class="text">{{ __('Для него') }}</span>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="category {{ (session('sex') === 'kids') ? 'active' : '' }}">
                        <a href="{{ route('page.index', 'kids') }}">
                            <div class="cat-holder">
                                <img src="{{ url('i/categories/index/kids-mobile.jpg') }}" alt="{{ __('Детям') }}">
                                <span class="text">{{ __('Детям') }}</span>
                            </div>
                        </a>
                    </div>
                </div>
            @elseif((session('sex') == 'male'))
                <div class="swiper-slide">
                    <div class="category {{ (session('sex') === 'female') ? 'active' : '' }}">
                        <a href="{{ route('page.index', 'female') }}">
                            <div class="cat-holder">
                                <img src="{{ url('i/categories/index/woman-mobile.jpg') }}" alt="{{ __('Для неё') }}">
                                <span class="text">{{ __('Для неё') }}</span>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="category {{ (session('sex') === 'kids') ? 'active' : '' }}">
                        <a href="{{ route('page.index', 'kids') }}">
                            <div class="cat-holder">
                                <img src="{{ url('i/categories/index/kids-mobile.jpg') }}" alt="{{ __('Детям') }}">
                                <span class="text">{{ __('Детям') }}</span>
                            </div>
                        </a>
                    </div>
                </div>
            @elseif((session('sex') == 'kids'))
                <div class="swiper-slide">
                    <div class="category {{ (session('sex') === 'female') ? 'active' : '' }}">
                        <a href="{{ route('page.index', 'female') }}">
                            <div class="cat-holder">
                                <img src="{{ url('i/categories/index/woman-mobile.jpg') }}" alt="{{ __('Для неё') }}">
                                <span class="text">{{ __('Для неё') }}</span>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="category {{ (session('sex') === 'male') ? 'active' : '' }}">
                        <a href="{{ route('page.index', 'male') }}">
                            <div class="cat-holder">
                                <img src="{{ url('i/categories/index/man-mobile.jpg') }}" alt="{{ __('Для него') }}">
                                <span class="text">{{ __('Для него') }}</span>
                            </div>
                        </a>
                    </div>
                </div>
            @endif
        </div>
        @elsehandheld
        <div class="container categories">
            <div class="category {{ (session('sex') === 'female') ? 'active' : '' }}">
                <a href="{{ route('page.index', 'female') }}">
                    <div class="cat-holder">
                        <img src="{{ asset('i/categories/index/woman-1.jpg') }}" class="cat-img" alt="{{ __('Для неё') }}">
                        <span class="text">{{ __('Для неё') }}</span>
                    </div>
                </a>
            </div>
            <div class="category {{ (session('sex') === 'male') ? 'active' : '' }}">
                <a href="{{ route('page.index', 'male') }}">
                    <div class="cat-holder">
                        <img src="{{ asset('i/categories/index/man-1.jpg') }}" class="cat-img" alt="{{ __('Для него') }}">
                        <span class="text">{{ __('Для него') }}</span>
                    </div>
                </a>
            </div>
            <div class="category {{ (session('sex') === 'kids') ? 'active' : '' }}">
                <a href="{{ route('page.index', 'kids') }}">
                    <div class="cat-holder">
                        <img src="{{ url('i/categories/index/kids.jpg') }}" class="cat-img" alt="{{ __('Детям') }}">
                        <span class="text">{{ __('Детям') }}</span>
                    </div>
                </a>
            </div>
        </div>
        @endhandheld

        <x-section-collections
            :section="$data['sectionСollections']" />

        <x-carousel-list
            :title="$rename_categoryLocaled"
            :button="__('Посмотреть все товары')"
            link="{{ route('page.zhannas_choice') }}"
            :list="$data['zhannaChoice']" />


        <div class="container banners">
            @handheld
            @foreach($data['banners'] as $banner)
                <a href="{{ $banner->link }}">
                    <img src="{{ url('i/'. $banner->m_image) }}" alt="">
                </a>
            @endforeach
            @elsehandheld
            @foreach($data['banners'] as $banner)
                <a href="{{ $banner->link }}">
                    <img src="{{ url('i/'. $banner->image) }}" alt="">
                </a>
            @endforeach
            @endhandheld
        </div>

        @include('partials.social_brands')
    </div>
@stop
