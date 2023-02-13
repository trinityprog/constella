@extends('adminlte::page')

@section('title', 'Изменить Заявку #' . $returning->id)

@section('content_header')
    <a href="{{ route('admin.returnings.index') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Назад</button></a>
    <h1 class="text-center mb-4">Изменить Заявку #{{ $returning->id }}</h1>
@stop

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    @if ($errors->any())
                        <ul class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif

                    <form method="POST" action="{{ route('admin.returnings.update', $returning->id) }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                        {{ method_field('PATCH') }}
                        {{ csrf_field() }}

                        <div class="card">
                            <div class="card-header">Информация о заявке</div>
                            <div class="card-body">
                                <p>Номер заказа: <strong><a href="{{ route('admin.orders.show', $order->id) }}">{{ $returning->order_number }}</a></strong></p>
                                <p>ФИО: <strong>{{ $returning->name }}</strong></p>
                                <p>Телефон: <strong>{{ $returning->phone }}</strong></p>
                                <p>Причина возврата: <strong>{{ $returning->reason }}</strong></p>
                                <p>Город: <strong>{{ $returning->city }}</strong></p>
                                <p>Адрес: <strong>{{ $returning->address }}</strong></p>
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('comment') ? 'has-error' : ''}}">
                            <label class="control-label mb-0">{{ 'Комментарий' }}</label>
                            <input class="form-control" name="comment" type="text" id="comment" required >
                            {!! $errors->first('comment', '<p class="help-block">:message</p>') !!}
                        </div>

                        <div class="form-group {{ $errors->has('status') ? 'has-error' : ''}}">
                            <label for="status" class="control-label">{{ 'Номенклатура' }}</label>
                            <select name="status" id="status" class="form-control" required>
                                <option value="5" {{ $order->status == 5 ? 'selected' : '' }}>Возврат</option>
                                <option value="7" {{ $order->status == 7 ? 'selected' : '' }}>Возврат завершен</option>
                            </select>
                            {!! $errors->first('status', '<p class="help-block">:message</p>') !!}
                        </div>

                        <div class="form-group">
                            <input class="btn btn-primary" type="submit" value="{{ 'Обновить' }}">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
