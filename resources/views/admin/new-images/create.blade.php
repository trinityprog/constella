@extends('adminlte::page')

@section('title', 'Product-images')

@section('content_header')
    <a href="{{ route('admin.news.index') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Назад</button></a>
    <h1 class="text-center mb-4">Добавить изображение</h1>
@stop

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ route('admin.news-images.store') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <input type="hidden" name="new_id" value="{{ $new->id }}">

                        @include ('admin.new-images.form', ['formMode' => 'create'])
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
