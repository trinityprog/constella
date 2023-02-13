@extends('adminlte::page')

@section('title', 'Молодежь')

@section('content_header')
    <div class="card mt-4">
        <div class="card-header">
            <h5 class="mb-0">Молодежь - {{ $youth_products->total() }}</h5>
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
                    <a href="{{ route('admin.youth-products.create') }}" class="btn btn-success btn-sm"><i class="fa fa-plus" aria-hidden="true"></i> Добавить</a>
                 </div>
            </div>

            <div class="card-body table-responsive table-striped p-0">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Номенклатура</th>
                                <th>Категория</th>
                                <th class="text-right">Действия</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($youth_products as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->product->name }}</td>
                                <td>
                                    @if($item->category_id)
                                        {{ $item->category->name }}
                                    @else
                                        {{ $item->menu->name }}
                                    @endif
                                </td>
                                <td class="text-right">
                                    <a class="btn btn-info btn-sm" href="{{ route('admin.youth-products.edit', $item->id) }}"><i class="fas fa-pencil-alt"></i></a>
                                    <form method="POST" action="{{ route('admin.youth-products.destroy', $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                        {{ method_field('DELETE') }}
                                        {{ csrf_field() }}
                                        <button type="submit" class="btn btn-danger btn-sm" title="Delete zhanna" onclick="return confirm('Вы уверены?')"><i class="fas fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="pl-4 pagination-wrapper"> {!! $youth_products->appends(['search' => Request::get('search')])->render() !!} </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
