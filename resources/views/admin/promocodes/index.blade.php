@extends('adminlte::page')

@section('title', 'Промокоды')

@section('content_header')
    <div class="card mt-4">
        <div class="card-header">
            <h5 class="mb-0">Промокоды</h5>
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
                    <a href="{{ route('admin.promocodes.create') }}" class="btn btn-success btn-sm"><i class="fa fa-plus" aria-hidden="true"></i> Создать</a>
                 </div>
            </div>

            <div class="card-body table-responsive table-striped p-0">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Название</th>
                                <th>Тип</th>
                                <th>Скидка</th>
                                <th>Для товаров</th>
                                <th>Кол-во использований</th>
                                <th class="text-right">Действия</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($pack_promocodes as $pack_promocode)
                            <tr>
                                <td>{{ $pack_promocode->id }}</td>
                                <td>{{ $pack_promocode->name }}</td>
                                <td>{!! $pack_promocode->quantityTypeText !!}</td>
                                <td>{{ $pack_promocode->discountText }}</td>
                                <td>{{ $pack_promocode->relationTypeText }}</td>
                                <td>{{ $pack_promocode->countOfUses }}</td>
                                <td class="text-right">
                                    @if($pack_promocode->status == 1)
                                        <a class="btn btn-info btn-sm" href="{{ route('admin.promocodes.show', $pack_promocode->id) }}"><i class="fas fa-eye"></i></a>
                                        <a class="btn btn-info btn-sm" href="{{ route('admin.promocodes.export', $pack_promocode->id) }}"><i class="fas fa-file-export"></i></a>
                                    @else
                                        <a class="btn btn-info btn-sm" href="{{ route('admin.promocodes.generate', $pack_promocode->id) }}"><i class="fas fa-magic"></i></a>
                                        <a class="btn btn-info btn-sm" href="{{ route('admin.promocodes.edit', $pack_promocode->id) }}"><i class="fas fa-pencil-alt"></i></a>
                                        <form method="POST" action="{{ route('admin.promocodes.destroy', $pack_promocode->id) }}" accept-charset="UTF-8" style="display:inline">
                                            {{ method_field('DELETE') }}
                                            {{ csrf_field() }}
                                            <button type="submit" class="btn btn-danger btn-sm" title="Delete zhanna" onclick="return confirm('Вы уверены?')"><i class="fas fa-trash"></i></button>
                                        </form>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="pagination-wrapper pl-3"> {!! $pack_promocodes->render() !!} </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
