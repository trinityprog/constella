@extends('adminlte::page')

@section('title', 'Импорт Excel')

@section('content_header')
    <a href="{{ route('admin.images-imports.index') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Назад</button></a>
    <h1 class="text-center mb-4">Импорт Excel</h1>
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

                        <form method="POST" action="{{ route('admin.images-imports.store_excel') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                            {{ csrf_field() }}

                            <div class="form-group {{ $errors->has('excel_file') ? 'has-error' : ''}}">
                                <label for="excel_file" class="control-label">{{ 'Excel файл' }}</label>
                                <input class="form-control" name="excel_file" type="file" id="excel_file" required accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel">
                                {!! $errors->first('excel_file', '<p class="help-block">:message</p>') !!}
                            </div>

                            <div class="form-group">
                                <input class="btn btn-primary" type="submit" value="{{ 'Импортировать' }}">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
@endsection
