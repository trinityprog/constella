@extends('adminlte::page')

@section('title', 'Изображения событий')

@section('content_header')
    <a href="{{ route('admin.seo_products.index') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Назад</button></a>
    <div class="card mt-4">
        <div class="card-header">
            <h5 class="mb-0">Изображения продукта</h5>
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
                                <th>Изображение</th>
                                <th>Alt-tag</th>
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
                                <td class="text-red">{{ $item->alt_tag ?? 'Пусто' }}</td>
                                <td class="text-right">
                                    <a class="btn btn-info btn-sm" href="{{ route('admin.seo_product_images.edit', $item->id) }}"><i class="fas fa-pencil-alt"></i></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
