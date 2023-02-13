@extends('layouts.theme')

@section('title', 'Заказ '. $order->unique_id)

@section('content')
    @desktop
    <div class="profile-page order-show">
        <div class="container">
            <div class="inner">
                <div class="heads">
                    <p class="title flex item-center"><img src="{{ url('i/icons/r-w-order.svg') }}" alt="">{{ __('Заказ') }} {{ $order->unique_id }} </p>
                    <span class="status">{{ $order->displayStatus() }}</span>
                </div>
                <div class="order-info flex items-start">
                    <div class="of-block">
                        <p class="m-title">{{ __('Содержание заказа') }} ({{ $order->products()->count() }})</p>

                        <div class="orders-list">
                            @foreach($order->products as $product)
                                <div class="order-item flex item-center">
                                    <figure><img src="{{ $product->product->poster() }}" alt=""></figure>
                                    <div class="order-content">
                                        <div>
                                            <h2 class="title"><a target="_blank" href="{{ route('page.product', $product->product->slug) }}">{{ $product->product->displayName() }}</a></h2>
                                            <p class="category">{{ $product->product->displayInfo() }}</p>
                                        </div>
                                        <div class="little-info flex column">
                                            <p class="count">{{ $product->count }} шт</p>
                                            <div class="flex item-center space-between">
                                                <div class="flex item-center">
                                                    <p class="size"><span>{{ __('Размер:') }}</span> {{ $product->options('size') }}</p>
                                                    <p class="color"><span>{{ __('Цвет:') }}</span> {{ $product->options('color') }}</p>
                                                </div>
                                                <p class="price"><x-price :price="$product->price" :product-currency="$product->product->currency_id" /></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="of-info">
                        <div class="per-block">
                            <p class="m-title">{{ __('Контактная информация:') }}</p>
                            <p>{{ $order->info->recipient_fio }}</p>
                            <p>{{ $order->info->recipient_phone }}</p>
                            <p>{{ $order->user->email }}</p>
                        </div>
                        {{--                    @if($order->info->address)--}}
                        {{--                        <div class="per-block">--}}
                        {{--                            <p class="m-title">{{ __('Адрес и способ доставки:') }}</p>--}}
                        {{--                            <p class="flex item-center" style="gap: 10px;">--}}
                        {{--                                <img src="{{ url('i/icons/pin-bg.png') }}" alt="">--}}
                        {{--                                {{ $order->info->address->country }}, {{ $order->info->address->city }},--}}
                        {{--                                {{ $order->info->address->index }}, {{ $order->info->address->address }}--}}
                        {{--                            </p>--}}
                        {{--                            <p>--}}
                        {{--                                @if($order->info->delivery_type == 'selfpickup')--}}
                        {{--                                    <span class="flex item-center" style="gap: 10px;">--}}
                        {{--                                        <img src="{{ url('i/icons/pin-bg.png') }}" alt="">--}}
                        {{--                                        {{ $order->info->delivery_pickup }}--}}
                        {{--                                    </span>--}}
                        {{--                                @else--}}
                        {{--                                    <span class="flex item-center" style="gap: 10px;">--}}
                        {{--                                        <img src="{{ url('i/icons/cdek.svg') }}" style="width: 24px; height: 24px;" alt="">--}}
                        {{--                                        <span>CDEK <x-price :price="$order->info->delivery_price" /></span>--}}
                        {{--                                    </span>--}}
                        {{--                                @endif--}}
                        {{--                            </p>--}}
                        {{--                        </div>--}}
                        {{--                    @endif--}}

                        @if($order->info->delivery_type != 'selfpickup')
                            @if($order->info->address)
                                <div class="per-block">
                                    <p class="m-title">{{ __('Адрес и способ доставки:') }}</p>
                                    <p class="flex item-center" style="gap: 10px;">
                                        <img src="{{ url('i/icons/pin-bg.png') }}" alt="">
                                        {{ $order->info->address->country }}, {{ $order->info->address->city }},
                                        {{ $order->info->address->index }}, {{ $order->info->address->address }}
                                    </p>
                                    <span class="flex item-center" style="gap: 10px;">
                                        <img src="{{ url('i/icons/cdek.svg') }}" style="width: 24px; height: 24px;" alt="">
                                        <span>CDEK <x-price :price="$order->info->delivery_price" /></span>
                                    </span>
                                </div>
                            @endif
                        @elseif($order->info->delivery_type == 'selfpickup')
                            <div class="per-block">
                                <p class="m-title">{{ __('Самовывоз:') }}</p>
                                <p>
                                    @if($order->info->delivery_pickup)
                                        <span class="flex item-center" style="gap: 10px;">
                                            <img src="{{ url('i/icons/pin-bg.png') }}" alt="">
                                            {{ $order->info->delivery_pickup }}
                                        </span>
                                    @endif
                                </p>
                            </div>
                        @endif

                        <div class="per-block">
                            <p class="m-title">{{ __('О заказе:') }}</p>
                            <p>{{ __('Дата создания:') }} {{ $order->created_at->format('d.m.Y') }}</p>
                            <p>
                                {{ __('Скидка:') }}
                                @if(isset($promocode->price))
                                    <x-price :price="$promocode->price" />
                                @elseif(isset($promocode->percent))
                                    {{ $promocode->percent . ' %' }}
                                @endif
                            </p>
                            <p>{{ __('Упаковка:') }} <x-price :price="$order->info->package_price" /></p>
                            <p class="full_summ">
                                {{ __('Итого:') }}
                                <x-price :price="$order->full_summ" :productCurrency="$order->currency_id" />
                            </p>
                        </div>

                        @if($order->status == 4)
                            <a href="#return" class="btn-black">
                                <svg width="14" height="18" viewBox="0 0 14 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M13 4.11111L13.3485 4.46961L13.7173 4.11111L13.3485 3.75261L13 4.11111ZM0.5 8C0.5 8.27614 0.723858 8.5 1 8.5C1.27614 8.5 1.5 8.27614 1.5 8L0.5 8ZM10.1485 7.58072L13.3485 4.46961L12.6515 3.75261L9.45146 6.86372L10.1485 7.58072ZM13.3485 3.75261L10.1485 0.641502L9.45146 1.3585L12.6515 4.46961L13.3485 3.75261ZM13 3.61111L4.88889 3.61111L4.88889 4.61111L13 4.61111L13 3.61111ZM4.88889 3.61111C2.46497 3.61111 0.5 5.57608 0.5 8L1.5 8C1.5 6.12837 3.01726 4.61111 4.88889 4.61111L4.88889 3.61111Z" fill="white"/>
                                    <path d="M1 13.8889L0.651461 13.5304L0.282721 13.8889L0.651461 14.2474L1 13.8889ZM13.5 10C13.5 9.72386 13.2761 9.5 13 9.5C12.7239 9.5 12.5 9.72386 12.5 10L13.5 10ZM3.85146 10.4193L0.651461 13.5304L1.34854 14.2474L4.54854 11.1363L3.85146 10.4193ZM0.651461 14.2474L3.85146 17.3585L4.54854 16.6415L1.34854 13.5304L0.651461 14.2474ZM1 14.3889L9.11111 14.3889L9.11111 13.3889L1 13.3889L1 14.3889ZM9.11111 14.3889C11.535 14.3889 13.5 12.4239 13.5 10L12.5 10C12.5 11.8716 10.9827 13.3889 9.11111 13.3889L9.11111 14.3889Z" fill="white"/>
                                </svg>
                                {{ __('Оформить возврат') }}
                            </a>
                        @endif

                        @if(!$order->info->address)
                            <a href="{{ route('order.delivery', $order->id) }}" class="btn-black">
                                {{ __('Заполнить адрес доставки') }}
                            </a>
                        @elseif($order->status == 0)
                            <a href="{{ route('order.payment.1', $order->id) }}" class="btn-black">
                                {{ __('Оплатить') }}
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    @enddesktop
    @handheld
    @include('mobile.profile_order_page')
    @endhandheld
