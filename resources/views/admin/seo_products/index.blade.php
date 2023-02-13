@extends('adminlte::page')

@section('title', 'SEO Продуктов')

@section('content_header')
    <div class="card mt-4">
        <div class="card-header">
            <h5 class="mb-0">SEO Продуктов - {{ $products->total() }}</h5>
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
                    <button class="btn btn-danger" class="form-reloader">Сбросить</button>
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
                                <th width="5%">#</th>
                                <th width="35%">Название</th>
                                <th>Артикул</th>
                                <th class="text-right">Действия</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($products as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->vendor_code }}</td>
                                <td class="text-right">
                                    <a class="btn btn-info btn-sm" href="{{ route('admin.seo_product_images.index', ['product_id' => $item->id]) }}"><i class="fas fa-image"></i></a>
                                    <a class="btn btn-info btn-sm" href="{{ route('admin.seo_products.show', $item->id) }}"><i class="fas fa-eye"></i></a>
                                    <a class="btn btn-info btn-sm" href="{{ route('admin.seo_products.edit', $item->id) }}"><i class="fas fa-pencil-alt"></i></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="pl-4 pagination-wrapper"> {!! $products->appends(['search' => Request::get('search')])->render() !!} </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
