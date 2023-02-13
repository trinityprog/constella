@extends('adminlte::page')

@section('title', 'SEO Категории')

@section('content_header')
    <div class="card mt-4">
        <div class="card-header">
            <h5 class="mb-0">SEO Категории</h5>
        </div>
    </div>
@stop

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">

            <div class="card-header">
               <h3 class="card-title pt-1">Список</h3>
            </div>

            <div class="card-body table-responsive table-striped p-0">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th width="5%">#</th>
                                <th width="35%">Название</th>
                                <th class="text-right">Действия</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($categories as $category)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $category->name }}</td>
                                <td class="text-right">
                                    <a class="btn btn-info btn-sm" href="{{ route('admin.seo_categories.show', $category->id) }}"><i class="fas fa-eye"></i></a>
                                    <a class="btn btn-info btn-sm" href="{{ route('admin.seo_categories.edit', $category->id) }}"><i class="fas fa-pencil-alt"></i></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="pl-4 pagination-wrapper"> {!! $categories->appends(['search' => Request::get('search')])->render() !!} </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
