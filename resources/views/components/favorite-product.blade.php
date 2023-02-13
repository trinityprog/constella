<div class="product carted {{ ($product->discount > 0) ? 'discount' : '' }}">
    <div class="product-item-close" data-id="{{ $product->id }}">
        <svg width="16" height="16" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M6.00015 4.58926L1.7027 0.291588C1.31394 -0.0971957 0.682504 -0.0971957 0.292501 0.291588C-0.0975011 0.681611 -0.0975011 1.31308 0.292501 1.7031L4.58996 6.00077L0.292502 10.2972C-0.0975006 10.6872 -0.0975006 11.3187 0.292502 11.7075C0.682504 12.0975 1.31394 12.0975 1.7027 11.7075L6.00015 7.40981L10.2976 11.7075C10.6876 12.0975 11.3178 12.0975 11.7078 11.7075C11.9034 11.5131 12 11.258 12 11.003C12 10.7479 11.9034 10.4928 11.7078 10.2972L7.41159 6.00077L11.7078 1.7031C11.9034 1.50871 12 1.25241 12 0.997343C12 0.742281 11.9034 0.487218 11.7078 0.291587C11.3178 -0.0971961 10.6876 -0.0971961 10.2976 0.291587L6.00015 4.58926Z" fill=""/></svg>
    </div>
    <a href="{{ route('page.product', $product->slug) }}" class="image-link">
        <div class="product-image favorite-product-image">
            @if($product->poster())
                <img class="lazy" data-src="{{ $product->poster() }}" alt="" />
            @else
                <img src="{{ url('i/products/no-image.jpg') }}" alt="">
            @endif
                <a class="add-to-cart-hidden" data-add-to-cart data-product="{{ $product->id }}">{{ __('Добавить в Корзину') }}</a>
        </div>
    </a>

    <div class="product-info-card flex items-start space-between">
        <p class="product-title">
            <span class="brand">{{ $product->getCharacteristic('brand') }}</span>
            <span class="category">{{ $product->getCharacteristic('product_type') }}</span> <br>
        </p>
        <div>
            @if($product->discount > 0)
                <p class="product-price dlocked flex item-center">-</p>
            @endif
            <p class="product-price {{ $product->discount > 0 ? 'douted' : '' }} flex item-center">
                <x-price :price="$product->price" :product-currency="$product->currency_id" />
                <svg width="8" height="8" viewBox="0 0 8 8" fill="none" xmlns="http://www.w3.org/2000/svg"><circle cx="4" cy="4" r="4" fill="#2E3338"/></svg>
            </p>
        </div>
    </div>
    @desktop
    <div class="select-size">
        <div class="dropdown-list mobile-slideover element selected-size">{{ __('Выбрать цвет и размер') }} <img src="{{ url('i/icons/arrow-down-sort.svg') }}" alt=""></div>
        <div class="slidedown-element">
            <div class="colors">
                <p class="f-title">{{ __('Цвет') }} <span class="choosen-color"></span></p>
                <div class="colors-list flex item-center">
                    @foreach($data['attributes']->colors as $color => $prod_id)
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
            <div class="sizes favorite-sizes">
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
        </div>
    </div>
    <a href="#" class="btn-black action-add-to-cart" data-quantity="1" data-product="{{ $product->id }}">
        {{ __('Добавить в корзину') }}
    </a>
    @enddesktop
</div>

@section('scripts')
    <script>
        $(document).ready(function() {
            if($('[data-color]').length === 1) $('[data-color]').first().attr('first-click', true).click();
            if($('[data-size]').length === 1) $('[data-size]').first().attr('first-click', true).click();
        });
    </script>
@endsection


