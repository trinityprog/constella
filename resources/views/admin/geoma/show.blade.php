@extends('adminlte::page')

@section('title', 'Информация о заявке '. $geoma->id)

@section('content_header')
    <a href="{{ url('/admin/geoma') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Назад</button></a>
    <h1 class="text-center mb-4">Информация о заявке #{{ $geoma->id }}</h1>
@stop

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Заказчик: </div>
                <div class="card-body">
                    <p>Имя: <br><strong>{{ $geoma->name }}</strong></p>
                    <p>Фамилия: <br><strong>{{ $geoma->surname }}</strong></p>
                    <p>Email: <br><strong>{{ $geoma->email }}</strong></p>
                    <p>Город: <br><strong>{{ $geoma->city }}</strong></p>
                    <p>Вид связи: <br><strong>{{ $geoma->connection }}</strong></p>
                    <p>Стоимость изделия: <br><strong>${{ $geoma->price }}</strong></p>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Изделие</div>
                <div class="card-body">
                    @php $fig = json_decode($geoma->figures, true) @endphp
                    @foreach($fig as $i => $g)
                        <div class="d-flex">
                            <p><img src="{{ url($g['image']) }}" alt="" style="width: 200px; height: 200px; object-fit: contain;"></p>
                            <div>
                                <p><strong>{{ ++$i }}.</strong></p>
                                <p>
                                    @if($g['date']) Дата: {{ $g['date'] }} <br> @endif
                                    @if($g['name']) Имя: {{ $g['name'] }} <br> @endif
                                    @if($g['text']) Текст: {{ $g['text'] }} <br> @endif
                                    @if($g['type']) {{ $g['type'] }} <br> @endif
                                    @if($g['decorate']) {{ $g['decorate'] }} <br>@endif
                                    @if($g['material']) {{ $g['material'] }} <br>@endif
                                    @if($g['heartStone']) {{ $g['heartStone'] }} <br>@endif
                                    @if($g['enamelColor']) {{ $g['enamelColor'] }} <br>@endif
                                    @if($g['decorateStone']) {{ $g['decorateStone'] }}@endif
                                </p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
