@inject('pinfo', 'App\Models\Product')

@extends('layouts.theme')

@if(isset($data['product']))
    @section('title', $data['product']->title ?? $data['product']->displayName())
    @section('seo_description', $data['product']->seo_description ?? '')
    @section('keywords', $data['product']->keywords ?? '')
@endif

@section('content')
<div class="product-page">
    <div class="container">

        <div class="product-more-top">
            {{--gallery--}}
            <div class="product-gallery">
                <a href="{{ url()->previous() }}" class="back-url-link">
                    <svg width="17" height="13" viewBox="0 0 17 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M1.04883 6.53809L0.695275 6.18453L0.341721 6.53809L0.695275 6.89164L1.04883 6.53809ZM16.0272 7.03809C16.3033 7.03809 16.5272 6.81423 16.5272 6.53809C16.5272 6.26194 16.3033 6.03809 16.0272 6.03809V7.03809ZM6.69527 0.184533L0.695275 6.18453L1.40238 6.89164L7.40238 0.891639L6.69527 0.184533ZM0.695275 6.89164L6.69527 12.8916L7.40238 12.1845L1.40238 6.18453L0.695275 6.89164ZM1.04883 7.03809L16.0272 7.03809V6.03809L1.04883 6.03809L1.04883 7.03809Z" fill="#2E3338"/>
                    </svg>
                </a>
                <div class="swiper-container main">
                    <div class="swiper-wrapper">
                        @forelse($data['images'] as $img)
                            @if(\Illuminate\Support\Facades\File::exists(public_path('i/products/images/'.$img->name)))
                                <div class="swiper-slide" data-color-attr="{{ $img->color }}"><img src="{{ url('i/products/images/'.$img->name) }}" alt="{{ $img->alt_tag ?? '' }}"></div>
                            @endif
                        @empty
                            <div class="swiper-slide" data-color-attr=""><img src="{{ url('i/products/no-image.jpg') }}" alt=""></div>
                        @endforelse
{{--                        <div class="swiper-slide"><img src="{{ $data['product']->poster() }}" alt="{{ $data['product']->poster_alt_tag() ?? '' }}"></div>--}}
{{--                        @if($data['images']->where('is_main', 0)->exists())--}}
{{--                            @foreach($data['images']->images->where('is_main', 0) as $img)--}}
{{--                                @if(\Illuminate\Support\Facades\File::exists(public_path('i/products/images/'.$img->name)))--}}
{{--                                    <div class="swiper-slide"><img src="{{ url('i/products/images/'.$img->name) }}" alt="{{ $img->alt_tag ?? '' }}"></div>--}}
{{--                                @endif--}}
{{--                            @endforeach--}}
{{--                        @endif--}}
                    </div>
                </div>
                <div thumbsSlider class="swiper-container thumbs">
                    <div class="swiper-wrapper">
                        @forelse($data['images'] as $img)
                            @if(\Illuminate\Support\Facades\File::exists(public_path('i/products/images/'.$img->name)))
                                <div class="swiper-slide" data-color-attr="{{ $img->color }}"><img src="{{ url('i/products/images/'.$img->name) }}" alt="{{ $img->alt_tag ?? '' }}"></div>
                            @endif
                        @empty
                            <div class="swiper-slide" data-color-attr=""><img src="{{ url('i/products/no-image.jpg') }}" alt=""></div>
                        @endforelse
{{--                        <div class="swiper-slide"><img src="{{ $data['product']->poster() }}" alt="{{ $data['product']->poster_alt_tag() ?? '' }}"></div>--}}
{{--                        @foreach($data['product']->images->where('is_main', 0) as $img)--}}
{{--                            @if(\Illuminate\Support\Facades\File::exists(public_path('i/products/images/'.$img->name)))--}}
{{--                                <div class="swiper-slide"><img src="{{ url('i/products/images/'.$img->name) }}" alt="{{ $img->alt_tag ?? '' }}"></div>--}}
{{--                            @endif--}}
{{--                        @endforeach--}}
                    </div>
                </div>
            </div>

            {{--product info--}}
            <div class="product-more-info carted">
                <div class="product-more-info__mobile">
                    @desktop
                    @if(auth()->check())
                        <a href="#" class="add-to-favorites {{ $data['product']->favorite()->exists() ? 'active' : '' }}" data-product="{{ $data['product']->id }}" data-user="{{ auth()->user()->id }}">
                            <svg width="22" height="21" viewBox="0 0 22 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M15.95 0C14.08 0 12.21 0.88 11 2.31C9.79 0.88 7.92 0 6.05 0C2.64 0 0 2.64 0 6.05C0 10.23 3.74 13.64 9.46 18.7L11 20.13L12.54 18.7C18.15 13.53 22 10.12 22 6.05C22 2.64 19.36 0 15.95 0ZM11.11 17.16H11L10.89 17.05C5.61 12.32 2.2 9.24 2.2 6.05C2.2 3.85 3.85 2.2 6.05 2.2C7.7 2.2 9.35 3.3 10.01 4.84H12.1C12.65 3.3 14.3 2.2 15.95 2.2C18.15 2.2 19.8 3.85 19.8 6.05C19.8 9.24 16.39 12.32 11.11 17.16Z" fill="#272727"/>
                                <path d="M8 16.0654L2 8.56543L1.5 5.06543L3 1.56543L5.5 1.06543L8.5 1.56543L10.5 3.56543H12L14.5 0.56543L17 1.56543L20 3.06543L21 6.06543L19 11.0654L11 18.5654L8 16.0654Z" fill="#272727" fill-opacity="0"/>
                            </svg>
                        </a>
                    @endif
                    @enddesktop

                    @if($data['product']->getCharacteristic('collection'))
                        <p class="some-text">{{ $data['product']->getCharacteristic('collection') }}</p>
                    @endif

                    <h1 class="name">{{ $data['product']->displayName() }}</h1>

                    <p class="price flex item-center">
                        <svg width="8" height="8" viewBox="0 0 8 8" fill="none" xmlns="http://www.w3.org/2000/svg"><circle cx="4" cy="4" r="4" fill="#2E3338"/></svg>
                        <x-price :price="$data['product']->price" :product-currency="$data['product']->currency_id" />
                    </p>

                    <div class="colors">
                        <p class="f-title">{{ __('Цвет') }} <span class="choosen-color"></span></p>
                        <div class="colors-list flex item-center">
                            @foreach($data['attributes']->colors as $color => $prod_id)
                                @php
                                    $c = App\Models\Color::where('name', $color)->first();
                                    if ($c) {
                                      $colorName = $c->getName();
                                      $colorStyle = $c->code;
                                    }else {
                                      $colorName = $color;
                                      $colorStyle = '#f5f5f5';
                                    }
                                @endphp
                                <a href="#" class="color-item"
                                   data-product-id="{{ $prod_id }}"
                                   data-cname="{{ $colorName }}"
                                   data-color="{{ $colorName }}"
                                   data-attr="{{ $color }}"
                                   style="background: {{ $colorStyle }};"
                                ></a>
                            @endforeach
                        </div>
                    </div>

                    @if($data['product']->brand == 'Geoma')
                        <div class="geoma">
                            <a href="{{ route('geoma') }}" class="flex item-center space-center">
                                <img src="{{ url('i/geoma.png') }}" alt="">
                            </a>
                        </div>
                    @endif

                    <div class="sizes">
                        <div class="flex space-between">
                            <p class="f-title">{{ __('Размер') }} <span class="choosen-size"></span></p>
{{--                            @if(\App\Models\SizeGuide::whereIn('menu_ids', [$data['product']->menu_id])->exists())--}}
                                <a href="#sizeguide" class="integration"><img src="{{ url('i/icons/ruler.svg') }}" alt="">{{ __('Гид по размерам') }}</a>
{{--                            @endif--}}
                        </div>
                        <div class="sizes-list">
                            <input type="hidden" name="sizes">
                            @foreach($data['attributes']->sizes as $size => $prod_id)
                                <a href="#"
                                   data-product-id="{{ $prod_id }}"
                                   data-size="{{ $size }}"
                                   data-sname="{{ $size }}"
                                   class="size-item">{{ $size }}
                                </a>
                            @endforeach
                        </div>
                    </div>
                    @handheld
                        <p class="vendor-code">#{{ $data['product']->vendor_code }}</p>
                    @endhandheld
                </div>

                @handheld
                <div class="actions flex column">
                    <div class="favorites-link relative flex align-items-center">
                        @if(auth()->check())
                            <a href="#" class="add-to-favorites {{ $data['product']->favorite()->exists() ? 'active' : '' }}" data-product="{{ $data['product']->id }}" data-user="{{ auth()->user()->id }}">
                                <svg width="22" height="21" viewBox="0 0 22 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M15.95 0C14.08 0 12.21 0.88 11 2.31C9.79 0.88 7.92 0 6.05 0C2.64 0 0 2.64 0 6.05C0 10.23 3.74 13.64 9.46 18.7L11 20.13L12.54 18.7C18.15 13.53 22 10.12 22 6.05C22 2.64 19.36 0 15.95 0ZM11.11 17.16H11L10.89 17.05C5.61 12.32 2.2 9.24 2.2 6.05C2.2 3.85 3.85 2.2 6.05 2.2C7.7 2.2 9.35 3.3 10.01 4.84H12.1C12.65 3.3 14.3 2.2 15.95 2.2C18.15 2.2 19.8 3.85 19.8 6.05C19.8 9.24 16.39 12.32 11.11 17.16Z" fill="#272727"/>
                                    <path d="M8 16.0654L2 8.56543L1.5 5.06543L3 1.56543L5.5 1.06543L8.5 1.56543L10.5 3.56543H12L14.5 0.56543L17 1.56543L20 3.06543L21 6.06543L19 11.0654L11 18.5654L8 16.0654Z" fill="#272727" fill-opacity="0"/>
                                </svg>
                            </a>
                        @endif
                        <a href="#" class="{{ ($data['product']->price == 0) ? 'disabled' : '' }} btn-black action-add-to-cart"
                           data-quantity="1"
                           data-product="{{ $data['product']->id }}">
                            {{ __('в корзину') }}
                        </a>
                    </div>
                    <div class="actions-list">
                        <a href="#recommend-product" class="recommend">
                            <img src="{{ url('i/icons/rec.svg') }}" alt="">
                            {{ __('Рекомендовать') }}
                        </a>
                        <div class="hint-gift">
                            <a href="#hint-gift" class="recommend">
                                <img src="{{ url('i/icons/gift-other.svg') }}" alt="">
                                {!! __('Намекнуть') !!}
                            </a>
                            <span class="info-tooltip">
                                <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M11 0C4.9346 0 0 4.93467 0 11.0001C0 17.0655 4.9346 22 11 22C17.0654 22 22 17.0655 22 11.0001C22 4.93467 17.0654 0 11 0ZM11 20C6.03733 20 2 15.9627 2 11.0001C2 6.03747 6.03733 2 11 2C15.9627 2 20 6.03747 20 11.0001C20 15.9627 15.9626 20 11 20Z" fill="#DCDCDC"/>
                                    <path d="M11.001 4.66797C10.266 4.66797 9.66797 5.26637 9.66797 6.0019C9.66797 6.73677 10.266 7.33464 11.001 7.33464C11.7361 7.33464 12.3341 6.73677 12.3341 6.0019C12.3341 5.26637 11.7361 4.66797 11.001 4.66797Z" fill="#5A5A5A"/>
                                    <path d="M11 9.33203C10.4477 9.33203 10 9.77976 10 10.332V16.332C10 16.8843 10.4477 17.332 11 17.332C11.5523 17.332 12 16.8843 12 16.332V10.332C12 9.77976 11.5523 9.33203 11 9.33203Z" fill="#5A5A5A"/>
                                </svg>
                            </span>
                            <div class="info-hint">
                                <p class="title flex item-center"><img src="{{ url('i/icons/gift.svg') }}" alt="">{!! __('Намекнуть о подарке') !!}</p>
                                <p class="description">{!! __('Намекнуть о подарке письмом') !!}</p>
                                <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 122.88 63.9" xml:space="preserve"><g><polygon class="st0" points="61.44,63.9 122.88,0 0,0 61.44,63.9"/></g></svg>
                            </div>
                        </div>
                    </div>
                </div>
                @endhandheld

                @desktop
                <div class="actions flex item-center space-between">
                    <div class="relative">
                        <a href="#" class="{{ ($data['product']->price == 0) ? 'disabled' : '' }} btn-black action-add-to-cart"
                           data-quantity="1"
                           data-product="{{ $data['product']->id }}">
                            {{ __('Добавить в корзину') }}
                        </a>
                        <p class="vendor">#{{ $data['product']->vendor_code }}</p>
                    </div>
                    <a href="#recommend-product" class="recommend">
                        <img src="{{ url('i/icons/rec.svg') }}" alt="">
                        {{ __('Рекомендовать') }}
                    </a>
                    <a href="#hint-gift" class="recommend">
                        <img src="{{ url('i/icons/gift-other.svg') }}" alt="">
                        {!! __('Намекнуть о подарке') !!}
                        <span class="info-tooltip">
                            <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M11 0C4.9346 0 0 4.93467 0 11.0001C0 17.0655 4.9346 22 11 22C17.0654 22 22 17.0655 22 11.0001C22 4.93467 17.0654 0 11 0ZM11 20C6.03733 20 2 15.9627 2 11.0001C2 6.03747 6.03733 2 11 2C15.9627 2 20 6.03747 20 11.0001C20 15.9627 15.9626 20 11 20Z" fill="#DCDCDC"/>
                                <path d="M11.001 4.66797C10.266 4.66797 9.66797 5.26637 9.66797 6.0019C9.66797 6.73677 10.266 7.33464 11.001 7.33464C11.7361 7.33464 12.3341 6.73677 12.3341 6.0019C12.3341 5.26637 11.7361 4.66797 11.001 4.66797Z" fill="#5A5A5A"/>
                                <path d="M11 9.33203C10.4477 9.33203 10 9.77976 10 10.332V16.332C10 16.8843 10.4477 17.332 11 17.332C11.5523 17.332 12 16.8843 12 16.332V10.332C12 9.77976 11.5523 9.33203 11 9.33203Z" fill="#5A5A5A"/>
                            </svg>
                        </span>
                        <div class="info-hint">
                            <p class="title flex item-center"><img src="{{ url('i/icons/gift.svg') }}" alt="">{!! __('Намекнуть о подарке') !!}</p>
                            <p class="description">{!! __('Намекнуть о подарке письмом') !!}</p>
                            <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 122.88 63.9" xml:space="preserve"><g><polygon class="st0" points="61.44,63.9 122.88,0 0,0 61.44,63.9"/></g></svg>
                        </div>
                    </a>
                </div>
                @enddesktop
            </div>
        </div>

        {{--details--}}
        <div class="product-more-middle">
            @handheld
                <div class="downs">
                    <div class="f-section">
                        <p class="dropdown-list mobile-slideover">{{ __('Описание') }} <img src="{{ url('i/icons/plus-footer.svg') }}" alt=""></p>
                        <div class="slidedown-element">
                            @if($data['product']->description)
                                <p>{{ $data['product']->getDescription() }}</p>
                                <p>{{ $data['product']->getDescriptionRight() }}</p>
                            @else
                                <p>-</p>
                            @endif
                        </div>
                    </div>
                    <div class="f-section">
                        <p class="dropdown-list mobile-slideover">{{ __('Материал') }} <img src="{{ url('i/icons/plus-footer.svg') }}" alt=""></p>
                        <div class="slidedown-element">
                            @if($data['product']->getCharacteristic('metal_color'))
                                <p>{{ $data['product']->getCharacteristic('metal_color') }}</p>
                            @endif
                        </div>
                    </div>
                    <div class="f-section dets">
                        <p class="dropdown-list mobile-slideover">{{ __('Детали') }} <img src="{{ url('i/icons/plus-footer.svg') }}" alt=""></p>
                        <div class="slidedown-element">
                            @if($data['product']->getCharacteristic('mass'))
                                <p><span class="left">{{ __('Масса:') }}</span><span class="right">{{ $data['product']->getCharacteristic('mass') }}</span></p>
                            @endif
                            @if($data['product']->getCharacteristic('metal_color'))
                                <p><span class="left">{{ __('Материал') }}:</span><span class="right">{{ $data['product']->getCharacteristic('metal_color') }}</span></p>
                            @endif
                            @if($data['product']->getCharacteristic('stones'))
                                <p>
                                    <span class="left">{{ __('Камни:') }}</span>
                                    <span class="right">
                                        @foreach(json_decode($data['product']->getCharacteristic('stones')) as $stone)
                                            {{ $stone->stone_type }} @if(!$loop->last), @endif
                                        @endforeach
                                    </span>
                                </p>
                            @endif
                            @if($data['product']->getCharacteristic('brand'))
                                <p><span class="left">{{ __('Бренд:') }}</span><span class="right">{{ $data['product']->getCharacteristic('brand') }}</span></p>
                            @endif
                            @if($data['product']->getCharacteristic('collection'))
                                <p><span class="left">{{ __('Коллекция:') }}</span><span class="right">{{ $data['product']->getCharacteristic('collection') }}</span></p>
                            @endif
                            @if($data['product']->getCharacteristic('cloth_material'))
                                <p>
                                    <span class="left">{{ __('Материал') }}:</span>
                                    <span class="right">
                                        @foreach(json_decode($data['product']->getCharacteristic('cloth_material')) as $material)
                                            {{ $material }} @if(!$loop->last) , @endif
                                        @endforeach
                                    </span>
                                </p>
                            @endif
                            @if($data['product']->getCharacteristic('country_provider'))
                                <p><span class="left">{{ __('Страна поставщик:') }}</span><span class="right">{{ $data['product']->getCharacteristic('country_provider') }}</span></p>
                            @endif
                            @if($data['product']->getCharacteristic('cloth_season'))
                                <p><span class="left">{{ __('Сезон:') }}</span><span class="right">{{ $data['product']->getCharacteristic('cloth_season') }}</span></p>
                            @endif
                            @if($data['product']->getCharacteristic('lining'))
                                <p><span class="left">{{ __('Подклад:') }}</span><span class="right">{{ $data['product']->getCharacteristic('lining') }}</span></p>
                            @endif
                        </div>
                    </div>
                </div>
            @elsehandheld
                <div class="breadcrumbs">
                    <ul>
                        @foreach($data['breadcrumbs'] as $name => $url)
                            <li><a href="{{ $url }}">{{ $name }}</a></li>
                        @endforeach
                    </ul>
                </div>
                <div class="details tabos">
                    <h3>{{ __('Детали товара') }}</h3>
                    <div class="tabs-header">
                        <a href="#" data-link-tab="description">{{ __('Описание') }}</a>
                        <a href="#" class="active" data-link-tab="details">{{ __('Детали') }}</a>
                    </div>
                    <div class="tabs-content">
                        <div class="tab-content" data-tab="description">
                            @if($data['product']->description)
                                <div class="duo flex items-start">
                                    <div>
                                        <p>{{ $data['product']->getDescription() }}</p>
                                    </div>
                                    <div>
                                        <p>{{ $data['product']->getDescriptionRight() }}</p>
                                    </div>
                                </div>
                            @else
                                <div class="duo text-center">-</div>
                            @endif
                        </div>
                        <div class="tab-content active" data-tab="details">
                            <div class="details-table">
                                @if($data['product']->getCharacteristic('mass'))
                                    <p><span class="left">{{ __('Масса') }}</span><span class="right">{{ $data['product']->getCharacteristic('mass') }}</span></p>
                                @endif
                                @if($data['product']->getCharacteristic('metal_color') && $data['product']->getCharacteristic('brand') !== 'La Perla')
                                    <p><span class="left">{{ __('Материал') }}</span><span class="right">{{ $data['product']->getCharacteristic('metal_color') }}</span></p>
                                @endif
                                @if($data['product']->getCharacteristic('stones') && $data['product']->getCharacteristic('brand') !== 'La Perla')
                                    <p>
                                        <span class="left">{{ __('Камни') }}</span>
                                        <span class="right">
                                            @foreach(json_decode($data['product']->getCharacteristic('stones')) as $stone)
                                                {{ $stone->stone_type }} @if(!$loop->last), @endif
                                            @endforeach
                                        </span>
                                    </p>
                                @endif
                                @if($data['product']->getCharacteristic('brand'))
                                    <p><span class="left">{{ __('Бренд') }}</span><span class="right">{{ $data['product']->getCharacteristic('brand') }}</span></p>
                                @endif
                                @if($data['product']->getCharacteristic('collection'))
                                    <p><span class="left">{{ __('Коллекция') }}</span><span class="right">{{ $data['product']->getCharacteristic('collection') }}</span></p>
                                @endif
                                @if($data['product']->getCharacteristic('cloth_material') && $data['product']->getCharacteristic('brand') !== 'La Perla')
                                    <p>
                                        <span class="left">{{ __('Материал') }}</span>
                                        <span class="right">
                                            @foreach(json_decode($data['product']->getCharacteristic('cloth_material')) as $material)
                                                {{ $material }} @if(!$loop->last) , @endif
                                            @endforeach
                                        </span>
                                    </p>
                                @endif
                                @if($data['product']->getCharacteristic('country_provider'))
                                    <p><span class="left">{{ __('Страна поставщик') }}</span><span class="right">{{ $data['product']->getCharacteristic('country_provider') }}</span></p>
                                @endif
                                @if($data['product']->getCharacteristic('cloth_season'))
                                    <p><span class="left">{{ __('Сезон') }}</span><span class="right">{{ $data['product']->getCharacteristic('cloth_season') }}</span></p>
                                @endif
                                @if($data['product']->getCharacteristic('lining'))
                                    <p><span class="left">{{ __('Подклад') }}</span><span class="right">{{ $data['product']->getCharacteristic('lining') }}</span></p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @endhandheld
        </div>

        @handheld
            <div class="products-also-m">
                <div class="item-group">
                    <h3>{{ __('Дополните образ') }}</h3>
                    <div class="swiper-container">
                        <div class="swiper-wrapper">
                            @foreach($data['fit'] as $product)
                                <div class="swiper-slide">
                                    <a href="{{ route('page.product', $product->slug) }}">
                                        <img src="{{ $product->poster() }}" alt="{{ $product->poster_alt_tag() ?? '' }}">
                                        <p class="product-title">
                                            <a href="{{ route('page.product', $product->id) }}">{{ $product->displayName() }}</a>
                                        </p>
                                        <p class="product-price">
                                            <x-price :price="$product->price" :product-currency="$product->currency_id" />
                                        </p>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="item-group">
                    <h3>{{ __('Вам так же понравится') }}</h3>
                    <div class="swiper-container">
                        <div class="swiper-wrapper">
                            @foreach($data['also'] as $product)
                                <div class="swiper-slide">
                                    <a href="{{ route('page.product', $product->slug) }}">
                                        <img src="{{ $product->poster() }}" alt="{{ $product->poster_alt_tag() ?? '' }}">
                                        <p class="product-title">
                                            <a href="{{ route('page.product', $product->id) }}">{{ $product->displayName() }}</a>
                                        </p>
                                        <p class="product-price">
                                            <x-price :price="$product->price" :product-currency="$product->currency_id" />
                                        </p>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        @elsehandheld
            <div class="products-with-product tabos">
                <div class="tabs-header">
                    <a href="#" class="active" data-link-tab="suit-needs">{{ __('Дополните образ') }}</a>
                    <a href="#" data-link-tab="you-like">{{ __('Вам так же понравится') }}</a>
                </div>
                <div class="tabs-content">
                    <div class="tab-content active" data-tab="suit-needs">
                        <div class="flex items-start space-center wrap">
                            @foreach($data['fit'] as $product)
                                <div class="tb-r">
                                    <a href="{{ route('page.product', $product->slug) }}">
                                        <img src="{{ $product->poster() }}" alt="{{ $product->poster_alt_tag() ?? '' }}">
                                        <p>{{ $product->displayName() }}</p>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="tab-content" data-tab="you-like">
                        <div class="flex item-start space-center wrap">
                            @foreach($data['also'] as $product)
                                <div class="tb-r">
                                    <a href="#">
                                        <img src="{{ $product->poster() }}" alt="{{ $product->poster_alt_tag() ?? '' }}">
                                        <p>{{ $product->displayName() }}</p>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        @endhandheld

        <div class="consultation-form">
            <p class="title">{!! __('Запланируйте встречу с личным') !!}</p>
            <a href="#" data-type="feedback" class="customer-request btn-black">{{ __('Запланировать встречу') }}</a>
        </div>

        <div class="seo">
            <div class="dropdown-list seo-title">
                <h2>{{ $data['product']->H1 ?? '' }}</h2>
                @if(isset($data['product']->H1))
                    <span>{!! __('Подробнее') !!}</span>
                @endif
            </div>

            <div class="seo-slidedown-element slidedown-element">
                <div class="seo-info">
                    <p>
                        {{ Str::limit($data['product']->H1_seo_text, 100, '') }}
                    </p>
                    @if (strlen($data['product']->H1_seo_text) > 100)
                        <p class="slidedown-element">{{ substr($data['product']->H1_seo_text, 100) }}</p>
                    @endif
                    @if (strlen($data['product']->H1_seo_text) > 100)
                        <span class="more dropdown-list">{!! __('Узнать больше') !!}</span>
                    @endif
                </div>

                <div class="seo-info">
                    <div class="seo-title">
                        <h3>{{ $data['product']->H2 ?? '' }}</h3>
                    </div>
                    <p>
                        {{ $data['product']->H2_seo_text }}
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
{{--        <div class="seo">--}}
{{--            <h1>{{ $data['product']->H1 ?? '' }}</h1>--}}
{{--            <p>{{ $data['product']->H1_seo_text ?? '' }}</p>--}}

