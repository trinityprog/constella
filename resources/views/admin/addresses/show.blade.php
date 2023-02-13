@extends('adminlte::page')

@section('title', 'Адрес #'. $address->id)

@section('content_header')
    <a href="{{ route('admin.addresses.index') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Назад</button></a>
    <h1 class="text-center mb-4">Адрес #{{ $address->id }}</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Информация о заказе</div>
                <div class="card-body">
                    <p>Создан: <br> <strong>{{ $address->created_at }}</strong></p>
                    <p>Страна: <br><strong>{{ $address->country }}</strong></p>
                    <p>Область: <br><strong>{{ $address->area }}</strong></p>
                    <p>Город: <br><strong>{{ $address->city }}</strong></p>
                    <p>Индекс: <br><strong>{{ $address->index }}</strong></p>
                    <p>Адрес: <br><strong>{{ $address->address }}</strong></p>
                    <p>Имя получателя: <br><strong>{{ $address->name }}</strong></p>
                    <p>Фамилия получателя: <br><strong>{{ $address->surname }}</strong></p>
                    <p>Название адреса или компании: <br><strong>{{ $address->title }}</strong></p>
                    <p>Телефон получателя: <br><strong>{{ $address->phone }}</strong></p>
                </div>
            </div>
        </div>
    </div>
@endsection
