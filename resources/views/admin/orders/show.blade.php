@extends('adminlte::page')

@section('title', 'Заказ #'. $order->unique_id)

@section('content_header')
    <a href="{{ url('/admin/orders') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Назад</button></a>
    <h1 class="text-center mb-4">Заказ #{{ $order->unique_id }}</h1>
@stop

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Информация о заказе</div>
                <div class="card-body">
                    <p>Создан: <br> <strong>{{ $order->created_at }}</strong></p>
                    <p>Получатель ФИО: <br><strong>{{ $order->info->recipient_fio }}</strong></p>
                    <p>Получатель телефон: <br><strong>{{ $order->info->recipient_phone }}</strong></p>
                    <p>Тип доставки: <br><strong>{{ $order->info->delivery_type === 'selfpickup' ? 'Самовызов' : 'Доставка' }}</strong></p>
                    <p>Тип упаковки: <br><strong>{{ $order->info->package_type === 'unique_branded' ? 'Упаковка бренда' : 'Стандартная упаковка' }}</strong></p>
                    @if($order->info->delivery_type === 'courier')
                        <p>Адрес доставки: <br>
                            <strong>
                                {{ $order->info->address->country }},
                                {{ $order->info->address->area }},
                                {{ $order->info->address->city }},
                                {{ $order->info->address->index }},
                                {{ $order->info->address->address }}
                            </strong>
                        </p>
                        <p>Стоимость доставки: <br> <strong>{{ $order->info->delivery_price }} тг.</strong></p>
                        <p>Дней доставки: <br> <strong>{{ $order->info->delivery_days }}</strong></p>
                    @endif
                    @if($order->info->delivery_type === 'selfpickup')
                        <p>Место самовызова: <br><strong>{{ $order->info->delivery_pickup }}</strong></p>
                    @endif
                    <p>Статус: <br><strong>{{ $order->displayStatus() }}</strong></p>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Информация о товарах: </div>
                <div class="card-body table-responsive table-striped p-0">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Наименование</th>
                                <th>Количество</th>
                                <th>Характеристики</th>
                                <th>Стоимость</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($order->products as $item)
                                @php $options = json_decode($item->options, true); @endphp
                                <tr>
                                    <td><a target="_blank" href="{{ route('page.product', $item->product->slug) }}">{{ $item->product->name }}</a></td>
                                    <td>{{ $item->count }} шт.</td>
                                    <td>
                                        <p>Размер: {{ $options['size'] }} <br>
                                        Цвет: {{ $options['color'] }}</p>
                                    </td>
                                    <td>{{ $item->price }} {{ $options['currency'] }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
