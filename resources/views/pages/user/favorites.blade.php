@extends('layouts.theme')

@section('title', 'Избранное')

@section('content')
    <div class="catalog-page profile-page favorites">
        <div class="container">

            @handheld
            <div class="profile-page favorites">
                <div class="container">
                    <p class="title-1"><img src="{{ url('i/icons/heart.svg') }}" class="heart-icon">
                        {{ __('Избранное') }} {{ $favorites->count() }}
                        <svg width="13" height="7" viewBox="0 0 13 7" fill="none" xmlns="http://www.w3.org/2000/svg" class="img">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M0.271972 0.256282C0.634602 -0.0854272 1.22254 -0.0854272 1.58517 0.256282L6.5 4.88756L11.4148 0.256282C11.7775 -0.0854272 12.3654 -0.0854272 12.728 0.256282C13.0907 0.59799 13.0907 1.15201 12.728 1.49372L7.1566 6.74372C6.79397 7.08543 6.20603 7.08543 5.8434 6.74372L0.271972 1.49372C-0.0906574 1.15201 -0.0906574 0.59799 0.271972 0.256282Z" fill="#C7C7C7"/>
                        </svg>
                    </p>
                </div>
            </div>
            @elsehandheld
            <div class="heads">
                <p class="title flex item-center space-center">
                    <img src="{{ url('i/icons/r-b-heart.svg') }}" alt="">
                    {{ __('Избранные товары') }}
                    {{ $favorites->count() }}
                </p>
            </div>
            @endhandheld

            <div class="catalog-middle">
                <div class="content">
                    <div class="flex">
                        <div class="dropdown sorting">
                            <a href="#" class="element link flex">{{ __('Уточнить') }} @desktop<img src="{{ url('i/icons/arrow-down-sort.svg') }}" alt="">@enddesktop</a>
                            <div class="droppable right catalog-sorting">
                                <p><a href="#" data-sort="jewelry">{{ __('Ювелирные изделия') }}</a></p>
                                <p><a href="#" data-sort="clothing">{{ __('Одежда') }}</a></p>
                                <p><a href="#" data-sort="underwear">{{ __('Нижнее белье') }}</a></p>
                                <p><a href="#" data-sort="for-home">{{ __('Для дома') }}</a></p>
                            </div>
                        </div>
                        <div class="dropdown sorting">
                            <a href="#" class="element link flex">{{ __('Сортировать') }} @desktop<img src="{{ url('i/icons/arrow-down-sort.svg') }}" alt="">@enddesktop</a>
                            <div class="droppable right catalog-sorting">
                                <p><a href="#" data-sort="new">{{ __('Недавно добавленные') }}</a></p>
                                <p><a href="#" data-sort="price-down">{{ __('Цена по убыванию') }}</a></p>
                                <p><a href="#" data-sort="price-up">{{ __('Цена по возрастанию') }}</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="products-list">
                        @forelse($favorites as $product)
                            <x-favorite-product :product="$product"/>
                        @empty
                            <p class="empty">{{ __('Нет товаров') }}</p>
                        @endforelse
                    </div>
                    @if($favorites->count() > 12)
                        <div class="pagination-container">
                            <a href="#" class="gotop"><img src="{{ url('i/icons/arrow-down-sort.svg') }}">{{ __('Вернуться в начало') }}</a>
                            {{ $favorites->appends(request()->all())->onEachSide(2)->links() }}
                        </div>
                    @endif
                </div>
            </div>

            {{--            <div class="new-collection">--}}
            {{--                <div class="container">--}}
            {{--                    <h2>Лучшие коллекции Zardozi</h2>--}}

            {{--                    <div class="collection-list flex item-center">--}}
            {{--                        @foreach($data['newCollection'] as $i => $brand)--}}
            {{--                            <div class="collection-item {{ ($i == 0) ? 'first' : '' }}">--}}
            {{--                                @if($i == 0)--}}
            {{--                                    <a href="#"><img src="{{ url('i/new-collection.jpg') }}" alt=""></a>--}}
            {{--                                @else--}}
            {{--                                    <div class="inner">--}}
            {{--                                        <div class="col-logo" style="background-image: url('{{ url('i/logos/'. $brand['logo']) }}');"></div>--}}
            {{--                                        <div class="col-description">--}}
            {{--                                            <p class="col-de">Коллекция</p>--}}
            {{--                                            <p class="col-ne">{!! $brand['name'] !!}</p>--}}
            {{--                                            <span class="col-eye"></span>--}}
            {{--                                        </div>--}}
            {{--                                    </div>--}}
            {{--                                @endif--}}
            {{--                            </div>--}}
            {{--                        @endforeach--}}
            {{--                    </div>--}}
            {{--                </div>--}}
            {{--            </div>--}}

        </div>
    </div>


