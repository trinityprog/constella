@extends('adminlte::page')

@section('title', 'Product-images')

@section('content_header')
    <a href="{{ url('/admin/products-images?product_id='. request()->get('product_id')) }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Назад</button></a>
    <h1 class="text-center mb-4">Добавить изображение</h1>
@stop

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ url('/admin/products-images') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        @include ('admin.product-images.form', ['formMode' => 'create'])
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
