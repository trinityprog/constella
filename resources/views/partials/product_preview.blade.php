@inject('pinfo', 'App\Models\Product')

<div class="cart-modal-preview flex carted">
    <div class="image-prev">
        @if($product->poster())
            <img src="{{ $product->poster() }}" alt="{{ $product->displayName() }}">
        @else
            <img src="{{ url('i/products/no-image.jpg') }}" style="object-fit: contain;" alt="{{ $product->displayName() }}">
        @endif
        <div class="cart-modal-info">
            <div class="dropdown-list">{{ __('Описание') }}<span></span></div>
            <div class="information">
                <div class="slidedown-element" data-tab="description">
                    @if($product->description)
                        <div class="duo flex items-start">
                            <div>
                                <p>{{ $product->getDescription() }}</p>
                            </div>
                            <div>
                                <p>{{ $product->getDescriptionRight() }}</p>
                            </div>
                        </div>
                    @else
                        <div class="duo text-center">-</div>
                    @endif
                </div>
            </div>
        </div>
        <div class="cart-modal-info">
            <div class="dropdown-list">{{ __('Детали') }}<span></span></div>
            <div class="information">
                <div class="slidedown-element" data-tab="details">
                    <div class="details-table">
                        @if($product->getCharacteristic('mass'))
                            <p><span class="left">{{ __('Масса') }}</span><span class="right">{{ $product->getCharacteristic('mass') }}</span></p>
                        @endif
                        @if($product->getCharacteristic('metal_color'))
                            <p><span class="left">{{ __('Материал') }}</span><span class="right">{{ $product->getCharacteristic('metal_color') }}</span></p>
                        @endif
                        @if($product->getCharacteristic('stones'))
                            <p>
                                <span class="left">{{ __('Камни') }}</span>
                                <span class="right">
                                        @foreach(json_decode($product->getCharacteristic('stones')) as $stone)
                                        {{ $stone->stone_type }} @if(!$loop->last), @endif
                                    @endforeach
                                    </span>
                            </p>
                        @endif
                        @if($product->getCharacteristic('brand'))
                            <p><span class="left">{{ __('Бренд') }}</span><span class="right">{{ $product->getCharacteristic('brand') }}</span></p>
                        @endif
                        @if($product->getCharacteristic('collection'))
                            <p><span class="left">{{ __('Коллекция') }}</span><span class="right">{{ $product->getCharacteristic('collection') }}</span></p>
                        @endif
                        @if($product->getCharacteristic('cloth_material'))
                            <p>
                                <span class="left">{{ __('Материал') }}</span>
                                <span class="right">
                                        @foreach(json_decode($product->getCharacteristic('cloth_material')) as $material)
                                        {{ $material }} @if(!$loop->last) , @endif
                                    @endforeach
                                    </span>
                            </p>
                        @endif
                        @if($product->getCharacteristic('country_provider'))
                            <p><span class="left">{{ __('Страна поставщик') }}</span><span class="right">{{ $product->getCharacteristic('country_provider') }}</span></p>
                        @endif
                        @if($product->getCharacteristic('cloth_season'))
                            <p><span class="left">{{ __('Сезон') }}</span><span class="right">{{ $product->getCharacteristic('cloth_season') }}</span></p>
                        @endif
                        @if($product->getCharacteristic('lining'))
                            <p><span class="left">{{ __('Подклад') }}</span><span class="right">{{ $product->getCharacteristic('lining') }}</span></p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="description-prev">
        <p class="some-text">{{ $product->displayInfo() }}</p>

        <h1 class="name">{{ $product->displayName() }}</h1>

        <p class="price flex item-center">
            <svg width="8" height="8" viewBox="0 0 8 8" fill="none" xmlns="http://www.w3.org/2000/svg"><circle cx="4" cy="4" r="4" fill="#2E3338"/></svg>
            <x-price :price="$product->price" :product-currency="$product->currency_id" />
        </p>

        <div class="colors">
            <p class="f-title">{{ __('Цвет') }} <span class="choosen-color"></span></p>
            <div class="colors-list flex item-center">
                @foreach($attributes->colors as $color => $prod_id)
                    @php
                        $c = App\Models\Color::where('abbr', $color)->first();
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

        <div class="sizes">
            <div class="sizes-list">
                <input type="hidden" name="sizes">
                @foreach($attributes->sizes as $size => $prod_id)
                    <a href="#"
                       data-product-id="{{ $prod_id }}"
                       data-size="{{ $size }}"
                       data-sname="{{ $size }}"
                       class="size-item">{{ $size }}
                    </a>
                @endforeach
            </div>
        </div>


        <script>
            $(document).ready(function() {
                if($('[data-color]').length === 1) $('[data-color]').first().attr('first-click', true).click();
                if($('[data-size]').length === 1) $('[data-size]').first().attr('first-click', true).click();

                $('.dropdown-list').click(function (e) {
                    $(this).toggleClass('active');
                    $(this).parent().find('.slidedown-element').stop().slideToggle();
                });
            });
        </script>

        <div class="actions flex items-start space-between">
            <div class="relative">
                <a href="#" class="btn-black action-add-to-cart" data-quantity="1" data-product="{{ $product->id }}">
                    {{ __('Добавить в корзину') }}
                    <img src="{{ asset('i/icons/add.svg') }}" class="add-icon" alt="">
                </a>
                <a href="{{ route('page.product', $product->slug) }}" class="btn-transparent">
                    {{ __('Страница товара') }}
                    <img src="{{ asset('i/icons/product-arrow.svg') }}" class="add-icon" alt="">
                </a>
            </div>
        </div>
    </div>
</div>
