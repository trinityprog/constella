@extends('adminlte::page')

@section('title', 'Баннера')

@section('content_header')
    <div class="card mt-4">
        <div class="card-header">
            <h5 class="mb-0">{{ __('Баннера') }}</h5>
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
                        <a href="{{ url('/admin/banners/create') }}" class="btn btn-success btn-sm"><i
                                class="fa fa-plus" aria-hidden="true"></i> {{ __('Создать') }}</a>
                    </div>
                </div>

                <div class="card-body table-responsive table-striped p-0">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>{{ __('Пол') }}</th>
                                <th>{{ __('Изображение') }}</th>
                                <th>{{ __('Ссылка') }}</th>
                                <th class="text-right">{{ __('Действия') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($banners as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->type->name }}</td>
                                    <td>
                                        <img src="{{ url('i/'. $item->image) }}"
                                             style="width: 150px; height: 150px; object-fit: cover;" alt="">
                                    </td>
                                    <td>
                                        <a target="_blank" href="{{ $item->link }}">{{ __('Открыть') }}</a>
                                    </td>
                                    <td class="text-right">
                                        <a class="btn btn-info btn-sm" href="{{ route('admin.banners.edit', $item->id) }}"><i class="fas fa-pencil-alt"></i></a>
                                        <form method="POST" action="{{ route('admin.banners.destroy', $item->id) }}"
                                              accept-charset="UTF-8" style="display:inline">
                                            {{ method_field('DELETE') }}
                                            {{ csrf_field() }}
                                            <button type="submit" class="btn btn-danger btn-sm" title="Delete banner"
                                                    onclick="return confirm('Вы уверены?')"><i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div
                            class="pl-4 pagination-wrapper"> {!! $banners->appends(['search' => Request::get('search')])->render() !!} </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
