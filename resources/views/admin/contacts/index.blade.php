@extends('adminlte::page')

@section('title', 'Адреса')

@section('content_header')
    <div class="card mt-4">
        <div class="card-header">
            <h5 class="mb-0">Адреса</h5>
        </div>
    </div>
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">

                <div class="card-header">
                    <h3 class="card-title pt-1">Список городов</h3>
                    <div class="card-tools">
                        <a href="{{ route('admin.contacts.create') }}" class="btn btn-success btn-sm"><i class="fa fa-plus" aria-hidden="true"></i> Создать</a>
                    </div>
                </div>

                <div class="card-body table-responsive table-striped p-0">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Название</th>
                                <th class="text-right">Действия</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($cities as $city)
                                <tr>
                                    <td>{{ $city->id }}</td>
                                    <td>{{ $city->nameLocal }}</td>
                                    <td class="text-right">
                                        <a class="btn btn-info btn-sm" href="{{ route('admin.contact-addresses.index', ['city_id' => $city->id]) }}"><i class="fa fa-plus" aria-hidden="true"></i></a>
                                        <a class="btn btn-info btn-sm" href="{{ route('admin.contacts.edit', $city->id) }}"><i class="fas fa-pencil-alt"></i></a>
                                        <form method="POST" action="{{ route('admin.contacts.destroy', $city->id) }}" accept-charset="UTF-8" style="display:inline">
                                            {{ method_field('DELETE') }}
                                            {{ csrf_field() }}
                                            <button type="submit" class="btn btn-danger btn-sm" title="Delete order" onclick="return confirm('Вы уверены?')"><i class="fas fa-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
{{--                        <div class="pagination-wrapper pl-3"> {!! $cities->render() !!} </div>--}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
