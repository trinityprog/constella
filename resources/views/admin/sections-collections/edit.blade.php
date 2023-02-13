@extends('adminlte::page')

@section('title', 'Изменить Секцию #' . $section->id)

@section('content_header')
    <a href="{{ route('admin.sections-collections.index') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Назад</button></a>
    <h1 class="text-center mb-4">Изменить Секцию #{{ $section->id }}</h1>
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

                    <form method="POST" action="{{ route('admin.sections-collections.update', $section->id) }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                        {{ method_field('PATCH') }}
                        {{ csrf_field() }}
                        @include ('admin.sections-collections.form', ['formMode' => 'edit'])
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
