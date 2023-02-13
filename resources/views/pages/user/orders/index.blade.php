@extends('layouts.theme')

@section('title', 'Мои заказы')

@section('content')
    <div class="profile-page orders">
        <div class="container">
            <div class="inner tabos">
                @desktop
                <div class="heads">
                    <p class="title flex item-center space-center"><img src="{{ url('i/icons/r-orders.svg') }}" alt="">{{ __('Мои заказы') }}</p>
                </div>
                @enddesktop
                <div class="tabs-header">
                    <a href="#" data-link-tab="all" class="active">{{ __('Все заказы') }} <span>{{ $orders->count() }}</span></a>
                    @desktop
                    <a href="#" data-link-tab="finished">{{ __('Завершенные') }} <span>{{ $orders->where('status', 4)->count() }}</span></a>
                    @enddesktop
                    <a href="#" data-link-tab="returns">{{ __('Возвраты') }} <span>{{ $orders->where('status', 5)->count() }}</span></a>
                </div>

                <div class="tabs-content">
                    <div class="tab-content active" data-tab="all">
                        @forelse($orders->sortByDesc('id') as $order)
                            @if($order->getFullSumm() != 0)
                                <div class="product-block-lined">
                                    <a href="{{ route('user.profile.orders.show', $order->id) }}" class="flex item-center">
                                        @if ($order->products->first())
                                            <figure><img src="{{ $order->products->first()->product->poster() ?? '' }}" alt=""></figure>
                                        @endif
                                        <div class="product-info flex items-start space-between">
                                            <div>
                                                <p class="id">№ {{ $order->unique_id }}</p>
                                                @handheld
                                                <p class="status-mob">{{ $order->displayStatus() }}</p>
                                                @endhandheld
                                                <p class="count">{{ $order->products()->count() }} {{ __('товара') }}</p>
                                                <p class="sum">{{ __('Сумма') }} {{ \App\Services\CartService::formatTotal($order->getFullSumm()) }}</p>
                                            </div>
                                            @desktop
                                            <span class="status">{{ $order->displayStatus() }}</span>
                                            @enddesktop
                                        </div>
                                    </a>
                                </div>
                            @endif
                        @empty
                            <p class="empty">{{ __('Нет заказов') }}</p>
                        @endforelse
                    </div>
                    <div class="tab-content" data-tab="finished">
                        @forelse($orders->where('status', 4)->sortByDesc('id') as $order)
                            @if($order->getFullSumm() != 0)
                                <div class="product-block-lined">
                                    <a href="{{ route('user.profile.orders.show', $order->id) }}" class="flex item-center">
                                        @if ($order->products->first())
                                            <figure><img src="{{ $order->products->first()->product->poster() ?? '' }}" alt=""></figure>
                                        @endif
                                        <div class="product-info flex items-start space-between">
                                            <div>
                                                <p class="id">№ {{ $order->unique_id }}</p>
                                                <p class="count">{{ $order->products()->count() }} {{ __('товара') }}</p>
                                                <p class="sum">{{ __('Сумма') }} {{ \App\Services\CartService::formatTotal($order->getFullSumm()) }}</p>
                                            </div>
                                            <span class="status">{{ $order->displayStatus() }}</span>
                                        </div>
                                    </a>
                                </div>
                            @endif
                        @empty
                            <p class="empty">{{ __('Нет заказов') }}</p>
                        @endforelse
                    </div>
                    <div class="tab-content" data-tab="returns">
                        @forelse($orders->where('status', 5)->sortByDesc('id') as $order)
                            @if($order->getFullSumm() != 0)
                                <div class="product-block-lined">
                                    <a href="{{ route('user.profile.orders.show', $order->id) }}" class="flex item-center">
                                        @if ($order->products->first())
                                            <figure><img src="{{ $order->products->first()->product->poster() ?? '' }}" alt=""></figure>
                                        @endif
                                        <div class="product-info flex items-start space-between">
                                            <div>
                                                <p class="id">№ {{ $order->unique_id }}</p>
                                                <p class="count">{{ $order->products()->count() }} {{ __('товара') }}</p>
                                                <p class="sum">{{ __('Сумма') }} {{ \App\Services\CartService::formatTotal($order->getFullSumm()) }}</p>
                                            </div>
                                            <span class="status">{{ $order->displayStatus() }}</span>
                                        </div>
                                    </a>
                                </div>
                            @endif
                        @empty
                            <p class="empty">{{ __('Нет заказов') }}</p>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>

{{--    @handheld--}}
{{--    @include('mobile.profile_order_page')--}}
{{--    @endhandheld--}}
@stop
