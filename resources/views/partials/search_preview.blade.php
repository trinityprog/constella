@php
    $types = Cache::get('types');
    $active = $types->where('slug', (session()->has('sex')) ? session('sex') : Cookie::get('sex'))->first();
    if(empty($active)) $active = $types->where('slug', 'female')->first();
    $active->load(['categories']);
@endphp
@if($count > 0)
    <p class="title">{{ __('Найдено в категориях') }}</p>

    @if(!empty($categories))
        <div class="search-found-cats">
            @foreach($categories as $category)
                <a href="{{ route('page.catalog', ['sex' => $active->slug, 'category' => $category->slug]) }}">{{ $category->name }}</a>
            @endforeach
            @foreach($menus as $category)
                <a href="{{ route('page.catalog', ['sex' => $category->category->type->slug, 'category' => $category->slug]) }}">{{ $category->name }}</a>
            @endforeach
        </div>
    @endif
@endif

@desktop
<div class="popular-results flex items-start space-center">
    @if($count > 0)
        <div class="block all">
            <a href="{{ route('page.catalog', ['sex' => $active->slug, 'category' => null, 'search' => request()->route()->parameter('q')]) }}">
                {!! __('Все результаты поиска') !!}
                <span>{{ $count }}</span>
            </a>
        </div>

        @foreach($products->take(5) as $product)
            <div class="block">
                <a href="{{ route('page.product', $product->slug) }}">
                    <img src="{{ $product->poster() }}" alt="" class="image">
                    @if($product->brandLogo)
                        <img src="{{ $product->brandLogo }}" alt="" class="brand-logo">
                    @else
                        <div class="brand-logo"></div>
                    @endif
                    <p>{{ $product->displayName() }}</p>
                </a>
            </div>
        @endforeach
    @else
        <p class="empty">{{ __('Ничего не найдено') }}</p>
    @endif
</div>
@enddesktop

@handheld
<div class="popular-results search-results">
    @if($count > 0)
        <div class="total-items">
            <a href="{{ route('page.catalog', ['sex' => null, 'category' => null, 'search' => request()->route()->parameter('q')]) }}">
                {{ __('Все результаты поиска-2') }}
                <span>{{ $count }}</span>
            </a>
        </div>

        @foreach($products->take(5) as $product)
            <div class="block">
                <a href="{{ route('page.product', $product->slug) }}">
                    <img src="{{ $product->poster() }}" alt="" class="image">
                    <p>{{ $product->displayName() }}</p>
                </a>
            </div>
        @endforeach
    @else
        <p class="empty">{{ __('Ничего не найдено') }}</p>
    @endif
</div>
@endhandheld
