@extends('adminlte::page')

@section('title', 'Карьера')

@section('content_header')
    <div class="card mt-4">
        <div class="card-header">
            <h5 class="mb-0">Карьера</h5>
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
                    <a href="{{ route('admin.career_category.create') }}" class="btn btn-success btn-sm"><i class="fa fa-plus" aria-hidden="true"></i> {{ __('Создать') }}</a>
                </div>
            </div>

            <div class="card-body table-responsive table-striped p-0">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Позиция</th>
                                <th>Категория</th>
                                <th class="text-right">Действия</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($categories as $category)
                            <tr>
                                <td>{{ $category->id }}</td>
                                <td>{{ $category->order }}</td>
                                <td>{{ $category->name }}</td>
                                <td class="text-right">
                                    <a class="btn btn-info btn-sm" href="{{ route('admin.career_category.edit', $category->id) }}"><i class="fas fa-pencil-alt"></i></a>
                                    <form method="POST" action="{{ route('admin.career_category.destroy', $category->id) }}" accept-charset="UTF-8" style="display:inline">
                                        {{ method_field('DELETE') }}
                                        {{ csrf_field() }}
                                        <button type="submit" class="btn btn-danger btn-sm" title="Delete order" onclick="return confirm('Вы уверены?')"><i class="fas fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
{{--                    <div class="pl-4 pagination-wrapper"> {!! $news->appends(['search' => Request::get('search')])->render() !!} </div>--}}
                </div>
            </div>
        </div>
    </div>
</div>
<br><br><br>
<div class="row">
    <div class="col-md-12">
        <div class="card">

            <div class="card-header">
                <h3 class="card-title pt-1">{{ __('Список') }}</h3>
                <div class="card-tools">
                    <a href="{{ route('admin.career.create') }}" class="btn btn-success btn-sm"><i class="fa fa-plus" aria-hidden="true"></i> {{ __('Создать') }}</a>
                </div>
            </div>

            <div class="card-body table-responsive table-striped p-0">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Позиция</th>
                            <th>Вакансия</th>
                            <th>Название категории</th>
                            <th class="text-right">Действия</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($career as $car)
                            <tr>
                                <td>{{ $car->id }}</td>
                                <td>{{ $car->order }}</td>
                                <td>{{ $car->title_ru }}</td>
                                <td>{{ $category->name }}</td>
                                <td class="text-right">
                                    <a class="btn btn-info btn-sm" href="{{ route('admin.career.edit', $car->id) }}"><i class="fas fa-pencil-alt"></i></a>
                                    <form method="POST" action="{{ route('admin.career.destroy', $car->id) }}" accept-charset="UTF-8" style="display:inline">
                                        {{ method_field('DELETE') }}
                                        {{ csrf_field() }}
                                        <button type="submit" class="btn btn-danger btn-sm" title="Delete order" onclick="return confirm('Вы уверены?')"><i class="fas fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{--                    <div class="pl-4 pagination-wrapper"> {!! $news->appends(['search' => Request::get('search')])->render() !!} </div>--}}
                </div>
            </div>
        </div>
    </div>
</div>
<br><br><br>
<div class="row">
    <div class="col-md-12">
        <div class="card">

            <div class="card-header">
                <h3 class="card-title pt-1">{{ __('Список') }}</h3>
            </div>

            <div class="card-body table-responsive table-striped p-0">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>ID вакансии</th>
                            <th>Имя</th>
                            <th>Фамилия</th>
                            <th class="text-right">Действия</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($resumes as $resume)
                            <tr>
                                <td>{{ $resume->id }}</td>
                                @if(isset($resume->careers_id))
                                    <td>{{ $resume->careers_id }}</td>
                                @else
                                    <td>-</td>
                                @endif
                                <td>{{ $resume->name }}</td>
                                <td>{{ $resume->surname }}</td>
                                <td class="text-right">
                                    <a class="btn btn-info btn-sm" href="{{ route('admin.resume.show', $resume->id) }}"><i class="fas fa-eye"></i></a>
                                    <form method="POST" action="{{ route('admin.resume.destroy', $resume->id) }}" accept-charset="UTF-8" style="display:inline">
                                        {{ method_field('DELETE') }}
                                        {{ csrf_field() }}
                                        <button type="submit" class="btn btn-danger btn-sm" title="Delete order" onclick="return confirm('Вы уверены?')"><i class="fas fa-trash"></i></button>
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
<br><br><br>
@stop
