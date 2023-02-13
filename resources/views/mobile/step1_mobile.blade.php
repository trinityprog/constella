<section>
    <div class="container">
        <div class="contacts">
            <div class="dropdown sorting">
                <a href="#" class="element link flex">КОНТАКТЫ <img src="{{ url('i/icons/arrow-down-sort.svg') }}" class="img" alt=""></a>
            </div>
        </div>
        <form action="{{ route('order.create') }}" class="form styled" method="post">
            <div class="form-group">
                <input value="{{ (auth()->check()) ? auth()->user()->email : Cookie::get('guest_email') }}" name="order_user_email" type="email" class="step-page-form__template-input" placeholder="myemail@mail.com">
            </div>
            <div class="form-group">
                <input value="{{ auth()->check() ? auth()->user()->name : '' }}" name="order_user_name" type="text" class="step-page-form__template-input" placeholder="Ваше имя">
            </div>
            <div class="form-group">
                <input value="{{ (auth()->check() && !empty(auth()->user()->info->phone)) ? auth()->user()->info->phone : '' }}" name="order_user_phone" type="tel" placeholder="Телефон" class="step-page-form__template-input">
            </div>
            <nav class="info-page-nav partnership">
            <ul class="info-page-list">
                <li class="info-page-list__item">
                    <div class="info-page-list__link dropdown-list">
                        <p class="info-page-list__text">{!! __('Получатель другой человек') !!}</p>
                        <div class="info-page-tab__mark">
                            <span class="info-page-tab__mark-item"></span>
                            <span class="info-page-tab__mark-item "></span>
                        </div>
                    </div>
                    <div class="order-page-form slidedown-element">
                        <div class="form-group @error('order_recipient_fio') form-error @enderror">
{{--                            <label class="infoed trans">--}}
{{--                                {{ __('ФИО') }} <a class="info-tooltip" data-microtip-size="large" aria-label="Введите корректные данные" data-microtip-position="right" role="tooltip"></a>--}}
{{--                            </label>--}}
                            @error('order_recipient_fio') <span class="error-msg">{{ $message }}</span> @enderror
                            <input value="{{ old('order_recipient_fio') }}" name="order_recipient_fio" type="text" class="order-page-form__template-input" placeholder="{{ __('Фамилия Имя Отчество') }}">
                        </div>
                        <div class="form-group @error('order_recipient_phone') form-error @enderror">
{{--                            <label>{{ __('Телефон') }}</label>--}}
                            @error('order_recipient_phone') <span class="error-msg">{{ $message }}</span> @enderror
                            <input value="{{ old('order_recipient_phone') }}" name="order_recipient_phone" type="tel" placeholder="{{ __('Телефон') }}" class="order-page-form__template-input">
                        </div>
                    </div>
                </li>
{{--                <li class="info-page-list__item">--}}
{{--                    <a href="#promo-code" class="info-page-list__link ">--}}
{{--                        <p class="info-page-list__text">{{ __('ВВЕСТИ ПРОМОКОД') }}</p>--}}
{{--                        <div class="info-page-tab__mark"><span class="info-page-tab__mark-item"></span><span class="info-page-tab__mark-item  "></span></div>--}}
{{--                    </a>--}}
{{--                </li>--}}
            </ul>
        </nav>
            <div class="holder-right">
                <p class="cart-total"><span class="cart-items-count {{ ($cart::count() == 0) ? 'none' : '' }}">{{ $cart::count() }}</span> {{ \App\Http\Controllers\Api\CDEKController::true_wordform($cart::count(), 'товар', 'товара', 'товаров') }}</p>
                <div class="cart-full-price">
                    <p class="total">{{ __('Итого к оплате:') }} <br> <span>{{ \App\Services\CartService::getTotal() }}</span></p>
                </div>
                <x-promocode/>
                <button type="submit" class="btn-black {{ $cart::count() == 0 ? 'disabled' : '' }}">{{ __('Оформить заказ') }}</button>
            </div>
        </form>
        @include('partials.user_support')
    </div>
</section>
