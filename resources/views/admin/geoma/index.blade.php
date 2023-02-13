@extends('adminlte::page')

@section('title', 'Geoma')

@section('content_header')
    <div class="card mt-4">
        <div class="card-header">
            <h5 class="mb-0">Geoma - {{ $geoma->total() }}</h5>
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
                                <th>Имя</th>
                                <th>Email</th>
                                <th>Телефон</th>
                                <th class="text-right">Действия</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($geoma as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->email }}</td>
                                <td>{{ $item->phone }}</td>
                                <td class="text-right">
                                    <a class="btn btn-info btn-sm" href="{{ url('/admin/geoma/' . $item->id) }}"><i class="fas fa-eye"></i></a>
                                    <form method="POST" action="{{ url('/admin/geoma' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                        {{ method_field('DELETE') }}
                                        {{ csrf_field() }}
                                        <button type="submit" class="btn btn-danger btn-sm" title="Delete geoma" onclick="return confirm('Вы уверены?')"><i class="fas fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="pl-4 pagination-wrapper"> {!! $geoma->appends(['search' => Request::get('search')])->render() !!} </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
