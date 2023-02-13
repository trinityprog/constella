@extends('adminlte::page')

@section('title', 'Слайдер')

@section('content_header')
    <div class="card mt-4">
        <div class="card-header">
            <h5 class="mb-0">Слайдер</h5>
        </div>
    </div>
@stop

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">

            <div class="card-header">
                <h3 class="card-title pt-1">Список</h3>
                <div class="card-tools"><a href="{{ url('/admin/sliders/create') }}" class="btn btn-success btn-sm"><i class="fa fa-plus" aria-hidden="true"></i> Создать</a></div>
            </div>

            <div class="card-body table-responsive table-striped p-0">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th style="vertical-align: middle;">#</th>
                                <th style="vertical-align: middle;">Название</th>
                                <th style="vertical-align: middle;" width="200">Изображение</th>
                                <th style="vertical-align: middle;" width="250">Изображение <br/> (мобильная версия)</th>
                                <th style="vertical-align: middle;">Ссылка</th>
                                <th style="vertical-align: middle;">Позиция</th>
                                <th style="vertical-align: middle;" class="text-right">Действия</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($sliders as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->name ?? '-' }}</td>
                                <td>
                                    <a href="{{ url('i/' . $item->image) }}" target="_blank">
                                        <img style="width: 200px; height: 100px; object-fit: contain;" src="{{ url('i/' . $item->image) }}" alt="">
                                    </a>
                                </td>
                                <td>
                                    <a href="{{ url('i/' . $item->m_image) }}" target="_blank">
                                        <img style="width: 100px; height: 100px; object-fit: contain;" src="{{ url('i/' . $item->m_image) }}" alt="">
                                    </a>
                                </td>
                                <td><a href="{{ $item->link }}" target="_blank">Открыть</a></td>
                                <td>{{ $item->order }}</td>
                                <td class="text-right">
                                    <a class="btn btn-info btn-sm" href="{{ route('admin.sliders.edit', $item->id) }}"><i class="fas fa-pencil-alt"></i></a>
                                    <form method="POST" action="{{ route('admin.sliders.destroy', $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                        {{ method_field('DELETE') }}
                                        {{ csrf_field() }}
                                        <button type="submit" class="btn btn-danger btn-sm" title="Delete slider" onclick="return confirm('Вы уверены?')"><i class="fas fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="pl-4 pagination-wrapper"> {!! $sliders->appends(['search' => Request::get('search')])->render() !!} </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
