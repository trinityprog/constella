<p class="head">{{ __('Товаров в корзине') }} <span
        class="cart-items-count {{ $cart_count ? '' : 'none' }}">{{ $cart_count }}</span>
</p>
@foreach($cart_content as $product)
    <div class="flex cart-preview-info order-item">
        <div class="flex">
            <div class="flex img-title">
                <img src="{{ $product->model->poster() }}" alt="">
            </div>
            <div class="cart-preview-text">
                <div class="main">
                    <p class="name">{{ $product->model->displayName() }}</p>
                    <a href="#" class="close" data-id="{{ ($product->rowId) ?? null }}">
                        <svg width="16" height="16" viewBox="0 0 12 12" fill="none"
                             xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                  d="M6.00015 4.58926L1.7027 0.291588C1.31394 -0.0971957 0.682504 -0.0971957 0.292501 0.291588C-0.0975011 0.681611 -0.0975011 1.31308 0.292501 1.7031L4.58996 6.00077L0.292502 10.2972C-0.0975006 10.6872 -0.0975006 11.3187 0.292502 11.7075C0.682504 12.0975 1.31394 12.0975 1.7027 11.7075L6.00015 7.40981L10.2976 11.7075C10.6876 12.0975 11.3178 12.0975 11.7078 11.7075C11.9034 11.5131 12 11.258 12 11.003C12 10.7479 11.9034 10.4928 11.7078 10.2972L7.41159 6.00077L11.7078 1.7031C11.9034 1.50871 12 1.25241 12 0.997343C12 0.742281 11.9034 0.487218 11.7078 0.291587C11.3178 -0.0971961 10.6876 -0.0971961 10.2976 0.291587L6.00015 4.58926Z"
                                  fill="#DCDCDC"/>
                        </svg>
                    </a>
                </div>
                <p class="size">
                    <span>{{ __('Размер') }}</span>
                    <b>{{ ($product->options->size == 'one') ? 'One size' : $product->options->size }}</b>
                </p>
                <p class="color">
                    <span>{{ __('Цвет') }}</span> <b>{{ $product->options->color }}</b>
                </p>
            </div>
        </div>
        <p class="price">
            <x-price :price="$product->price" :product-currency="$product->model->currency_id"/>
        </p>
    </div>
@endforeach
<div class="cart-footer" style="justify-content: flex-end">
    <p class="sum">{{ __('Итого') }}<span>{{ $cart_total }}</span></p>
</div>
<div class="cart-notification-preview-buttons">
    <a href="{{ route('cart') }}" class="cart-preview-button">{{ __('Моя корзина') }}</a>
    <a href="{{ route('order.main') }}" class="btn-black">{{ __('Оформить') }}</a>
</div>
