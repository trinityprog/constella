@foreach($news->skip(1) as $new)
    <div class="banner">
        <img src="{{ $new->imagePath }}" class="banner-img" alt="">
        <img src="{{ $new->logoPath }}" class="banner-logo" alt="">
        @if(Config::get('app.locale') == 'en')
            <div class="banner-title">{{ $new->title_en }}</div>
            <div class="banner-text">{!! Str::limit($new->text_1_en, 100, ' . .') !!}</div>
        @elseif(Config::get('app.locale') == 'kz')
            <div class="banner-title">{{ $new->title_kz }}</div>
            <div class="banner-text">{!! Str::limit($new->text_1_kz, 100, ' . .') !!}</div>
        @else
            <div class="banner-title">{{ $new->title }}</div>
            <div class="banner-text">{!! Str::limit($new->text_1, 100, ' . .') !!}</div>
        @endif
        <a href="{{ route('about.new_page', $new->id) }}" class="banner-link">
            {{ __('Подробнее') }}
            <svg width="109" height="1" viewBox="0 0 109 1" fill="none" xmlns="http://www.w3.org/2000/svg">
                <line y1="0.7" x2="109" y2="0.7" stroke="#272727" stroke-width="0.6"/>
                <line y1="0.7" x2="109" y2="0.7" stroke="url(#paint0_linear_1989_32810)" stroke-width="0.6"/>
                <defs>
                    <linearGradient id="paint0_linear_1989_32810" x1="0" y1="1.99997" x2="109" y2="1.99997" gradientUnits="userSpaceOnUse">
                        <stop offset="0.00887161" stop-color="#272727"/>
                        <stop offset="0.505208"/>
                        <stop offset="0.995112" stop-color="#FAFAFA"/>
                    </linearGradient>
                </defs>
            </svg>
        </a>
    </div>
@endforeach
