@extends('adminlte::page')

@section('title', 'Цвета')

@section('content_header')
    <div class="card mt-4">
        <div class="card-header">
            <h5 class="mb-0">Цвета</h5>
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
               <h3 class="card-title pt-1">Список</h3>
            </div>

            <div class="card-body table-responsive table-striped p-0">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Название в 1C</th>
                                <th>Аббревиатура в 1С</th>
                                <th>Код цвета</th>
                                <th class="text-right">Действия</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($colors as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->abbr }}</td>
                                <td>
                                    @if($item->code)
                                        <span style="display: block; width: 80px; height: 30px; background: {{ $item->code }};"></span>
                                    @else
                                        <span style="color: red;">Не задан</span>
                                    @endif
                                </td>
                                <td class="text-right">
                                    <a class="btn btn-info btn-sm" href="{{ url('/admin/colors/' . $item->id . '/edit') }}"><i class="fas fa-pencil-alt"></i></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="pl-4 pagination-wrapper"> {!! $colors->appends(['search' => Request::get('search')])->render() !!} </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
