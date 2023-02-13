@extends('adminlte::page')

@section('title', 'Изменить SEO меню')

@section('content_header')
    <a href="{{ url('/admin/seo_menu') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Назад</button></a>
    <h1 class="text-center mb-4">Изменить SEO меню #{{ $menu->id }}</h1>
@stop

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    @if ($errors->any())
                        <ul class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif

                    <form method="POST" action="{{ route('admin.seo_menu.update', $menu->id) }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                        {{ method_field('PATCH') }}
                        {{ csrf_field() }}
                        @include ('admin.seo_menu.form', ['formMode' => 'edit'])
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
