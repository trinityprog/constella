@if(!empty($order))
    <div class="order-steps flex item-center">
        <a class="disabled" href="#">{{ __('Мой заказ') }}</a>
        <a class="disabled {{ (!empty($order) && request()->routeIs('order.main', $order->id)) ? 'active' : '' }}" href="{{ route('order.main', $order->id) }}">{{ __('Контакты') }}</a>
        <a class="{{ (!empty($order) && request()->routeIs('order.dinfo', $order->id)) ? 'active' : '' }}" href="{{ route('order.dinfo', $order->id) }}">{{ __('Доставка') }}</a>
        <a class="{{ (!empty($order) && request()->routeIs('order.payment.1', $order->id)) ? 'active' : '' }}" href="{{ route('order.payment.1', $order->id) }}">{{ __('Оплата') }}</a>
    </div>
@endif
