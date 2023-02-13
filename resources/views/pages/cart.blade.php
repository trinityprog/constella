@inject('cart', 'Gloudemans\Shoppingcart\Facades\Cart')
@inject('pinfo', 'App\Models\Product')

@extends('layouts.theme')

@section('title', 'Корзина')

@section('content')
    <div class="cart-page">
        <div class="container">

            <div class="cart-holder flex items-start space-between">
                <div class="holder-left">
                    @desktop
                    <div class="heads">
                        <p class="title flex item-center">{{ __('Моя Корзина Товаров') }}</p>
                    </div>
                    @enddesktop

                    @handheld
                    <div class="cart-head">
                        <p class="">Моя Корзина</p>
                        <p class=""><span>{{ $cart::count() }}</span> {{ \App\Http\Controllers\Api\CDEKController::true_wordform($cart::count(), 'товар', 'товара', 'товаров') }}</p>
                    </div>
                    @endhandheld

                    <div class="cart-products-list">
                        @desktop
                        @forelse(\Gloudemans\Shoppingcart\Facades\Cart::content() as $product)
                        <div class="order-item flex">
                            <figure><img data-add-to-cart data-product="{{ $product->id }}" src="{{ $product->model->poster() }}" alt=""></figure>
                            <div class="order-content">
                                <div>
                                    <h2 class="title">
                                        <a href="{{ route('page.product', $product->model->slug) }}" target="_blank">
                                            {{ $product->model->displayName() }}
                                        </a>
                                    </h2>
                                    <div class="grid">
                                        <p class="category">{{ $product->model->displayInfo()  }}</p>
                                        <p class="size"><span>{{ __('Размер:') }}</span> {{ ($product->options->size == 'one') ? 'One size' : $product->options->size }}</p>
                                        <p class="color"><span>{{ __('Цвет:') }}</span> {{ $product->options->color }}</p>
                                        <p class="price"><x-price :price="$product->price" :product-currency="$product->model->currency_id" /></p>
                                        <a href="#" class="close" data-id="{{ $product->rowId }}">
                                            <svg width="16" height="16" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M6.00015 4.58926L1.7027 0.291588C1.31394 -0.0971957 0.682504 -0.0971957 0.292501 0.291588C-0.0975011 0.681611 -0.0975011 1.31308 0.292501 1.7031L4.58996 6.00077L0.292502 10.2972C-0.0975006 10.6872 -0.0975006 11.3187 0.292502 11.7075C0.682504 12.0975 1.31394 12.0975 1.7027 11.7075L6.00015 7.40981L10.2976 11.7075C10.6876 12.0975 11.3178 12.0975 11.7078 11.7075C11.9034 11.5131 12 11.258 12 11.003C12 10.7479 11.9034 10.4928 11.7078 10.2972L7.41159 6.00077L11.7078 1.7031C11.9034 1.50871 12 1.25241 12 0.997343C12 0.742281 11.9034 0.487218 11.7078 0.291587C11.3178 -0.0971961 10.6876 -0.0971961 10.2976 0.291587L6.00015 4.58926Z" fill="#DCDCDC"/></svg>
                                        </a>
                                    </div>
                                    <div class="counters flex item-center">
                                        <a href="#" data-type="minus" data-id="{{ $product->rowId }}" class="minus flex item-center">-</a>
                                        <span>{{ $product->qty }}</span>
                                        <a href="#"  data-type="plus" data-id="{{ $product->rowId }}" class="plus flex item-center">+</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @empty
                            <p class="empty">{{ __('Нет товаров') }}</p>
                        @endforelse
                        @enddesktop
{{--                        <div class="order-item flex discounted">--}}
{{--                            <figure><img src="{{ url('i/products/pr-1.png') }}" alt=""></figure>--}}
{{--                            <div class="order-content">--}}
{{--                                <div>--}}
{{--                                    <h2 class="title"><a href="#" target="_blank">Dark grey and pink embroidered <br>tulle bralette</a></h2>--}}
{{--                                    <div class="grid">--}}
{{--                                        <p class="category">Beegoddess, Kundalini</p>--}}
{{--                                        <p class="size"><span>Размер:</span> 70B</p>--}}
{{--                                        <p class="color"><span>Цвет:</span> Белый</p>--}}
{{--                                        <p class="price lined"><span>$ 17 500</span><br><span class="new-price">$ 7 500</span></p>--}}
{{--                                        <a href="#" class="close">--}}
{{--                                            <svg width="16" height="16" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">--}}
{{--                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M6.00015 4.58926L1.7027 0.291588C1.31394 -0.0971957 0.682504 -0.0971957 0.292501 0.291588C-0.0975011 0.681611 -0.0975011 1.31308 0.292501 1.7031L4.58996 6.00077L0.292502 10.2972C-0.0975006 10.6872 -0.0975006 11.3187 0.292502 11.7075C0.682504 12.0975 1.31394 12.0975 1.7027 11.7075L6.00015 7.40981L10.2976 11.7075C10.6876 12.0975 11.3178 12.0975 11.7078 11.7075C11.9034 11.5131 12 11.258 12 11.003C12 10.7479 11.9034 10.4928 11.7078 10.2972L7.41159 6.00077L11.7078 1.7031C11.9034 1.50871 12 1.25241 12 0.997343C12 0.742281 11.9034 0.487218 11.7078 0.291587C11.3178 -0.0971961 10.6876 -0.0971961 10.2976 0.291587L6.00015 4.58926Z" fill="#DCDCDC"/>--}}
{{--                                            </svg>--}}
{{--                                        </a>--}}
{{--                                    </div>--}}
{{--                                    <div class="counters flex item-center">--}}
{{--                                        <a href="#" class="minus flex item-center">-</a>--}}
{{--                                        <span>1</span>--}}
{{--                                        <a href="#" class="plus flex item-center">+</a>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
                            @handheld
                            @forelse(\Gloudemans\Shoppingcart\Facades\Cart::content() as $product)
                                <div class="cart-item flex discounted">
                                    <figure><img src="{{ $product->model->poster() }}" alt=""></figure>
                                    <div class="cart-content">
                                        <div>
                                            <div class="cart-title">
                                                <h2 class="title">
                                                    <a href="{{ route('page.product', $product->model->slug) }}" target="_blank">
                                                        {{ $product->model->displayName() }}
                                                    </a>
                                                </h2>
                                                <a href="#" class="close" data-id="{{ $product->rowId }}">
                                                    <svg width="16" height="16" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M6.00015 4.58926L1.7027 0.291588C1.31394 -0.0971957 0.682504 -0.0971957 0.292501 0.291588C-0.0975011 0.681611 -0.0975011 1.31308 0.292501 1.7031L4.58996 6.00077L0.292502 10.2972C-0.0975006 10.6872 -0.0975006 11.3187 0.292502 11.7075C0.682504 12.0975 1.31394 12.0975 1.7027 11.7075L6.00015 7.40981L10.2976 11.7075C10.6876 12.0975 11.3178 12.0975 11.7078 11.7075C11.9034 11.5131 12 11.258 12 11.003C12 10.7479 11.9034 10.4928 11.7078 10.2972L7.41159 6.00077L11.7078 1.7031C11.9034 1.50871 12 1.25241 12 0.997343C12 0.742281 11.9034 0.487218 11.7078 0.291587C11.3178 -0.0971961 10.6876 -0.0971961 10.2976 0.291587L6.00015 4.58926Z" fill="#DCDCDC"/></svg>
                                                </a>
                                            </div>
                                            <div>
                                                <p class="cart-price"><x-price :price="$product->price" /></p>
                                                <p class="cart-size">{{ ($product->options->size == 'one') ? 'One size' : $product->options->size }}</p>
                                                <p class="cart-color">{{ $product->options->color }}</p>
                                            </div>
                                            <div class="counters flex item-center">
                                                <a href="#" data-type="minus" data-id="{{ $product->rowId }}" class="minus flex item-center">-</a>
                                                <span>{{ $product->qty }}</span>
                                                <a href="#"  data-type="plus" data-id="{{ $product->rowId }}" class="plus flex item-center">+</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @empty
                            @endforelse
{{--                            <nav class="info-page-nav partnership">--}}
{{--                                <ul class="info-page-list">--}}
{{--                                    <li class="info-page-list__item">--}}
{{--                                        <a href="#" class="info-page-list__link ">--}}
{{--                                            <p class="info-page-list__text">ВВЕСТИ ПРОМОКОД</p>--}}
{{--                                            <div class="info-page-tab__mark"><span class="info-page-tab__mark-item"></span><span class="info-page-tab__mark-item  "></span></div>--}}
{{--                                        </a>--}}
{{--                                    </li>--}}
{{--                                </ul>--}}
{{--                            </nav>--}}
                            @endhandheld
                    </div>
                </div>
{{--                @desktop--}}
                <div class="holder-right">
                    <div class="holder-title">
                        <p class="cart-total"><span class="cart-items-count {{ ($cart::count() == 0) ? 'none' : '' }}">{{ $cart::count() }}</span> {{ \App\Http\Controllers\Api\CDEKController::true_wordform($cart::count(), 'товар', 'товара', 'товаров') }}</p>
{{--                        <svg width="13" height="7" viewBox="0 0 13 7" fill="none" xmlns="http://www.w3.org/2000/svg">--}}
{{--                            <path fill-rule="evenodd" clip-rule="evenodd" d="M0.271972 0.256282C0.634602 -0.0854272 1.22254 -0.0854272 1.58517 0.256282L6.5 4.88756L11.4148 0.256282C11.7775 -0.0854272 12.3654 -0.0854272 12.728 0.256282C13.0907 0.59799 13.0907 1.15201 12.728 1.49372L7.1566 6.74372C6.79397 7.08543 6.20603 7.08543 5.8434 6.74372L0.271972 1.49372C-0.0906574 1.15201 -0.0906574 0.59799 0.271972 0.256282Z" fill="#5A5A5A"/>--}}
{{--                        </svg>--}}
                    </div>
                    <div class="cart-slide">
                        <div class="cart-full-price">
                            <p>{{ __('Итого к оплате:') }} <span class="cart_total">{{ \App\Services\CartService::getTotal(true, session('promocode')) }}</span></p>
                        </div>
                        <x-promocode/>
                        <a href="{{ route('order.main') }}" class="btn-black {{ $cart::count() == 0 ? 'disabled' : '' }}">{{ __('Оформить заказ') }}</a>
                        <a href="{{ route('user.profile.orders') }}"
                           class="save-order-for-later flex item-center space-center {{ $cart::count() == 0 ? 'disabled' : '' }}">
                            <svg width="15" height="16" viewBox="0 0 15 16" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M10.5202 1.59163C9.98937 1.59163 9.48028 1.8025 9.10493 2.17785L2.97826 8.30452C2.35273 8.93006 2.0013 9.77847 2.0013 10.6631C2.0013 11.5478 2.35273 12.3962 2.97826 13.0217C3.6038 13.6473 4.45222 13.9987 5.33686 13.9987C6.22151 13.9987 7.06992 13.6473 7.69546 13.0217L13.8221 6.89505C14.0825 6.6347 14.5046 6.6347 14.7649 6.89505C15.0253 7.1554 15.0253 7.57751 14.7649 7.83786L8.63826 13.9645C7.76268 14.8401 6.57513 15.332 5.33686 15.332C4.09859 15.332 2.91104 14.8401 2.03546 13.9645C1.15987 13.0889 0.667969 11.9014 0.667969 10.6631C0.667969 9.42485 1.15987 8.2373 2.03546 7.36171L8.16212 1.23505C8.78752 0.609646 9.63575 0.258301 10.5202 0.258301C11.4046 0.258301 12.2529 0.609646 12.8783 1.23505C13.5037 1.86045 13.855 2.70867 13.855 3.59312C13.855 4.47756 13.5037 5.32579 12.8783 5.95119L6.74493 12.0779C6.36972 12.4531 5.86082 12.6639 5.33019 12.6639C4.79956 12.6639 4.29067 12.4531 3.91546 12.0779C3.54024 11.7026 3.32945 11.1937 3.32945 10.6631C3.32945 10.1325 3.54024 9.62359 3.91546 9.24838L9.57573 3.59477C9.83624 3.33457 10.2583 3.33482 10.5185 3.59532C10.7787 3.85583 10.7785 4.27794 10.518 4.53813L4.85826 10.1912C4.73328 10.3163 4.66279 10.4862 4.66279 10.6631C4.66279 10.8401 4.7331 11.0099 4.85826 11.135C4.98343 11.2602 5.15319 11.3305 5.33019 11.3305C5.5072 11.3305 5.67696 11.2602 5.80212 11.135L11.9355 5.00838C12.3106 4.63305 12.5217 4.12382 12.5217 3.59312C12.5217 3.06229 12.3108 2.55321 11.9355 2.17785C11.5601 1.8025 11.051 1.59163 10.5202 1.59163Z" fill="#B4ADB8"/></svg>
                            {{ __('Сохранить и продолжить позже') }}
                        </a>
                    </div>
                </div>
{{--                @enddesktop--}}
{{--                @handheld--}}
{{--                <div class="holder-right dropdown">--}}
{{--                    <p class="cart-total"><span class="cart-items-count {{ ($cart::count() == 0) ? 'none' : '' }}">{{ $cart::count() }}</span> {{ \App\Http\Controllers\Api\CDEKController::true_wordform($cart::count(), 'товар', 'товара', 'товаров') }}</p>--}}
{{--                    <div class="cart-full-price">--}}
{{--                        <p>{{ __('Итого к оплате:') }} <span class="cart_total">{{ \App\Services\CartService::getTotal() }}</span></p>--}}
{{--                    </div>--}}
{{--                    <a href="{{ route('order.main') }}" class="btn-black {{ $cart::count() == 0 ? 'disabled' : '' }}">{{ __('Оформить заказ') }}</a>--}}
{{--                </div>--}}
{{--                @endhandheld--}}
            </div>

            @include('partials.user_support', ['withPresent' => true])

            @handheld
            <div class="cart-btn">
                <a href="{{ route('page.catalog', ['sex' => Cookie::has('sex') ? Cookie::get('sex') : 'female', 'category' => 'yuvelirnye-izdeliya']) }}" class="btn-transparent">ВЕРНУТЬСЯ К ШОППИНГУ</a>
            </div>
            @endhandheld
        </div>
    </div>
@stop

@section('modal')
    <div class="remodal hint-remodal" data-remodal-id="hint-gift">
        <button data-remodal-action="close" class="remodal-close"></button>

        <div class="hint-head">
            <h2>{!! __('Подарок, о котором я мечтаю!') !!}</h2>
            <p>{{ \Gloudemans\Shoppingcart\Facades\Cart::count() }} {{ __('товаров на сумму') }}<br><span>$ {{ \Gloudemans\Shoppingcart\Facades\Cart::total() }}</span></p>
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
                        <label for="hi_email">{{ __('Кому:')}}</label>
                        @error('hi_email') <span class="error-msg">{{ $message }}</span> @enderror
                        <input type="email" name="hi_email" placeholder="{{ __('Email получателя') }}">
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
@stop
