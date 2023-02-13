@if(isset($list))
    <div class="zhanna-chose">
        <div class="container">
            @handheld
            <a class="zhanna-chose-title" href="{{ $link }}">{!! $title !!}</a>
            @elsehandheld
            <h2>{!! $title !!}</h2>
            @endhandheld
            <div class="chosen-list">
                @handheld
                <a href="{{ $link }}" class="btn-black chosen-btn">
                    {{ __('Перейти к товарам') }}
                    <svg width="35" height="14" viewBox="0 0 35 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M33.5 7.13867L33.8536 6.78512L34.2071 7.13867L33.8536 7.49223L33.5 7.13867ZM1 7.63867C0.723858 7.63867 0.5 7.41481 0.5 7.13867C0.5 6.86253 0.723858 6.63867 1 6.63867V7.63867ZM27.8536 0.785118L33.8536 6.78512L33.1464 7.49223L27.1464 1.49223L27.8536 0.785118ZM33.8536 7.49223L27.8536 13.4922L27.1464 12.7851L33.1464 6.78512L33.8536 7.49223ZM33.5 7.63867H1V6.63867H33.5V7.63867Z" fill="white"/>
                    </svg>
                </a>
                @elsehandheld
                <div class="chosen-item"><a href="{{ $link }}">{!! $button !!}</a></div>
                @endhandheld
                <div class="swiper-container zhanna">
                    <div class="swiper-wrapper">
                        @foreach($list['products'] as $product)
                            <div class="swiper-slide">
                                <div class="swiper-lazy-preloader"></div>
                                <p class="cat-text">{{ $product['category'] }}</p>
                                <a href="{{ $product['url'] }}">
                                    @if($product['image'])
                                        <img class="slide-image swiper-lazy" style="object-fit: contain;" data-src="{{ url($product['image']) }}">
                                    @else
                                        <img class="slide-image swiper-lazy" style="object-fit: contain;" data-src="{{ url('i/products/no-image.jpg') }}">
                                    @endif
                                </a>
                                <div class="product flex items-start space-between">
                                    <p class="product-title">{{ $product['title'] }}</p>
                                    <p class="product-price flex item-center">
                                        <x-price :price="$product['price']" :product-currency="$product['currency']['id']"/>
                                        <img src="{{ url('i/icons/dot.svg') }}" alt="">
                                    </p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif

{{--@if(isset($category))--}}
{{--    <div class="zhanna-chose">--}}
{{--        <div class="container">--}}
{{--            <h2>{!! $category->name !!}</h2>--}}
{{--            <div class="chosen-list">--}}
{{--                <div class="chosen-item"><a href="{{ $link }}">{!! $button !!}</a></div>--}}
{{--                <div class="swiper-container zhanna">--}}
{{--                    <div class="swiper-wrapper">--}}
{{--                        @foreach($list as $product)--}}
{{--                            <div class="swiper-slide">--}}
{{--                                <div class="swiper-lazy-preloader"></div>--}}
{{--                                <p class="cat-text">{{ $product['category'] }}</p>--}}
{{--                                <a href="{{ $product['url'] }}">--}}
{{--                                    @if($product['image'])--}}
{{--                                        <img class="slide-image swiper-lazy" style="object-fit: contain;" data-src="{{ url($product['image']) }}">--}}
{{--                                    @else--}}
{{--                                        <img class="slide-image swiper-lazy" style="object-fit: contain;" data-src="{{ url('i/products/no-image.jpg') }}">--}}
{{--                                    @endif--}}
{{--                                </a>--}}
{{--                                <div class="product flex items-start space-between">--}}
{{--                                    <p class="product-title">{{ $product['title'] }}</p>--}}
{{--                                    <p class="product-price flex item-center">--}}
{{--                                        <x-price :price="$product['price']"/>--}}
{{--                                        <img src="{{ url('i/icons/dot.svg') }}" alt="">--}}
{{--                                    </p>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        @endforeach--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--@endif--}}