@stop

@section('modal')
    <div class="remodal return-modal" data-remodal-id="return">
        <div class="modal-body">
            <p class="title"><img src="{{ url('i/icons/r-b-return.svg') }}" alt="">{{ __('Возврат товара') }}</p>

            <div class="return-blocks">
                <div class="return-block">
                    <a href="{{ url('info-return#addresses') }}" class="btn-white">
                        <svg width="10" height="14" viewBox="0 0 10 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M4.99997 0C2.24296 0 0 2.33729 0 5.21023C0 6.81722 0.793982 8.76774 2.35996 11.0076C3.50595 12.6468 4.63522 13.8158 4.68274 13.8648C4.77009 13.9549 4.88501 14 5.00005 14C5.11176 14 5.22355 13.9574 5.3102 13.8719C5.35783 13.825 6.48996 12.7033 7.63811 11.0867C9.20535 8.88004 10 6.90292 10 5.2102C9.99995 2.33729 7.75693 0 4.99997 0ZM4.99997 7.45955C3.65209 7.45955 2.55555 6.33704 2.55555 4.95729C2.55555 3.57755 3.65212 2.45504 4.99997 2.45504C6.34782 2.45504 7.4444 3.57755 7.4444 4.95729C7.4444 6.33704 6.3478 7.45955 4.99997 7.45955Z" fill="#272727"/>
                        </svg>
                        {{ __('САМОСТОЯТЕЛЬНО') }}
                    </a>
                    <p>{{ __('Вы можете лично привезти товар') }}</p>
                </div>
                <div class="return-block">
                    <a href="{{ route('page.return', $order->id) }}" class="btn-white">
                        <svg width="18" height="15" viewBox="0 0 18 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M14.5993 10.2009C13.93 10.2009 13.387 9.65859 13.387 8.98937C13.387 8.32015 13.93 7.77713 14.5993 7.77713C15.2685 7.77713 15.8115 8.32015 15.8115 8.98937C15.8115 9.65859 15.2685 10.2009 14.5993 10.2009ZM11.0352 9.95086H6.96647C6.43427 9.95086 6.00231 9.5189 6.00231 8.98669C6.00231 8.45377 6.43427 8.0218 6.96647 8.0218H11.0352C11.5681 8.0218 11.9993 8.45377 11.9993 8.98669C11.9993 9.5189 11.5681 9.95086 11.0352 9.95086ZM3.4015 10.2009C2.73228 10.2009 2.18998 9.65859 2.18998 8.98937C2.18998 8.32015 2.73228 7.77713 3.4015 7.77713C4.07072 7.77713 4.61302 8.32015 4.61302 8.98937C4.61302 9.65859 4.07072 10.2009 3.4015 10.2009ZM5.47444 1.36446H9.00155H12.5287C14.1779 1.36446 14.8818 3.72332 15.1306 4.91105C14.9604 4.88509 14.7902 4.85912 14.6128 4.85912H3.39034C3.21294 4.85912 3.04275 4.88509 2.87184 4.91105C3.12208 3.72332 3.82591 1.36446 5.47444 1.36446ZM16.3829 5.37144C16.2971 4.70005 15.6084 0.210938 12.527 0.210938H8.99987H5.47276C2.39131 0.210938 1.70262 4.70005 1.6168 5.37144C0.64975 5.96854 0 7.02862 0 8.24808V9.45743V9.99108V13.2146C0 13.8744 0.535088 14.4095 1.19493 14.4095H1.66151C2.32136 14.4095 2.85645 13.8744 2.85645 13.2146V12.0045L8.52391 12.1185L15.144 11.9858V13.2146C15.144 13.8744 15.6784 14.4095 16.3382 14.4095H16.8055C17.4654 14.4095 17.9997 13.8744 17.9997 13.2146V9.99108V9.45743V8.24808C17.9997 7.02862 17.3493 5.96854 16.3829 5.37144Z" fill="#2E3338"/>
                        </svg>
                        {{ __('ВЫЗОВ КУРЬЕРА') }}
                    </a>
                    <p>{{ __('Для оформления возврата с помощью курьера') }}</p>
                </div>
            </div>

            <p class="return-save">
                <img src="{{ url('i/icons/i-sign.png') }}" alt=""> {{ __('В нашем интернет-магазине') }}
            </p>
        </div>
    </div>
@stop
