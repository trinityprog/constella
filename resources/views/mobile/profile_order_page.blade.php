<div class="profile-page page-order">
    <div class="container">
        <p class="dropdown-list title-1"> {{ __('Заказы') }} <img src="{{ url('i/icons/arrow-down-sort.svg') }}" class="img" alt=""></p>

        <a href="{{ route('user.profile.orders') }}">
            <svg width="17" height="14" viewBox="0 0 17 14" fill="none" xmlns="http://www.w3.org/2000/svg" class="left-arrow">
                <path d="M1 7L0.646447 6.64645L0.292893 7L0.646447 7.35355L1 7ZM15.9783 7.5C16.2545 7.5 16.4783 7.27614 16.4783 7C16.4783 6.72386 16.2545 6.5 15.9783 6.5V7.5ZM6.64645 0.646447L0.646447 6.64645L1.35355 7.35355L7.35355 1.35355L6.64645 0.646447ZM0.646447 7.35355L6.64645 13.3536L7.35355 12.6464L1.35355 6.64645L0.646447 7.35355ZM1 7.5L15.9783 7.5V6.5L1 6.5V7.5Z" fill="#2E3338"/>
            </svg>
        </a>

        <div class="page-order-status">
            <p class="page-order-title">{{ __('Заказ') }} #{{ $order->unique_id }}</p>
            <p class="stage">{{ $order->displayStatus() }}</p>
        </div>

        <div class="check-before-pay">
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
        </div>

        <div class="content-order">
            <p class="content-order__title">{{ __('Содержание заказа') }} ({{ $order->products()->count() }})</p>
            @foreach($order->products as $product)
                <div class="cart-item flex discounted">
                    <figure><img src="{{ $product->product->poster() }}" alt=""></figure>
                    <div class="cart-content">
                        <div>
                            <div class="cart-title">
                                <h2 class="title"><a href="#" target="_blank">{{ $product->product->displayInfo() }}</a></h2>
                                <a href="#" class="close">
                                    <svg width="16" height="16" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M6.00015 4.58926L1.7027 0.291588C1.31394 -0.0971957 0.682504 -0.0971957 0.292501 0.291588C-0.0975011 0.681611 -0.0975011 1.31308 0.292501 1.7031L4.58996 6.00077L0.292502 10.2972C-0.0975006 10.6872 -0.0975006 11.3187 0.292502 11.7075C0.682504 12.0975 1.31394 12.0975 1.7027 11.7075L6.00015 7.40981L10.2976 11.7075C10.6876 12.0975 11.3178 12.0975 11.7078 11.7075C11.9034 11.5131 12 11.258 12 11.003C12 10.7479 11.9034 10.4928 11.7078 10.2972L7.41159 6.00077L11.7078 1.7031C11.9034 1.50871 12 1.25241 12 0.997343C12 0.742281 11.9034 0.487218 11.7078 0.291587C11.3178 -0.0971961 10.6876 -0.0971961 10.2976 0.291587L6.00015 4.58926Z" fill="#272727"/>
                                    </svg>
                                </a>
                            </div>
                            <div>
                                <p class="cart-price">
                                    <x-price :price="$product->price" :product-currency="$product->product->currency_id" />
                                </p>
                                <p class="cart-size">{{ $product->options('size') }}</p>
                                <p class="cart-color">{{ $product->options('color') }}</p>
                                <p class="cart-count">{{ $product->count }} шт</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="order-info">
            <div class="order-list">
                <p class="order-title">{{ __('Контактная информация:') }}</p>
                <p>{{ $order->info->recipient_fio }}</p>
                <p>{{ $order->info->recipient_phone }}</p>
                <p>{{ $order->user->email }}</p>
            </div>
            <div class="order-list">
                <div class="per-block">
                    <p class="order-title">{{ __('О заказе:') }}</p>
                    <p>{{ __('Дата создания:') }} {{ $order->created_at->format('d.m.Y') }}</p>
                    <p>
                        {{ __('Скидка:') }}
                        @if(isset($promocode->price))
                            <x-price :price="$promocode->price" />
                        @elseif(isset($promocode->percent))
                            {{ $promocode->percent . ' %' }}
                        @else
                            <span>-</span>
                        @endif
                    </p>
                    <p>{{ __('Упаковка:') }} <x-price :price="$order->info->package_price" /></p>
                    <p class="full_summ">
                        {{ __('Итого:') }}
                        <x-price :price="$order->full_summ" :productCurrency="$order->currency_id" />
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
