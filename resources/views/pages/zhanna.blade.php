@extends('layouts.theme')

@php
    $currentLanguage = app()->getLocale() ?? 'ru';

    $rename_categoryJson = File::get(database_path('files/catalog-rename-category.json'));
    $rename_categoryLocaled = json_decode($rename_categoryJson, true)[$currentLanguage]
@endphp

@section('title', $rename_categoryLocaled)

@section('content')
    <div class="catalog-page">
        <div class="container">

            <div class="catalog-top flex item-center space-between">
                <div class="breadcrumbs">
                    <ul>
                        <li><a href="{{ route('page.index') }}">{{ __('Главная') }}</a></li>
                        <li><a href="#">{{ $rename_categoryLocaled }}</a></li>
                    </ul>
                </div>
{{--                <div class="dropdown sorting">--}}
{{--                    <a href="#" class="element link flex">{{ __('Сортировать') }} <img src="{{ url('i/icons/arrow-down-sort.svg') }}" alt=""></a>--}}
{{--                    <div class="droppable right">--}}
{{--                        <p><a href="#">{{ __('Популярное') }}</a></p>--}}
{{--                        <p><a href="#">{{ __('Новинки') }}</a></p>--}}
{{--                        <p><a href="#">{{ __('Цена по убыванию') }}</a></p>--}}
{{--                        <p><a href="#">{{ __('Цена по возрастанию') }}</a></p>--}}
{{--                    </div>--}}
{{--                </div>--}}
            </div>

            <div class="catalog-middle">
                <div class="filters-list"></div>
                <div class="content">
                    <div class="products-list">
                        @foreach($products as $product)
                            <x-product-item :product="$product->product"/>
                        @endforeach
                    </div>
                </div>
            </div>

            <x-carousel-list
                title="{!! __('Лучшее в линейке ' . $data['choice']['brand']) !!}"
                button="{!! __('Посмотреть все лучшие товары') !!}"
                link="{{ route('page.catalog', ['sex' => Cookie::has('sex') ? Cookie::get('sex') : 'female', 'category' => $data['choice']['brand'], 'sorting' => 'new']) }}"
                :list="$data['choice']" />
        </div>
    </div>
@stop

@section('modal')
    <div class="remodal product-mini-modal" data-remodal-id="product-show" data-remodal-options="hashTracking: false">
        <button data-remodal-action="close" class="remodal-close"></button>
        <div class="inner-content"></div>
    </div>
@stop
