@extends('adminlte::page')

@section('title', $pack_promocodes_name)

@section('content_header')
    <div class="card mt-4">
        <div class="card-header">
            <h5 class="mb-0">{{ $pack_promocodes_name }}</h5>
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
                                <th>#</th>
                                <th>Код</th>
                                <th>Заказы</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($promocodes as $promocode)
                            <tr>
                                <td>{{ $promocode->id }}</td>
                                <td>{{ $promocode->code }}</td>
                                <td><a href="{{ $promocode->code }}">{{ $promocode->code }}</a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="pagination-wrapper pl-3"> {!! $promocodes->render() !!} </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
