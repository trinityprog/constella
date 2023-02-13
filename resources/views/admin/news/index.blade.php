@extends('adminlte::page')

@section('title', 'События')

@section('content_header')
    <div class="card mt-4">
        <div class="card-header">
            <h5 class="mb-0">События - {{ $news->total() }}</h5>
        </div>
    </div>
@stop

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">

            <div class="card-header">
                <h3 class="card-title pt-1">{{ __('Список') }}</h3>
                <div class="card-tools">
                    <a href="{{ route('admin.news.create') }}" class="btn btn-success btn-sm"><i class="fa fa-plus" aria-hidden="true"></i> {{ __('Создать') }}</a>
                </div>
            </div>

            <div class="card-body table-responsive table-striped p-0">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Заголовок</th>
                                <th class="text-right">Действия</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($news as $new)
                            <tr>
                                <td>{{ $new->id }}</td>
                                <td>{{ $new->title }}</td>
                                <td class="text-right">
                                    <a class="btn btn-info btn-sm" href="{{ route('admin.news-images.index', ['new_id' => $new->id]) }}"><i class="fas fa-image"></i></a>
                                    <a class="btn btn-info btn-sm" href="{{ route('admin.news.edit', $new->id) }}"><i class="fas fa-pencil-alt"></i></a>
                                    <form method="POST" action="{{ route('admin.news.destroy', $new->id) }}" accept-charset="UTF-8" style="display:inline">
                                        {{ method_field('DELETE') }}
                                        {{ csrf_field() }}
                                        <button type="submit" class="btn btn-danger btn-sm" title="Delete order" onclick="return confirm('Вы уверены?')"><i class="fas fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="pl-4 pagination-wrapper"> {!! $news->appends(['search' => Request::get('search')])->render() !!} </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
