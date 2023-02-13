@extends('adminlte::page')

@section('title', 'Описания брендов')

@section('content_header')
    <div class="card mt-4">
        <div class="card-header">
            <h5 class="mb-0">{{ __('Описания брендов') }}</h5>
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
               <h3 class="card-title pt-1">{{ __('Список') }}</h3>
            </div>

            <div class="card-body table-responsive table-striped p-0">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th width="5%">#</th>
                                <th>{{ __('Название') }}</th>
                                <th>{{ __('Лого') }}</th>
                                <th class="text-right">{{ __('Действия') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($brand_description as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->name }}</td>
                                <td>
                                    @if($item->logo)
                                        <img style="width: 100px; height: 50px; object-fit: contain;" src="{{ url('i/'.$item->logo) }}" alt="">
                                    @else
                                        <span style="color: red;">{{ __('Не добавлено') }}</span>
                                    @endif
                                </td>
                                <td class="text-right">
                                    <a class="btn btn-info btn-sm" href="{{ url('/admin/brands-descriptions/' . $item->id . '/edit') }}"><i class="fas fa-pencil-alt"></i></a>
{{--                                    <form method="POST" action="{{ url('/admin/brands-descriptions' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">--}}
{{--                                        {{ method_field('DELETE') }}--}}
{{--                                        {{ csrf_field() }}--}}
{{--                                        <button type="submit" class="btn btn-danger btn-sm" title="Delete brand_description" onclick="return confirm('Вы уверены?')"><i class="fas fa-trash"></i></button>--}}
{{--                                    </form>--}}
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="pl-4 pagination-wrapper"> {!! $brand_description->appends(['search' => Request::get('search')])->render() !!} </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