{{--            <h2>{{ $data['product']->H2 ?? '' }}</h2>--}}
{{--            <p>{{ $data['product']->H2_seo_text ?? '' }}</p>--}}

{{--            <h3>{{ $data['product']->H3 ?? '' }}</h3>--}}
{{--            <p>{{ $data['product']->H3_seo_text ?? '' }}</p>--}}

{{--            <h4>{{ $data['product']->H4 ?? '' }}</h4>--}}
{{--            <p>{{ $data['product']->H4_seo_text ?? '' }}</p>--}}

{{--            <h5>{{ $data['product']->H5 ?? '' }}</h5>--}}
{{--            <p>{{ $data['product']->H5_seo_text ?? '' }}</p>--}}

{{--            <h6>{{ $data['product']->H6 ?? '' }}</h6>--}}
{{--            <p>{{ $data['product']->H6_seo_text ?? '' }}</p>--}}
{{--        </div>--}}
    </div>

    @if(count($data['zhannaChoice']) > 0)
        <x-carousel-list
            title="Лучшее <br>в линейке La Perla"
            button="Посмотреть <br>все лучшие товары <br>от Жанны"
            link="{{ route('page.zhannas_choice') }}"
            :list="$data['zhannaChoice']"
        />
    @endif
</div>
@stop

