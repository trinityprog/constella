@extends('adminlte::page')

@section('title', 'Изображения событий')

@section('content_header')
    <a href="{{ route('admin.news.index') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Назад</button></a>
    <div class="card mt-4">
        <div class="card-header">
            <h5 class="mb-0">Изображения событий</h5>
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
                    <a href="{{ route('admin.news-images.create', ['new_id' => $new->id]) }}" class="btn btn-success btn-sm"><i class="fa fa-plus" aria-hidden="true"></i> Создать</a>
                </div>
            </div>

            <div class="card-body table-responsive table-striped p-0">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Изображение</th>
                                <th>Позиция</th>
                                <th class="text-right">Действия</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($newImages as $image)
                            <tr>
                                <td>{{ $image->id }}</td>
                                <td>
                                    <img style="width: 200px; height: 200px; object-fit: contain;" src="{{ $image->imagePath }}" alt="">
                                </td>
                                <td>{{ $image->pivot->order }}</td>
                                <td class="text-right">
                                    <form method="POST" action="{{ route('admin.news-images.destroy', $image->id) }}" accept-charset="UTF-8" style="display:inline">
                                        {{ method_field('DELETE') }}
                                        {{ csrf_field() }}
                                        <button type="submit" class="btn btn-danger btn-sm" title="Delete product-image" onclick="return confirm('Вы уверены?')"><i class="fas fa-trash"></i></button>
                                    </form>
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
