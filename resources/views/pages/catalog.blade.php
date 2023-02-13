@extends('layouts.theme')

@if(isset($data['seo']))
    @section('title', $data['seo']->title ?? 'Каталог')
    @section('seo_description', $data['seo']->seo_description ?? '')
    @section('keywords', $data['seo']->keywords ?? '')
@endif

@section('content')
    <div class="catalog-page">
        <div class="container">
            @handheld
            @if(route('page.catalog', ['sex' => Cookie::has('sex') ? Cookie::get('sex') : 'female', 'category' => $data['brand']->name ?? '']))
                @if(!empty($data['brand']->logo) && !empty($data['brand']->description))
                    <div class="about-brand">
                        <div class="about-brand-drop dropdown-list mobile-slideover">
                            <img src="{{ url('i/'. $data['brand']->logo) }}" class="about-logo" alt="">
                            <p class="about-brand-title">
                                {{ __('О бренде') }}
                                <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M6.3221 5.33519V1.2833C6.3221 0.916755 6.02442 0.619079 5.65729 0.618495C5.28958 0.618495 4.9919 0.916171 4.9919 1.28389L4.9919 5.33578L0.940596 5.33519C0.572879 5.33519 0.275204 5.63287 0.275788 6C0.275788 6.36772 0.573463 6.66539 0.940596 6.66481L4.99248 6.66481L4.99248 10.7167C4.99248 11.0844 5.28958 11.3815 5.65729 11.3815C5.84115 11.3821 6.00692 11.3074 6.12715 11.1871C6.24739 11.0669 6.3221 10.9011 6.3221 10.7167L6.3221 6.66598L10.3734 6.66539C10.5573 6.66598 10.7236 6.59068 10.8438 6.47044C10.9641 6.35021 11.0388 6.18444 11.0388 6C11.0382 5.63287 10.7411 5.33578 10.374 5.33519H6.3221Z" fill="#C7C7C7"/>
                                </svg>
                            </p>
                        </div>
                        <div class="slidedown-element about-brand-dropdown none">
                            <img src="{{ url('i/'.$data['brand']->image) }}" class="about-banner" alt="">
                            <div class="about-brand-info">
                                <img src="{{ url('i/'. $data['brand']->logo) }}" class="about-logo-1" alt="">
                                <p class="about-brand-info__text">{{ $data['brand']->description }}</p>
                            </div>
                        </div>
                    </div>
                @endif
            @endif
            @elsehandheld
            @if(route('page.catalog', ['sex' => Cookie::has('sex') ? Cookie::get('sex') : 'female', 'category' => $data['brand']->name ?? '']))
                @if(!empty($data['brand']->logo) && !empty($data['brand']->description))
                    <div class="about-brand">
                        <div class="about-brand-info">
                            <img src="{{ url('i/'. $data['brand']->logo) }}" class="about-logo" alt="">
                            <p class="about-brand-info__text">{{ $data['brand']->description }}</p>
                        </div>
                        <div class="about-brand-banner">
                            <img src="{{ url('i/'.$data['brand']->image) }}" class="about-banner" alt="">
                        </div>
                    </div>
                @endif
            @endif
            @endhandheld

            <div class="catalog-top flex item-center space-between">
                <div class="breadcrumbs">
                    <ul>
                        @foreach($data['breadcrumbs'] as $name => $url)
                            <li><a href="{{ $url }}">{{ $name }}</a></li>
                        @endforeach
                    </ul>
                </div>
                <div class="dropdown sorting">
                    <a href="#" class="element link flex">{{ __('Сортировать') }} <img src="{{ url('i/icons/arrow-down-sort.svg') }}" alt=""></a>
                    <div class="droppable right catalog-sorting">
                        <p><a href="#" data-sort="popular">{{ __('Популярное') }}</a></p>
                        <p><a href="#" data-sort="new">{{ __('Новинки') }}</a></p>
                        <p><a href="#" data-sort="price-down">{{ __('Цена по убыванию') }}</a></p>
                        <p><a href="#" data-sort="price-up">{{ __('Цена по возрастанию') }}</a></p>
                    </div>
                </div>
            </div>

            <div class="catalog-middle">
                <div class="filters-list">
                    @if(isset($data['filters']) && count($data['filters']) > 1)
                        @foreach($data['filters'] as $type => $filter)
                            @if($filter['type'] == 'color')<x-filter-color :slug="$filter['slug']" :type="$filter['name']" :data="$filter['data']" />@endif
                            @if($filter['type'] == 'list')<x-filter-list :slug="$filter['slug']" :type="$filter['name']" :data="$filter['data']" />@endif
                            @if($filter['type'] == 'price')<x-filter-price :type="$filter['name']" :data="$filter['data']" />@endif
                        @endforeach
                    @endif
                </div>

                <div class="content">
                    @handheld
                        <div class="dropdown products-sorting">
                            <div class="sorting-filters">
                                <a href="#filters" class="sorting-filters__title">
                                    {{ __('ФИЛЬТРЫ') }}
                                </a>
                                <a href="#sorting" class="sorting-filters__title">{{ __('СОРТИРОВАТЬ') }}</a>
                            </div>
                        </div>
                    @endhandheld

                    <div class="seo">
                        <h1>{{ $data['seo']->H1 ?? '' }}</h1>
{{--                        <p>{{ $data['seo']->H1_seo_text ?? '' }}</p>--}}
                    </div>

                    <div class="products-list">
                        @forelse($data['products'] as $product)
                            <x-product-item :product="$product"/>
                        @empty
                            <p class="empty">{{ __('Нет товаров') }}</p>
                        @endforelse
                    </div>
                    @handheld
                    @if($data['products']->total() > \App\Services\CatalogPageService::PAGINATION_SIZE)
                        <div class="pagination-container">
                            <a href="#" class="go-up">{{ __('НАВЕРХ') }}</a>
                            {{ $data['products']->appends(request()->all())->onEachSide(0)->links() }}
                        </div>
                    @endif
                    @elsehandheld
                    @if($data['products']->total() > \App\Services\CatalogPageService::PAGINATION_SIZE)
                        <div class="pagination-container">
                            <a href="#" class="gotop"><img src="{{ url('i/icons/arrow-down-sort.svg') }}">{{ __('Вернуться в начало') }}</a>
                            {{ $data['products']->appends(request()->all())->onEachSide(2)->links() }}
                        </div>
                    @endif
                    @endhandheld
                </div>
            </div>

            <x-section-collections
                :section="$data['sectionСollections']" />

            <x-carousel-list
                title="{!! __('Лучшее в линейке ' . $data['choice']['brand']) !!}"
                button="{!! __('Посмотреть все лучшие товары') !!}"
                link="{{ route('page.catalog', ['sex' => Cookie::has('sex') ? Cookie::get('sex') : 'female', 'category' => $data['choice']['brand'], 'sorting' => 'new']) }}"
                :list="$data['choice']" />


            <div class="seo">
                <div class="dropdown-list seo-title">
                    <h2>{{ $data['seo']->H2 ?? '' }}</h2>
                    @if(isset($data['seo']->H2))
                        <span id="seo-dropdown">{!! __('Подробнее') !!}</span>
                    @endif
                </div>

                <div class="seo-slidedown-element slidedown-element">
                    <div class="seo-info">
                        <p>
                            {{ $data['seo']->H2_seo_text ?? '' }}
                        </p>
                    </div>

                    <div class="seo-info">
                        <div class="seo-title">
                            <h3>{{ $data['seo']->H3 ?? '' }}</h3>
                        </div>
                        <p>
                            {{ $data['seo']->H3_seo_text ?? '' }}
                        </p>
                    </div>

                    <div class="seo-info">
                        <div class="seo-title">
                            <h3>{{ $data['seo']->H4 ?? '' }}</h3>
                        </div>
                        <p>
                            {{ $data['seo']->H4_seo_text ?? '' }}
                        </p>
                    </div>

                    <div class="seo-info">
                        <div class="seo-title">
                            <h3>{{ $data['seo']->H5 ?? '' }}</h3>
                        </div>
                        <p>
                            {{ $data['seo']->H5_seo_text ?? '' }}
                        </p>
                    </div>

                    <div class="seo-info">
                        <div class="seo-title">
                            <h3>{{ $data['seo']->H6 ?? '' }}</h3>
                        </div>
                        <p>
                            {{ $data['seo']->H6_seo_text ?? '' }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('modal')
    <div class="remodal" data-remodal-id="filters">
        <div class="filters-head">
            <p class="title">{{ __('ФИЛЬТРЫ') }}</p>
            <button data-remodal-action="close" class="remodal-close"></button>
        </div>
        <div class="modal-body">
            <div class="filters-list">
                @if(isset($data['filters']) && count($data['filters']) > 1)
                    @foreach($data['filters'] as $type => $filter)
                        @if($filter['type'] == 'color')<x-filter-color :slug="$filter['slug']" :type="$filter['name']" :data="$filter['data']" />@endif
                        @if($filter['type'] == 'list')<x-filter-list :slug="$filter['slug']" :type="$filter['name']" :data="$filter['data']" />@endif
                        @if($filter['type'] == 'price')<x-filter-price :type="$filter['name']" :data="$filter['data']" />@endif
                    @endforeach
                @endif
            </div>
            <div class="filters-footer">
                <div class="drop-filters">
                    <svg width="8" height="8" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M6.00015 4.58926L1.7027 0.291588C1.31394 -0.0971957 0.682504 -0.0971957 0.292501 0.291588C-0.0975011 0.681611 -0.0975011 1.31308 0.292501 1.7031L4.58996 6.00077L0.292502 10.2972C-0.0975006 10.6872 -0.0975006 11.3187 0.292502 11.7075C0.682504 12.0975 1.31394 12.0975 1.7027 11.7075L6.00015 7.40981L10.2976 11.7075C10.6876 12.0975 11.3178 12.0975 11.7078 11.7075C11.9034 11.5131 12 11.258 12 11.003C12 10.7479 11.9034 10.4928 11.7078 10.2972L7.41159 6.00077L11.7078 1.7031C11.9034 1.50871 12 1.25241 12 0.997343C12 0.742281 11.9034 0.487218 11.7078 0.291587C11.3178 -0.0971961 10.6876 -0.0971961 10.2976 0.291587L6.00015 4.58926Z" fill="#2E3338"/>
                    </svg>
                    <a href="{{ url()->current() . '' }}" class="">{{ __('СБРОСИТЬ ФИЛЬРЫ') }}</a>
                </div>
                <button type="button" data-remodal-action="close" class="btn-black">{{ __('ПОКАЗАТЬ РЕЗУЛЬТАТЫ') }}</button>
            </div>
        </div>
    </div>

    <div class="remodal" data-remodal-id="sorting">
        <div class="sorting-head">
            <p class="title">{{ __('СОРТИРОВАТЬ') }}</p>
            <button data-remodal-action="close" class="remodal-close"></button>
        </div>
        <div class="modal-body">
            <div class="catalog-sorting">
                <p><a href="#"  data-sort="popular">{{ __('Популярное') }}</a></p>
                <p><a href="#" data-sort="new">{{ __('Новинки') }}</a></p>
                <p><a href="#" data-sort="price-down">{{ __('Цена по убыванию') }}</a></p>
                <p><a href="#" data-sort="price-up">{{ __('Цена по возрастанию') }}</a></p>
            </div>
        </div>
    </div>
@endsection
