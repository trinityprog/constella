<div class="product {{ ($product->discount > 0) ? 'discount' : '' }}">
    @if(auth()->check())
        <a href="#" class="add-to-favorites {{ $product->favorite()->where('user_id', auth()->user()->id)->exists() ? 'active' : '' }}" data-product="{{ $product->id }}" data-user="{{ auth()->user()->id }}">
            <svg width="22" height="21" viewBox="0 0 22 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M15.95 0C14.08 0 12.21 0.88 11 2.31C9.79 0.88 7.92 0 6.05 0C2.64 0 0 2.64 0 6.05C0 10.23 3.74 13.64 9.46 18.7L11 20.13L12.54 18.7C18.15 13.53 22 10.12 22 6.05C22 2.64 19.36 0 15.95 0ZM11.11 17.16H11L10.89 17.05C5.61 12.32 2.2 9.24 2.2 6.05C2.2 3.85 3.85 2.2 6.05 2.2C7.7 2.2 9.35 3.3 10.01 4.84H12.1C12.65 3.3 14.3 2.2 15.95 2.2C18.15 2.2 19.8 3.85 19.8 6.05C19.8 9.24 16.39 12.32 11.11 17.16Z" fill="#272727"/>
                <path d="M8 16.0654L2 8.56543L1.5 5.06543L3 1.56543L5.5 1.06543L8.5 1.56543L10.5 3.56543H12L14.5 0.56543L17 1.56543L20 3.06543L21 6.06543L19 11.0654L11 18.5654L8 16.0654Z" fill="#C73145" fill-opacity="0"/>
            </svg>
        </a>
    @endif
    <a href="{{ route('page.product', $product->slug) }}" class="img-link">
        @php $secondImage = $product->images->where('is_main', 0)->first();@endphp
        <figure class="product-image {{ $secondImage ? 'hover-effect' : '' }}">
            @if($product->poster())
                <img class="lazy first" data-src="{{ $product->poster() }}" alt="{{ $product->poster_alt_tag() }}" />
                @if($secondImage)
                    @if(\Illuminate\Support\Facades\File::exists(public_path('i/products/images/'.$secondImage->name)))
                        <img class="lazy second" data-src="{{ url('i/products/images/'.$secondImage->name) }}" alt="" />
                    @endif
                @endif
            @else
                <img src="{{ url('i/products/no-image.jpg') }}" alt="">
            @endif
            <a href="#" class="add-to-cart" data-add-to-cart data-product="{{ $product->id }}">{{ __('Добавить в Корзину') }}</a>
        </figure>

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
    </a>
</div>
