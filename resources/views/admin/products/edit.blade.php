@extends('adminlte::page')

@section('title', 'Изменить номенклатуру #'.$product->vendor_code)

@section('content_header')
    <a href="{{ url('/admin/products') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Назад</button></a>
    <h1 class="text-center mb-4">Изменить номенклатуру #{{ $product->vendor_code }}</h1>
@stop

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ url('/admin/products/' . $product->id) }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                        {{ method_field('PATCH') }}
                        {{ csrf_field() }}
                        @include ('admin.products.form', ['formMode' => 'edit'])
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
