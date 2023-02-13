@extends('adminlte::page')

@section('title', 'Товары в избранном')

@section('content_header')
    <div class="card mt-4">
        <div class="card-header">
            <h5 class="mb-0">Товары в избранном - {{ $favorites->total() }}</h5>
        </div>
{{--        <form action="" method="get">--}}
{{--            <div class="card-body">--}}
{{--                <div class="filters row">--}}
{{--                    <div class="col-md-2">--}}
{{--                        <div class="form-group">--}}
{{--                            <label for="">Поиск</label>--}}
{{--                            <input type="text" name="search" class="form-control">--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="card-footer">--}}
{{--                <div class="col-md-4">--}}
{{--                    <button type="submit" class="btn btn-primary">Поиск</button>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </form>--}}
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
                                <th>Имя</th>
                                <th>Товар</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($favorites as $favorite)
                            <tr>
                                <td>{{ $favorite->id }}</td>
                                <td>{{ $favorite->user->name ?? '-' }}</td>
                                <td>{{ $favorite->product->name ?? '-' }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="pl-4 pagination-wrapper"> {!! $favorites->appends(['search' => Request::get('search')])->render() !!} </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