@section('modal')
    <div class="remodal hint-remodal" data-remodal-id="hint-gift">
        <button data-remodal-action="close" class="remodal-close"></button>
        <div class="hint-head">
            <h2>{!! __('Подарок, о котором я мечтаю!') !!}</h2>
            <p>{{ __('1 товар на сумму') }}<br><span><x-price :price="$data['product']->price" :product-currency="$data['product']->currency_id" /></span></p>
        </div>
        <div class="modal-body">
            <form action="{{ route('cart.wishlist') }}" method="post" class="form styled">
                @csrf
                <div class="widthed">
                    <div class="form-group @error('hi_name') form-error @enderror">
                        <label for="hi_name">{{ __('От кого:') }}</label>
                        @error('hi_name') <span class="error-msg">{{ $message }}</span> @enderror
                        <input type="text" name="hi_name" placeholder="{{ __('Ваше имя') }}">
                    </div>
                    <div class="form-group @error('hi_email') form-error @enderror">
                        <label for="hi_email">{{ __('Кому:') }}</label>
                        @error('hi_email') <span class="error-msg">{{ $message }}</span> @enderror
                        <input type="email" name="hi_email" placeholder="{{ __('Email получателя')}}">
                    </div>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn-black">
                        {{ __('Отправить') }} <img src="{{ url('i/icons/submit-right.svg') }}" alt="">
                    </button>
                </div>
            </form>
        </div>
    </div>

    <div class="remodal" data-remodal-id="recommend-product">
        <button data-remodal-action="close" class="remodal-close"></button>
        <div class="share-inner flex items-start space-between">
                <div class="product-rec">
                    <img class="rec-poster" src="{{ $data['product']->poster() }}" alt="">
                    <div class="title flex space-between item-center">
                        <h2>{{ $data['product']->displayName() }}</h2>
                        <p><x-price :price="$data['product']->price" :product-currency="$data['product']->currency_id" /></p>
                    </div>
                </div>
                <div class="rec-description">
                    <svg class="zk-logo" width="200" height="70" viewBox="0 0 122 56" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M90.8744 7.04956C90.4744 8.13561 90.1744 9.5179 89.7744 10.604C88.7744 13.8621 87.0744 17.219 85.1744 19.9835C83.4744 22.4518 80.6744 25.5125 78.2744 27.0922C77.2744 27.6846 75.6744 28.7706 75.2744 27.7833C74.8744 26.8947 76.9744 14.3558 77.3744 11.8875C77.4744 11.0976 77.6744 10.1103 77.8744 9.41915C78.1744 8.43183 78.4744 8.13561 78.0744 7.04956L77.6744 7.14833C76.6744 9.61663 75.2744 18.7 74.8744 22.0568C74.6744 23.7353 74.5744 25.7099 74.2744 27.2896C73.3744 27.0922 72.2744 26.4998 71.2744 26.2036C68.6744 25.4137 68.4744 27.2897 69.2744 28.1782C71.1744 30.2516 72.8744 29.758 73.8744 30.3504C73.9744 31.2389 73.6744 33.2136 73.5744 34.2996C73.3744 36.1755 72.8744 42.4944 73.8744 43.9754C74.0744 44.2716 74.6744 44.6665 75.0744 44.5677C75.0744 44.5677 75.4744 44.5678 74.9744 43.9754C74.9744 43.9754 74.6744 43.6791 74.5744 43.5804C74.3744 43.2842 74.2744 42.988 74.1744 42.4944C73.6744 39.6312 74.3744 34.6946 74.5744 31.5352C74.6744 30.5478 74.6744 29.6592 75.7744 29.8567C76.9744 30.0542 87.5744 37.7553 91.3744 37.9527C93.4744 38.0515 94.4744 36.373 94.1744 35.3857C94.0744 35.0895 94.1744 35.2869 93.9744 35.0895C92.8744 34.3984 93.7744 37.9527 89.6744 36.373C87.8744 35.6819 77.8744 30.1529 77.2744 29.1656C77.4744 28.7706 79.4744 27.6846 80.4744 26.796C85.5744 22.0568 88.6744 16.9228 90.7744 9.91281C91.2744 8.13564 92.9744 2.60667 92.3744 0.928223C91.2744 0.928223 91.3744 2.8041 91.1744 3.79142C91.2744 4.77874 90.9744 5.96351 90.8744 7.04956ZM70.0744 27.2896C71.1744 27.0922 73.7744 28.0795 74.0744 28.8694C73.4744 29.1656 72.1744 29.0668 71.4744 28.7706C70.8744 28.4744 69.9744 27.9808 70.0744 27.2896Z" fill="#272727"/>
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M23.5748 6.65454C23.3748 7.34567 22.6748 8.23422 22.3748 9.02408C22.0748 9.81393 21.7748 10.7026 21.5748 11.5911C20.9748 14.2569 19.2748 29.8566 19.2748 29.8566C19.6748 32.6211 17.8748 42.0993 19.2748 43.2841C20.0748 42.6917 20.1748 41.2107 20.4748 40.1247C20.8748 38.3475 23.0748 30.9426 24.2748 30.7451C24.6748 31.2388 24.8748 33.4109 24.9748 34.2995C25.1748 35.4843 25.5748 36.4716 25.9748 37.459C27.9748 41.8032 30.6748 39.5323 30.2748 38.545C29.3748 38.3475 28.8748 40.026 27.6748 38.7425C27.0748 38.1501 26.7748 37.1627 26.4748 36.2742C25.9748 34.7932 25.5748 31.2388 25.0748 30.3502C23.2748 27.0921 20.3748 37.4589 19.9748 39.0386C19.7748 38.8412 19.8748 39.0387 19.7748 38.7425C19.6748 38.3475 19.9748 34.7932 19.9748 34.2995L20.6748 25.0187C20.8748 22.9453 24.4748 13.7632 24.9748 9.51774C25.1748 7.83929 25.3748 5.86469 23.5748 6.65454ZM21.3748 19.2922C20.9748 18.5024 22.5748 8.7279 24.1748 7.44439C24.8748 8.53044 23.5748 12.2823 23.1748 13.5658L21.6748 18.6999C21.6748 18.7986 21.5748 18.996 21.4748 18.996C21.4748 19.2922 21.4748 19.1935 21.3748 19.2922Z" fill="#272727"/>
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M106.974 31.7323C107.674 30.8437 108.174 30.1526 110.574 31.6336C111.074 31.9298 112.074 31.6336 113.274 31.0412C115.074 30.2513 117.574 29.264 120.874 29.5602C121.074 29.5602 121.174 29.7576 121.174 29.9551C121.174 30.1526 120.974 30.2513 120.774 30.2513C117.674 29.9551 115.274 30.9424 113.474 31.6336C111.974 32.2259 110.974 32.7196 110.074 32.1272C108.274 30.9424 107.874 31.4361 107.474 32.0285C107.274 32.3247 106.974 32.6209 106.574 32.9171C106.074 33.5095 104.974 33.6082 104.174 32.0285C103.674 31.1399 103.274 28.1779 102.674 27.6843C101.774 28.3754 100.274 33.1145 99.6736 34.5955C99.2736 35.6816 99.0736 36.3727 97.9736 36.1752C96.6736 34.2006 97.8736 29.1653 97.7736 27.3881C96.9736 27.8818 97.3736 28.8691 95.6736 30.8437C95.3736 31.2386 94.6736 32.1272 93.8736 31.3374C93.2736 30.745 93.5736 29.7576 93.0736 29.1653C92.4736 29.7576 91.4736 32.6209 90.1736 31.7323C89.1736 31.0411 90.1736 26.7957 91.9736 25.3147C92.6736 24.7223 93.5736 25.1173 93.9736 25.6109C94.6736 26.4995 93.4736 29.6589 94.5736 30.7449C95.9736 30.5475 98.0736 24.6236 98.6736 22.8464C98.8736 22.3527 98.9736 21.8591 99.1736 21.3654C99.3736 20.773 99.3736 20.1807 99.9736 20.1807C100.574 20.7731 99.8736 22.7477 99.6736 23.6363C99.1736 25.9071 97.4736 33.312 98.5736 34.8917C99.5736 33.9044 101.374 25.3147 103.474 26.697C103.974 26.9932 104.174 27.8818 104.274 28.5729C104.474 29.7577 104.674 32.1272 105.774 32.4234C106.274 32.6209 106.674 32.1272 106.974 31.7323ZM90.6736 31.2386C90.3736 30.35 91.5736 26.0058 93.1736 26.0058C93.4736 26.8944 92.1736 29.3627 91.6736 30.3501C91.3736 30.745 91.2736 31.1399 90.6736 31.2386Z" fill="#272727"/>
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M50.1734 29.7583C50.6734 30.2519 51.1733 35.8797 53.7733 36.6695C54.9733 37.0644 55.6734 36.0772 56.3734 35.781C56.3734 36.3734 56.3734 37.1632 56.6734 37.4594C57.1734 37.9531 57.8734 37.5581 58.1734 37.1632C59.2734 36.0771 59.3734 34.9911 60.0734 34.5962C60.4734 35.1886 60.6734 35.6822 61.5734 35.8797C62.4734 36.0771 63.2734 35.6822 63.8734 35.2873C65.1734 34.3987 65.6734 33.7076 66.1734 31.7329C65.2734 32.1278 65.1733 33.4114 63.7733 34.4975C62.6733 35.2873 61.2733 35.8797 60.7733 34.0038C60.6733 33.5101 60.5733 32.1278 60.7733 31.7329C61.0733 31.2393 62.1734 31.5355 61.4734 30.2519C59.7734 27.3887 56.8734 33.8063 56.6734 34.1025C52.2734 39.9277 51.5734 29.1659 50.4734 28.771C49.4734 28.5735 49.3734 29.4621 49.0734 30.2519C48.7734 31.0418 48.4734 31.7329 48.1734 32.6215C47.7734 33.8063 47.1734 36.3734 46.5734 37.2619C46.1734 36.6696 46.0734 31.6342 46.0734 30.5482C46.0734 29.3634 46.0734 28.1786 46.0734 26.9938C46.0734 26.3027 46.4734 24.1306 46.3734 23.7356C45.3734 23.3407 45.4733 24.7229 45.2733 26.3027C44.9733 29.2646 45.1734 34.6949 45.5734 37.4594C45.6734 37.9531 45.6734 38.6442 45.9734 38.8416C46.4734 39.2366 46.8734 38.7429 47.0734 38.348C47.4734 37.6569 47.7734 36.2746 48.0734 35.386C48.6734 33.905 49.3734 30.8443 50.1734 29.7583ZM57.2733 36.7683C56.8734 35.0898 59.1734 30.0545 60.8734 30.4494C60.8734 31.338 60.2734 30.8444 59.9734 32.0292C59.5734 33.4114 58.5733 36.5708 57.2733 36.7683Z" fill="#272727"/>
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M38.1751 30.8435C37.7751 32.4232 35.8751 36.8662 34.7751 37.0636C34.0751 36.3725 34.2751 34.5954 34.3751 33.5093C34.4751 32.1271 34.1751 31.2385 32.6751 31.3372C30.8751 32.6207 30.2751 34.2004 30.0751 36.4713C29.9751 37.0637 29.9751 37.8535 30.3751 38.1497C31.5751 39.0382 32.4751 36.3725 33.2751 35.5827C33.7751 36.175 33.4751 37.1624 34.0751 37.7548C35.1751 38.8408 36.7751 36.175 37.0751 35.5827C37.3751 34.9903 37.5751 34.1017 38.0751 33.8055C38.1751 35.4839 37.0751 40.7167 38.2751 42.5926C39.4751 42.7901 39.5751 42.099 39.9751 41.0129C40.5751 39.5319 42.1751 34.6941 42.9751 34.1017C43.5751 34.4966 43.9751 37.4585 44.3751 38.3471C45.6751 41.0129 47.6751 38.8408 46.9751 38.2484C46.3751 37.8535 46.4751 38.7421 45.8751 39.0383C44.2751 39.137 44.8751 30.1524 41.9751 34.003C40.9751 35.3852 39.2751 41.0129 38.6751 41.5066C37.5751 40.0256 39.2751 32.5219 39.7751 30.2511C39.9751 29.3625 40.6751 27.2891 40.0751 26.7955C39.1751 26.598 38.9751 29.7575 38.1751 30.8435ZM30.9751 37.1623C30.6751 36.2738 31.8751 31.9296 33.4751 31.9296C33.6751 32.6207 32.9751 34.2004 32.6751 34.8915C32.4751 35.3852 32.2751 35.7801 31.9751 36.175C31.6751 36.7674 31.5751 37.1623 30.9751 37.1623Z" fill="#272727"/>
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M30.4743 11.1958C24.7743 12.1831 12.4743 16.6261 8.8743 17.6134C8.97431 17.2185 9.1743 16.9223 8.6743 16.7248C8.2743 16.6261 8.0743 16.8235 7.8743 17.021C7.1743 17.8109 6.8743 21.069 11.3743 18.2058C15.0743 15.8362 29.0743 11.3933 31.6743 11.7882C31.9743 11.3933 31.7743 11.492 32.5743 11.492C32.4743 11.9856 32.5743 11.8869 32.1743 12.1831C31.9743 13.0717 30.6743 14.454 30.1743 15.0464C24.8743 21.1678 19.8743 26.7955 14.6743 33.0156C11.7743 36.4712 9.07431 40.0256 6.27431 43.7774C5.67431 44.5672 -2.82569 54.5392 0.974307 55.5265C2.07431 55.8227 2.37431 55.7239 3.37431 55.6252C4.8743 56.0201 45.1743 40.618 48.2743 43.4812C49.3743 43.7774 49.7743 45.3571 50.3743 44.7647C50.8743 44.1723 49.3743 42.6913 48.7743 42.5926C41.7743 39.8281 13.5743 51.5772 6.57431 53.7493C6.17431 53.8481 6.0743 53.9468 5.6743 53.9468C4.2743 54.1442 2.3743 55.0328 1.1743 54.3417C0.974304 53.0582 1.7743 51.9721 2.37431 50.8861C5.1743 46.0482 13.0743 36.2737 16.4743 32.2257C17.8743 30.4485 19.2743 28.8688 20.7743 27.1904C22.9743 24.6234 32.5743 14.059 33.3743 11.9856C33.4743 10.7021 33.1743 10.6034 31.8743 10.8009H31.4743C31.2743 11.0971 31.6743 10.8996 30.9743 11.0971C30.7743 11.0971 30.5743 11.0971 30.4743 11.1958Z" fill="#272727"/>
                    </svg>

                    <h3>{!! __('Поделитесь промокодом на скидку') !!}</h3>

                    <form action="" class="form styled" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="">{{ __('Email получателя') }}:</label>
                            <input type="text" name="rec_email" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn-black">{{ __('Отправить') }}</button>
                        </div>
                    </form>

                    <p class="orili">
                        <span>{{ __('или') }}</span>
                        <a href="#" class="flex item-center space-center" data-promocode="{{ \Illuminate\Support\Str::random(6) }}"><img src="{{ url('i/icons/copy.svg') }}" alt="">{{ __('СКОПИРУТЕ ССЫЛКУ НА ПРОМОКОД') }}</a>
                    </p>
                </div>
            </div>
    </div>

    @if(\App\Models\SizeGuide::whereIn('menu_ids', [$data['product']->menu_id])->exists())
        <div class="remodal" data-remodal-id="sizeguide">
            <embed src="{{ url('sizes/'.\App\Models\SizeGuide::getSizeFile($data['product']->menu_id)) }}" frameborder="0" width="100%" height="800px">
        </div>
    @endif
@stop

@section('scripts')
<script>
    $(document).ready(function() {
        if($('[data-color]').length === 1) $('[data-color]').first().attr('first-click', true).click();
        if($('[data-size]').length === 1) $('[data-size]').first().attr('first-click', true).click();
    });
</script>
@endsection
