@extends('adminlte::page')

@section('title', 'Пользователи')

@section('content_header')
    <div class="card mt-4">
        <div class="card-header">
            <h5 class="mb-0">Пользователи - {{ $users->total() }}</h5>
        </div>
        <form action="" method="get">
            <div class="card-body">
                <div class="filters row">
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="">Поиск</label>
                            <input type="text" name="search" class="form-control">
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <div class="col-md-4">
                    <button type="submit" class="btn btn-primary">Поиск</button>
                </div>
            </div>
        </form>
    </div>
@stop

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">

            <div class="card-header">
               <h3 class="card-title">Список</h3>
            </div>

            <div class="card-body table-responsive table-striped p-0">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Имя</th>
                                <th>Пол</th>
                                <th>Кол-во не оплаченных заказов</th>
                                <th>Заказы</th>
                                <th>Избранное</th>
                                <th>Адресса</th>
                                <th class="text-right">Действия</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->gender() }}</td>
                                <td><a href="{{ route('admin.orders.index', ['user_id' => $item->id, 'not_paid' => 'true']) }}">{{ $item->not_paid_orders_count }}</a></td>
                                <td><a href="{{ route('admin.orders.index', ['user_id' => $item->id]) }}">{{ $item->orders_count }}</a></td>
                                <td><a href="{{ route('admin.favorites.index', ['user_id' => $item->id]) }}">{{ $item->favorites_count }}</a></td>
                                <td><a href="{{ route('admin.addresses.index', ['user_id' => $item->id]) }}">{{ $item->addresses_count }}</a></td>
                                <td class="text-right">
{{--                                    <a class="btn btn-info btn-sm" href="{{ url('/admin/users/' . $item->id . '/edit') }}"><i class="fas fa-pencil-alt"></i></a>--}}
{{--                                    <form method="POST" action="{{ url('/admin/users' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">--}}
{{--                                        {{ method_field('DELETE') }}--}}
{{--                                        {{ csrf_field() }}--}}
{{--                                        <button type="submit" class="btn btn-danger btn-sm" title="Delete user" onclick="return confirm('Вы уверены?')"><i class="fas fa-trash"></i></button>--}}
{{--                                    </form>--}}
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="pagination-wrapper pl-4"> {!! $users->appends(['search' => Request::get('search')])->render() !!} </div>
                </div>

            </div>
        </div>
    </div>
</div>
@stop
