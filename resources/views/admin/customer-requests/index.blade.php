@extends('adminlte::page')

@section('title', 'Заявки')

@section('content_header')
    <div class="card mt-4">
        <div class="card-header">
            <h5 class="mb-0">Заявки - {{ $customer_requests->total() }}</h5>
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
                                <th>Тип формы</th>
                                <th>Тема</th>
                                <th>Имя</th>
                                <th>Телефон</th>
                                <th>Удобное время</th>
                                <th class="text-right">Действия</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($customer_requests as $customer_request)
                            <tr>
                                <td>{{ $customer_request->id }}</td>
                                <td>{{ $customer_request->typeName }}</td>
                                <td>{{ $customer_request->theme->name_ru }}</td>
                                <td>{{ $customer_request->name }}</td>
                                <td>{{ $customer_request->phone }}</td>
                                <td>{{ $customer_request->time_from }} - {{ $customer_request->time_to }}</td>
                                <td class="text-right">
                                    <form method="POST" action="{{ route('admin.customer-requests.destroy', $customer_request->id) }}" accept-charset="UTF-8" style="display:inline">
                                        {{ method_field('DELETE') }}
                                        {{ csrf_field() }}
                                        <button type="submit" class="btn btn-danger btn-sm" title="Delete order" onclick="return confirm('Вы уверены?')"><i class="fas fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="pl-4 pagination-wrapper"> {!! $customer_requests->appends(['search' => Request::get('search')])->render() !!} </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
