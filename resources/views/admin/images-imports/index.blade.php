@extends('adminlte::page')

@section('title', 'Импорт Изображений')

@section('content_header')
    <div class="card mt-4">
        <div class="card-header">
            <h5 class="mb-0">Импорт Изображений</h5>
        </div>
    </div>
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">

                <div class="card-header">
                    <h3 class="card-title pt-1">Список</h3>

                    <div class="card-tools mr-4"><a href="{{route('admin.images-imports.excel_vendor_slug') }}" class="btn btn-success btn-sm"><i class="fa fa-file-excel" aria-hidden="true"></i> Экспорт Excel для привязки Изображений</a></div>

                    <div class="card-tools mr-4"><a href="{{route('admin.images-imports.create_excel') }}" class="btn btn-success btn-sm"><i class="fa fa-file-excel" aria-hidden="true"></i> Импорт Excel</a></div>

                    <div class="card-tools"><a href="{{route('admin.images-imports.create_zip') }}" class="btn btn-success btn-sm mr-4"><i class="fa fa-plus" aria-hidden="true"></i> Создать Импорт Архива(.zip)</a></div>
                </div>

                <div class="card-body table-responsive table-striped p-0">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Комментарий</th>
                                <th>Статус</th>
                                <th>Общее кол-во файлов</th>
                                <th>Кол-во сохраненных файлов</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($images_imports as $images_import)
                                <tr>
                                    <td>{{ $images_import->id }}</td>
                                    <td>{{ $images_import->comment }}</td>
                                    <td>{{ $images_import->statusText }}</td>
                                    <td>{{ $images_import->files_count }}</td>
                                    <td>{{ $images_import->saved_files_count }}</td>
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
