@extends('adminlte::page')

@section('title', 'Заявки на возврат')

@section('content_header')
    <div class="card mt-4">
        <div class="card-header">
            <h5 class="mb-0">Заявки на возврат - {{ $returnings->total() }}</h5>
        </div>
    </div>
@stop

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">

            <div class="card-header">
               <h3 class="card-title pt-1">Список</h3>
            </div>

            <div class="card-body table-responsive table-striped p-0">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Имя</th>
                                <th>Телефон</th>
                                <th>Комментарий</th>
                                <th>Статус</th>
                                <th class="text-right">Действия</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($returnings as $returning)
                            @if(!empty(\App\Models\Order::query()->where('unique_id', $returning->order_number)->first('status')))
                                <tr>
                                    <td>{{ $returning->id }}</td>
                                    <td>{{ $returning->name }}</td>
                                    <td>{{ $returning->phone }}</td>
                                    <td>{{ $returning->comment }}</td>
                                    <td>{{ \App\Models\Order::query()->where('unique_id', $returning->order_number)->firstOrFail('status')->displayStatus() }}</td>
                                    <td class="text-right">
                                        <a class="btn btn-info btn-sm" href="{{ route('admin.returnings.edit', $returning->id) }}"><i class="fas fa-pencil-alt"></i></a>
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                        </tbody>
                    </table>
                    <div class="pl-4 pagination-wrapper"> {!! $returnings->appends(['search' => Request::get('search')])->render() !!} </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
