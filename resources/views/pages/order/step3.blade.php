@inject('cart', 'Gloudemans\Shoppingcart\Facades\Cart')
@inject('pinfo', 'App\Models\Product')

@extends('layouts.theme')

@section('title', 'Главная страница')

@section('content')
    <section class="order-page cart-page">
        <div class="container">

            <div class="order-page-check">
                <form action="{{ route('order.payment.process', $order->id) }}" class="form styled" method="post">
                    @csrf
                    <input type="hidden" name="order_id" value="{{ $order->id }}">
                    <div class="cart-holder pt-0 flex items-start space-between">
                        <div class="holder-left">
                            <div class="contacts">
                                <div class="dropdown sorting">
                                    <a href="#" class="element link flex">{!! __('Оплата заказа') !!} <img src="{{ url('i/icons/arrow-down-sort.svg') }}" class="img" alt=""></a>
                                </div>
                            </div>
                            @desktop
                            @include('partials.order_steps')
                            @enddesktop
                            <h3 class="order-page-check__title">{{ __('Проверьте заказ перед оплатой') }}</h3>
                            <div class="order-page-check__top">
                                <div class="order-page-check__content">
                                    <div class="order-page-check__info">

                                        <ul class="order-page-check__list contact">
                                            <li class="order-page-check__list-item title">{{ __('Контактная информация:') }}</li>
                                            <li class="order-page-check__list-item">
                                                <span> {{ $order->info->recipient_fio }}</span></li>
                                            <li class="order-page-check__list-item"><a
                                                    href="tel:{{ $order->info->recipient_phone }}">{{ $order->info->recipient_phone }}</a>
                                            </li>
                                            <li class="order-page-check__list-item"><a
                                                    href="mailto:{{ $order->user->email }}">{{ $order->user->email }}</a>
                                            </li>
                                        </ul>
                                        <ul class="order-page-check__list another">
                                            <li class="order-page-check__list-item title">{{ __('Адрес и способ доставки:') }}</li>
                                            @if($order->info->delivery_type != 'selfpickup')
                                                <li class="order-page-check__list-item">
                                                    <span class="flex item-center">
                                                        <img src="{{ url('i/icons/pin.png') }}" alt="">
                                                        {{ $address->address }},
                                                        {{ $address->index }},
                                                        {{ $address->city }},
                                                    </span>
                                                </li>
                                            @else
                                                @if($order->info->delivery_type == 'selfpickup')
                                                    <li class="order-page-check__list-item">
                                                        <span class="flex item-center">
                                                            <img src="{{ url('i/icons/pin.png') }}" alt="">
                                                            {{ __('Самовывоз: ') }}
                                                            {{ $order->info->delivery_pickup }}
                                                        </span>
                                                    @else
                                                        <span class="flex item-center">
                                                            <img src="{{ url('i/icons/cdek.svg') }}" style="width: 24px; height: 24px;" alt="">
                                                            <span>CDEK <x-price :price="$order->info->delivery_price" /></span>
                                                        </span>
                                                    </li>
                                                @endif
                                            @endif
                                        </ul>
                                    </div>

                                    <div class="order-page-check__index">
                                        <h5 class="order-page-check__counter">
                                            {{ __('Содержание заказа') }} ({{ $order->products()->sum('count') }}) :
                                        </h5>
                                    </div>

                                    <div class="cart-products-list">
                                        @forelse($order->products as $product)
                                            <div class="order-item flex">
                                                <figure><img src="{{ $product->product->poster() }}" alt=""></figure>
                                                <div class="order-content">
                                                    <div class="relative">
                                                        <h2 class="title">
                                                            <a href="{{ route('page.product', $product->product->slug) }}"
                                                               target="_blank">{{ $product->product->displayName() }}</a>
                                                        </h2>
                                                        <div class="grid grid-products">
                                                            @php $opts = json_decode($product->options); @endphp
                                                            <p class="category">{{ $product->product->getCharacteristic('collection')  }}</p>
                                                            <p class="size">
                                                                <span>{{ __('Размер:') }}</span> {{ ($opts->size == 'one') ? 'One size' : $opts->size }}
                                                            </p>
                                                            <p class="color"><span>{{ __('Цвет:') }}</span> {{ $opts->color }}</p>
                                                            <p class="price">
                                                                <x-price :price="$product->price" :product-currency="$product->product->currency_id"/>
                                                            </p>
                                                            <a href="#" class="close" data-order="{{ $order->id }}"
                                                               data-id="{{ $product->product->id }}">
                                                                <svg width="16" height="16" viewBox="0 0 12 12"
                                                                     fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                                          d="M6.00015 4.58926L1.7027 0.291588C1.31394 -0.0971957 0.682504 -0.0971957 0.292501 0.291588C-0.0975011 0.681611 -0.0975011 1.31308 0.292501 1.7031L4.58996 6.00077L0.292502 10.2972C-0.0975006 10.6872 -0.0975006 11.3187 0.292502 11.7075C0.682504 12.0975 1.31394 12.0975 1.7027 11.7075L6.00015 7.40981L10.2976 11.7075C10.6876 12.0975 11.3178 12.0975 11.7078 11.7075C11.9034 11.5131 12 11.258 12 11.003C12 10.7479 11.9034 10.4928 11.7078 10.2972L7.41159 6.00077L11.7078 1.7031C11.9034 1.50871 12 1.25241 12 0.997343C12 0.742281 11.9034 0.487218 11.7078 0.291587C11.3178 -0.0971961 10.6876 -0.0971961 10.2976 0.291587L6.00015 4.58926Z"
                                                                          fill="#DCDCDC"/>
                                                                </svg>
                                                            </a>
                                                        </div>
                                                        <div class="counters counters-product flex item-center"
                                                             data-order="{{ $order->id }}">
                                                            <a href="#" data-type="minus"
                                                               data-id="{{ $product->product->id }}"
                                                               class="minus flex item-center">-</a>
                                                            <span>{{ $product->count }}</span>
                                                            <a href="#" data-type="plus"
                                                               data-id="{{ $product->product->id }}"
                                                               class="plus flex item-center">+</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @empty
                                            <p class="empty">{{ __('Нет товаров') }}</p>
                                        @endforelse
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="holder-right">
                            <p class="cart-total text-center"><span>{{ $order->products()->sum('count') }}</span> {{ __('товара') }}
                            </p>
                            <div class="cart-full-price" style="flex-direction: column;">
                                <p>
                                    {{ __('Итого к оплате:') }}
                                    <span class="cart_total">{{ \App\Services\CartService::formatTotal($order->getFullSumm()) }}</span>
                                </p>
                            </div>
                            @if(!empty($order->info->package_price) || !empty($order->info->delivery_price))
                                <p class="cart-more-prices">
                                    @if(!empty($order->info->package_price)){{ __('включая') }} <x-price :price="$order->info->package_price" /> {{ __('за упаковку') }}@endif
                                    @if(!empty($order->info->delivery_price))@if(!empty($order->info->package_price)),@endif  <x-price :price="$order->info->delivery_price"/> {{ __('за доставку') }}@endif
                                </p>
                            @endif
                            <x-promocode :order-promocode="$order->promocode->code ?? null" :order-id="$order->id"/>
                            {{--                            <x-promocode/>--}}
                            <button type="submit" class="btn-black">{{ __('Перейти к оплате') }}</button>
                            <a href="{{ route('user.profile.orders') }}"
                               class="save-order-for-later flex item-center space-center">
                                <svg width="15" height="16" viewBox="0 0 15 16" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M10.5202 1.59163C9.98937 1.59163 9.48028 1.8025 9.10493 2.17785L2.97826 8.30452C2.35273 8.93006 2.0013 9.77847 2.0013 10.6631C2.0013 11.5478 2.35273 12.3962 2.97826 13.0217C3.6038 13.6473 4.45222 13.9987 5.33686 13.9987C6.22151 13.9987 7.06992 13.6473 7.69546 13.0217L13.8221 6.89505C14.0825 6.6347 14.5046 6.6347 14.7649 6.89505C15.0253 7.1554 15.0253 7.57751 14.7649 7.83786L8.63826 13.9645C7.76268 14.8401 6.57513 15.332 5.33686 15.332C4.09859 15.332 2.91104 14.8401 2.03546 13.9645C1.15987 13.0889 0.667969 11.9014 0.667969 10.6631C0.667969 9.42485 1.15987 8.2373 2.03546 7.36171L8.16212 1.23505C8.78752 0.609646 9.63575 0.258301 10.5202 0.258301C11.4046 0.258301 12.2529 0.609646 12.8783 1.23505C13.5037 1.86045 13.855 2.70867 13.855 3.59312C13.855 4.47756 13.5037 5.32579 12.8783 5.95119L6.74493 12.0779C6.36972 12.4531 5.86082 12.6639 5.33019 12.6639C4.79956 12.6639 4.29067 12.4531 3.91546 12.0779C3.54024 11.7026 3.32945 11.1937 3.32945 10.6631C3.32945 10.1325 3.54024 9.62359 3.91546 9.24838L9.57573 3.59477C9.83624 3.33457 10.2583 3.33482 10.5185 3.59532C10.7787 3.85583 10.7785 4.27794 10.518 4.53813L4.85826 10.1912C4.73328 10.3163 4.66279 10.4862 4.66279 10.6631C4.66279 10.8401 4.7331 11.0099 4.85826 11.135C4.98343 11.2602 5.15319 11.3305 5.33019 11.3305C5.5072 11.3305 5.67696 11.2602 5.80212 11.135L11.9355 5.00838C12.3106 4.63305 12.5217 4.12382 12.5217 3.59312C12.5217 3.06229 12.3108 2.55321 11.9355 2.17785C11.5601 1.8025 11.051 1.59163 10.5202 1.59163Z" fill="#B4ADB8"/></svg>
                                {{ __('Сохранить и продолжить позже') }}
                            </a>
                        </div>
                    </div>
                </form>
            </div>

            @include('partials.user_support', ['withLoyalty' => true])
        </div>
    </section>
@stop
