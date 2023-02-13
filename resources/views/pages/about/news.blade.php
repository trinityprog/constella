@extends('layouts.theme')

@section('title', 'События')

@section('content')
    @handheld
    <h1 class="news-title">{{ __('События') }}</h1>
    @foreach($news as $new)
        <div class="banner">
            <div class="banner-images">
                <a href="{{ route('about.new_page', $new->id) }}">
                    <img src="{{ $new->bannerPath }}" class="banner-img" alt="">
                </a>
                <img src="{{ $new->logoPath }}" class="banner-logo" alt="">
                @if(Config::get('app.locale') == 'en')
                    <div class="banner-title">{{ $new->title_en }}</div>
                @elseif(Config::get('app.locale') == 'kz')
                    <div class="banner-title">{{ $new->title_kz }}</div>
                @else
                    <div class="banner-title">{{ $new->title }}</div>
                @endif
            </div>
        </div>
    @endforeach
    @elsehandheld
    <div class="news-page">
        @if($news->count() > 0)
            <div class="main-banner">
                <img src="{{ $news->first()->imagePath }}" class="banner-img" alt="">
                <div class="banner-info">
                    <img src="{{ $news->first()->logoPath }}" alt="">
                    @if(Config::get('app.locale') == 'en')
                        <div class="title-1">{{ $news->first()->title_en }}</div>
                    @elseif(Config::get('app.locale') == 'kz')
                        <div class="title-1">{{ $news->first()->title_kz }}</div>
                    @else
                        <div class="title-1">{{ $news->first()->title }}</div>
                    @endif
                    <a href="{{ route('about.new_page', $news->first()->id) }}" class="banner-link">
                        {{ __('Подробнее') }}
                        <svg width="198" height="1" viewBox="0 0 198 1" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <line y1="0.7" x2="198" y2="0.7" stroke="#272727" stroke-width="0.6"/>
                            <line y1="0.7" x2="198" y2="0.7" stroke="url(#paint0_linear_1989_32804)" stroke-width="0.6"/>
                            <defs>
                                <linearGradient id="paint0_linear_1989_32804" x1="0" y1="1.99997" x2="198" y2="1.99997" gradientUnits="userSpaceOnUse">
                                    <stop offset="0.00887161" stop-color="#FAFAFA"/>
                                    <stop offset="0.505208"/>
                                    <stop offset="0.995112" stop-color="#FAFAFA"/>
                                </linearGradient>
                            </defs>
                        </svg>
                    </a>
                </div>
            </div>
        @endif
        @if($news->count() > 1)
            <div class="banners">
                @include('pages.about.data')
            </div>
        @endif
        <a href="#" class="btn-black" id="load-more">
            {{ __('БОЛЬШЕ СОБЫТИЙ') }}
        </a>
    </div>
    @endhandheld
@endsection
