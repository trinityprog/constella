@extends('adminlte::page')

@section('title', $rename_category['ru'])

@section('content_header')
    <div class="card mt-4">
        <div class="card-header">
            <h5 class="mb-0">{{ $rename_category['ru'] }} - {{ $zhannas->total() }}</h5>
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
                    <a href="{{ url()->current() }}" class="btn btn-danger">Сбросить</a>
                </div>
            </div>
        </form>
    </div>
    <div class="card mt-4">
        <div class="card-header">
            <h5 class="mb-0">{{ $rename_category['ru'] }}</h5>
        </div>
        <form action="{{ route('admin.zhannas.rename') }}" method="POST">
            @csrf
            <div class="card-body">
                <div class="filters row">
                    <div class="col-md-2">
                        @foreach($rename_category as $key => $value)
                            <div class="form-group">
                                <label for="">Заголовок на {{ $key == 'ru' ? 'русском': ($key == 'en' ? 'английском' : 'казахском') }}</label>
                                <input type="text" name="rename_{{ $key }}" value="{{ $value }}" class="form-control">
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <div class="col-md-4">
                    <button type="submit" class="btn btn-primary">Изменить</button>
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
                 <div class="card-tools">
                    <a href="{{ url('/admin/zhannas/create') }}" class="btn btn-success btn-sm"><i class="fa fa-plus" aria-hidden="true"></i> Добавить</a>
                 </div>
            </div>

            <div class="card-body table-responsive table-striped p-0">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Артикул</th>
                                <th>Название сайт</th>
                                <th>Категория</th>
                                <th class="text-right">Действия</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($zhannas as $item)
                            <tr>
                                <td>{{ $item->product_id ?? '' }}</td>
                                <td>{{ $item->product->vendor_code ?? '' }}</td>
                                <td>{{ $item->product->name ?? '' }}</td>
                                <td>{{ $item->category->name ?? '' }}</td>
                                <td class="text-right">
{{--                                    <a class="btn btn-info btn-sm" href="{{ url('/admin/zhannas/' . $item->id . '/edit') }}"><i class="fas fa-pencil-alt"></i></a>--}}
                                    <form method="POST" action="{{ url('/admin/zhannas' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                        {{ method_field('DELETE') }}
                                        {{ csrf_field() }}
                                        <button type="submit" class="btn btn-danger btn-sm" title="Delete zhanna" onclick="return confirm('Вы уверены?')"><i class="fas fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="pl-4 pagination-wrapper"> {!! $zhannas->appends(['search' => Request::get('search')])->render() !!} </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
