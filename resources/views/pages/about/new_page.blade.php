@extends('layouts.theme')

@section('title', 'События')

@section('content')
    @handheld
    <a href="{{ route('about.news') }}" class="all-news">
        <svg width="17" height="14" viewBox="0 0 17 14" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M1 7L0.646447 6.64645L0.292893 7L0.646447 7.35355L1 7ZM15.9783 7.5C16.2545 7.5 16.4783 7.27614 16.4783 7C16.4783 6.72386 16.2545 6.5 15.9783 6.5V7.5ZM6.64645 0.646447L0.646447 6.64645L1.35355 7.35355L7.35355 1.35355L6.64645 0.646447ZM0.646447 7.35355L6.64645 13.3536L7.35355 12.6464L1.35355 6.64645L0.646447 7.35355ZM1 7.5L15.9783 7.5V6.5L1 6.5V7.5Z" fill="#2E3338"/>
        </svg>
        {{ __('Все события') }}
    </a>
    <div class="banner">
        <div class="banner-images">
            <a href="{{ route('about.new_page', $new->id) }}">
                <img src="{{ $new->bannerPath }}" class="banner-img" alt="">
            </a>
            <img src="{{ $new->logoPath }}" class="banner-logo-1" alt="">
        </div>
        @if(Config::get('app.locale') == 'en')
            <div class="banner-title">{{ $new->title_en }}</div>
            <div class="news-info">
                <div>{!! $new->text_1_en !!}</div>
                <div>{!! $new->text_2_en !!}</div>
            </div>
        @elseif(Config::get('app.locale') == 'kz')
            <div class="banner-title">{{ $new->title_kz }}</div>
            <div class="news-info">
                <div>{!! $new->text_1_kz !!}</div>
                <div>{!! $new->text_2_kz !!}</div>
            </div>
        @else
            <div class="banner-title">{{ $new->title }}</div>
            <div class="news-info">
                <div>{!! $new->text_1 !!}</div>
                <div>{!! $new->text_2 !!}</div>
            </div>
        @endif
        @if(count($new->images) == 1)
            <img src="{{ $new->images->first()->imagePath }}" alt="">
        @elseif(count($new->images) >= 2)
            <div class="news-images">
                <img src="{{ $new->images[0]->imagePath }}" alt="">
                <img src="{{ $new->images[1]->imagePath }}" alt="">
            </div>
        @endif
        <div class="quote">{!! $new->quote !!}</div>
        @if(count($new->images) >= 3)
            <img src="{{ $new->images[2]->imagePath }}" class="bottom-img" alt="">
        @endif
    </div>
    <a href="{{ route('about.news') }}" class="all-news">
        <svg width="17" height="14" viewBox="0 0 17 14" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M1 7L0.646447 6.64645L0.292893 7L0.646447 7.35355L1 7ZM15.9783 7.5C16.2545 7.5 16.4783 7.27614 16.4783 7C16.4783 6.72386 16.2545 6.5 15.9783 6.5V7.5ZM6.64645 0.646447L0.646447 6.64645L1.35355 7.35355L7.35355 1.35355L6.64645 0.646447ZM0.646447 7.35355L6.64645 13.3536L7.35355 12.6464L1.35355 6.64645L0.646447 7.35355ZM1 7.5L15.9783 7.5V6.5L1 6.5V7.5Z" fill="#2E3338"/>
        </svg>
        {{ __('Все события') }}
    </a>
    @elsehandheld
    <div class="news-page">
        <div class="news-page__img">
            <img src="{{ $new->bannerPath }}" alt="">
        </div>
        @if(Config::get('app.locale') == 'en')
            <h1 class="title">{!! $new->title_en !!}</h1>
            @if($new->text_2_en != null)
                <div class="news-info">
                    <div class="text-1">{!! $new->text_1_en !!}</div>
                    <div class="text-2">{!! $new->text_2_en !!}</div>
                </div>
            @else
                <div>{!! $new->text_1_en !!}</div>
            @endif
        @elseif(Config::get('app.locale') == 'kz')
            <h1 class="title">{!! $new->title_kz !!}</h1>
            @if($new->text_2_kz != null)
                <div class="news-info">
                    <div class="text-1">{!! $new->text_1_kz !!}</div>
                    <div class="text-2">{!! $new->text_2_kz !!}</div>
                </div>
            @else
                <div>{!! $new->text_1_kz !!}</div>
            @endif
        @else
            <h1 class="title">{!! $new->title !!}</h1>
            @if($new->text_2 != null)
                <div class="news-info">
                    <div class="text-1">{!! $new->text_1 !!}</div>
                    <div class="text-2">{!! $new->text_2 !!}</div>
                </div>
            @else
                <div>{!! $new->text_1 !!}</div>
            @endif
        @endif
        @if(count($new->images) == 1)
            <img src="{{ $new->images->first()->imagePath }}" alt="">
        @elseif(count($new->images) >= 2)
            <div class="news-images">
                <img src="{{ $new->images[0]->imagePath }}" alt="">
                <img src="{{ $new->images[1]->imagePath }}" alt="">
            </div>
        @endif
        <div class="quote">{!! $new->quote !!}</div>

        @if(count($new->images) >= 3)
            <img src="{{ $new->images[2]->imagePath }}" class="under-quote-img" alt="">
        @endif

        <div class="image-gallery">
            @foreach($new->images->skip(3) as $images)
                <img src="{{ $images->imagePath }}" alt="">
            @endforeach
        </div>

        <a href="{{ route('about.news') }}" class="all-news">
            <svg width="34" height="14" viewBox="0 0 34 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M1 7L0.646447 6.64645L0.292893 7L0.646447 7.35355L1 7ZM33.5 7.5C33.7761 7.5 34 7.27614 34 7C34 6.72386 33.7761 6.5 33.5 6.5V7.5ZM6.64645 0.646447L0.646447 6.64645L1.35355 7.35355L7.35355 1.35355L6.64645 0.646447ZM0.646447 7.35355L6.64645 13.3536L7.35355 12.6464L1.35355 6.64645L0.646447 7.35355ZM1 7.5H33.5V6.5H1V7.5Z" fill="#757575"/>
            </svg>
            {{ __('Все события') }}
        </a>
    </div>
    @endhandheld
@endsection
