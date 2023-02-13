@extends('adminlte::page')

@section('title', 'Лучшие Коллекции')

@section('content_header')
    <div class="card mt-4">
        <div class="card-header">
            <h5 class="mb-0">Лучшие Коллекции</h5>
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
                    <a href="{{ route('admin.sections-collections.create') }}" class="btn btn-success btn-sm"><i class="fa fa-plus" aria-hidden="true"></i> Добавить</a>
                 </div>
            </div>

            <div class="card-body table-responsive table-striped p-0">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Категория</th>
                                <th class="text-right">Действия</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($sections as $section)
                            <tr>
                                <td>{{ $section->id }}</td>
                                <td>{{ $section->category->name }}</td>
                                <td class="text-right">
                                    <a class="btn btn-info btn-sm" href="{{ route('admin.sections-collections.edit', $section->id) }}"><i class="fas fa-pencil-alt"></i></a>
                                    <form method="POST" action="{{ route('admin.sections-collections.destroy', $section->id) }}" accept-charset="UTF-8" style="display:inline">
                                        {{ method_field('DELETE') }}
                                        {{ csrf_field() }}
                                        <button type="submit" class="btn btn-danger btn-sm" title="Delete zhanna" onclick="return confirm('Вы уверены?')"><i class="fas fa-trash"></i></button>
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
