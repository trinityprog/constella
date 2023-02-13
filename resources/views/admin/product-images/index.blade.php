@extends('adminlte::page')

@section('title', 'Изображения номенклатуры')

@section('content_header')
    <div class="card mt-4">
        <div class="card-header">
            <h5 class="mb-0">Изображения номенклатуры - {{ $productImages->total() }}</h5>
        </div>
    </div>
@stop

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">

            <div class="card-header">
                <h3 class="card-title pt-1">Список</h3>
                <div class="card-tools">
                    <a href="{{ url('/admin/products-images/create?product_id='. request()->get('product_id')) }}" class="btn btn-success btn-sm"><i class="fa fa-plus" aria-hidden="true"></i> Создать</a>
                </div>
            </div>

            <div class="card-body table-responsive table-striped p-0">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th width="5%">#</th>
                                <th>Изображение</th>
                                <th class="text-right">Действия</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($productImages as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    <img style="width: 200px; height: 200px; object-fit: contain;" src="{{ url('i/products/images/'. $item->name) }}" alt="">
                                </td>
                                <td class="text-right">
                                    <form method="POST" action="{{ url('/admin/products-images' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                        {{ method_field('DELETE') }}
                                        {{ csrf_field() }}
                                        <button type="submit" class="btn btn-danger btn-sm" title="Delete product-image" onclick="return confirm('Вы уверены?')"><i class="fas fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="pl-4 pagination-wrapper"> {!! $productImages->appends(['search' => Request::get('search')])->render() !!} </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