{{--            <div class="favorites-sort">--}}
{{--                <div class="catalog-top flex item-center">--}}
{{--                    <div class="dropdown sorting lefted">--}}
{{--                        <a href="#" class="element link flex sort">{{ __('Уточнить') }}</a>--}}
{{--                        <div class="droppable">--}}
{{--                            <p><a href="#">{{ __('Популярное') }}</a></p>--}}
{{--                            <p><a href="#">{{ __('Новинки') }}</a></p>--}}
{{--                            <p><a href="#">{{ __('Цена по убыванию') }}</a></p>--}}
{{--                            <p><a href="#">{{ __('Цена по возрастанию') }}</a></p>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="dropdown sorting lefted">--}}
{{--                        <a href="#" class="element link flex sort">{{ __('Сортировать') }}</a>--}}
{{--                        <div class="droppable">--}}
{{--                            <p><a href="#">{{ __('Популярное') }}</a></p>--}}
{{--                            <p><a href="#">{{ __('Новинки') }}</a></p>--}}
{{--                            <p><a href="#">{{ __('Цена по убыванию') }}</a></p>--}}
{{--                            <p><a href="#">{{ __('Цена по возрастанию') }}</a></p>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="favorites-list slidedown-element">--}}
{{--                <div class="favorites-item">--}}
{{--                    <button type="button">--}}
{{--                        <svg width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">--}}
{{--                            <path d="M6.10138 5L9.84024 1.26073C9.94309 1.1578 9.99984 1.02047 10 0.874041C10 0.727527 9.94325 0.590038 9.84024 0.487267L9.5126 0.159685C9.40959 0.0565078 9.27228 0 9.12569 0C8.97935 0 8.84203 0.0565078 8.73902 0.159685L5.00016 3.89871L1.26114 0.159685C1.15829 0.0565078 1.02089 0 0.87439 0C0.728049 0 0.59065 0.0565078 0.487805 0.159685L0.16 0.487267C-0.0533333 0.700615 -0.0533333 1.04763 0.16 1.26073L3.89894 5L0.16 8.73911C0.0570732 8.8422 0.000406504 8.97953 0.000406504 9.12596C0.000406504 9.27239 0.0570732 9.40972 0.16 9.51273L0.487724 9.84031C0.590569 9.94341 0.728049 10 0.874309 10C1.02081 10 1.15821 9.94341 1.26106 9.84031L5.00008 6.10121L8.73894 9.84031C8.84195 9.94341 8.97927 10 9.12561 10H9.12577C9.2722 10 9.40951 9.94341 9.51252 9.84031L9.84016 9.51273C9.94301 9.4098 9.99976 9.27239 9.99976 9.12596C9.99976 8.97953 9.94301 8.8422 9.84016 8.73919L6.10138 5Z" fill="#B7B7B7"/>--}}
{{--                        </svg>--}}
{{--                    </button>--}}
{{--                    <img src="{{ asset('/i/zhanna/2.jpg') }}" class="img" alt="">--}}
{{--                    <p class="favorites-title">D.Side <span>Ring</span></p>--}}
{{--                    <p class="favorites-price">$ 800</p>--}}
{{--                </div>--}}
{{--                <div class="favorites-item">--}}
{{--                    <button type="button">--}}
{{--                        <svg width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">--}}
{{--                            <path d="M6.10138 5L9.84024 1.26073C9.94309 1.1578 9.99984 1.02047 10 0.874041C10 0.727527 9.94325 0.590038 9.84024 0.487267L9.5126 0.159685C9.40959 0.0565078 9.27228 0 9.12569 0C8.97935 0 8.84203 0.0565078 8.73902 0.159685L5.00016 3.89871L1.26114 0.159685C1.15829 0.0565078 1.02089 0 0.87439 0C0.728049 0 0.59065 0.0565078 0.487805 0.159685L0.16 0.487267C-0.0533333 0.700615 -0.0533333 1.04763 0.16 1.26073L3.89894 5L0.16 8.73911C0.0570732 8.8422 0.000406504 8.97953 0.000406504 9.12596C0.000406504 9.27239 0.0570732 9.40972 0.16 9.51273L0.487724 9.84031C0.590569 9.94341 0.728049 10 0.874309 10C1.02081 10 1.15821 9.94341 1.26106 9.84031L5.00008 6.10121L8.73894 9.84031C8.84195 9.94341 8.97927 10 9.12561 10H9.12577C9.2722 10 9.40951 9.94341 9.51252 9.84031L9.84016 9.51273C9.94301 9.4098 9.99976 9.27239 9.99976 9.12596C9.99976 8.97953 9.94301 8.8422 9.84016 8.73919L6.10138 5Z" fill="#B7B7B7"/>--}}
{{--                        </svg>--}}
{{--                    </button>--}}
{{--                    <img src="{{ asset('/i/zhanna/2.jpg') }}" class="img" alt="">--}}
{{--                    <p class="favorites-title">D.Side <span>Ring</span></p>--}}
{{--                    <p class="favorites-price">$ 800</p>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            @include('partials.user_support', ['withLoyalty' => true])--}}

@stop


