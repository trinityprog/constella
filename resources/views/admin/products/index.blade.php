@extends('adminlte::page')

@section('title', 'Номенклатура')

@section('content_header')
    <div class="card mt-4">
        <div class="card-header">
            <h5 class="mb-0">Номенклатура - {{ $products->total() }}</h5>
        </div>
        <form action="" method="get">
            <div class="card-body">
                <div class="filters row">
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="">Поиск</label>
                            <input type="text" name="search" class="form-control">
                        </div>
                    </div>
{{--                    <div class="col-md-2">--}}
{{--                        <div class="form-group">--}}
{{--                            <label>Дата загрузки: </label>--}}

{{--                            <div class="input-group">--}}
{{--                                <div class="input-group-prepend">--}}
{{--                                  <span class="input-group-text">--}}
{{--                                    <i class="far fa-calendar-alt"></i>--}}
{{--                                  </span>--}}
{{--                                </div>--}}
{{--                                <input type="text" class="form-control float-right" rel="daterange">--}}
{{--                            </div>--}}
{{--                            <!-- /.input group -->--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col-md-2">--}}
{{--                        <div class="form-group">--}}
{{--                            <label>Дата покупки: </label>--}}

{{--                            <div class="input-group">--}}
{{--                                <div class="input-group-prepend">--}}
{{--                                  <span class="input-group-text">--}}
{{--                                    <i class="far fa-calendar-alt"></i>--}}
{{--                                  </span>--}}
{{--                                </div>--}}
{{--                                <input type="text" class="form-control float-right" rel="daterange">--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col-md-2">--}}
{{--                        <div class="form-group">--}}
{{--                            <label for="">Статус</label>--}}
{{--                            <select class="form-control">--}}
{{--                                <option>option 1</option>--}}
{{--                            </select>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col-md-2">--}}
{{--                        <div class="form-group">--}}
{{--                            <label for="">Сеть</label>--}}
{{--                            <select class="form-control">--}}
{{--                                <option>option 1</option>--}}
{{--                            </select>--}}
{{--                        </div>--}}
{{--                    </div>--}}
                </div>
            </div>
            <div class="card-footer">
                <div class="col-md-4">
                    <button type="submit" class="btn btn-primary">Поиск</button>
{{--                    <button class="btn btn-danger" class="form-reloader">Сбросить</button>--}}
                </div>
            </div>
        </form>
    </div>
@stop

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">

            <div class="card-header">
               <h3 class="card-title pt-1">Список</h3>

                <div class="card-tools"><a href="{{ route('admin.products.export') }}" class="btn btn-success btn-sm"><i class="fa fa-file-excel" aria-hidden="true"></i> Export</a></div>
                <div class="card-tools"><a href="{{ route('admin.products.export-thousand') }}" class="btn btn-success btn-sm  mr-4"><i class="fa fa-file-excel" aria-hidden="true"></i> Export 1000$</a></div>
            </div>

            <div class="card-body table-responsive table-striped p-0">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Артикул</th>
                                <th>Изображение</th>
                                <th>Название 1С</th>
                                <th>Название сайт</th>
                                <th>Цена</th>
                                <th>Характеристики</th>
                                <th class="text-right">Действия</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($products as $item)
                                <tr>
                                    <td>{{ $item->id ?? '' }}</td>
                                    <td>{{ $item->vendor_code ?? '' }}</td>
                                    <td>
                                        @if($item->images()->first())
                                            <a target="_blank" href="{{ route('page.product', $item->slug) }}"><img style="width: 150px; height: 150px; object-fit: contain;" src="{{ $item->poster() }}" alt=""></a>
                                        @else
                                            <span style="color: red;">Нет изображения</span>
                                        @endif
                                    </td>
                                    <td>{{ $item->name ?? '' }}</td>
                                    <td>{{ $item->displayName() ?? '' }}</td>
                                    <td>
                                        <x-price :price="$item->price" :productCurrency="$item->currency_id" :currency="$item->currency->code" />
                                    </td>
                                    <td>
                                        Масса: {{ $item->getCharacteristic('mass') }}<br>
                                        @if($item->getCharacteristic('metal_color') && $item->getCharacteristic('brand') !== 'La Perla')
                                            Материал: {{ $item->getCharacteristic('metal_color') }}<br>
                                        @endif
                                        @if($item->getCharacteristic('cloth_material') && $item->getCharacteristic('brand') !== 'La Perla')
                                            Материал:
                                            @foreach(json_decode($item->getCharacteristic('cloth_material')) as $material)
                                                {{ $material }} @if(!$loop->last) , @endif
                                            @endforeach
                                            <br>
                                        @endif
                                        @if($item->getCharacteristic('stones') && $item->getCharacteristic('brand') !== 'La Perla')
                                            Камни:
                                            @foreach(json_decode($item->getCharacteristic('stones')) as $stone)
                                                {{ $stone->stone_type }} @if(!$loop->last), @endif
                                            @endforeach
                                            <br>
                                        @endif
                                        Бренд: {{ $item->getCharacteristic('brand') }}<br>
                                        Коллекция: {{ $item->getCharacteristic('collection') }}<br>
                                        Тип товара: {{ $item->getCharacteristic('product_type') }}<br>
                                        Размер: {{ $item->getCharacteristic('size') }}<br>
                                    </td>
                                    <td class="text-right">
                                        <a class="btn btn-info btn-sm" href="{{ url('/admin/products-images?product_id=' . $item->id) }}"><i class="fas fa-image"></i></a>
                                        <a class="btn btn-info btn-sm" href="{{ url('/admin/products/' . $item->id . '/edit') }}"><i class="fas fa-pencil-alt"></i></a>
                                    </td>
                                </tr>
                           @endforeach
                        </tbody>
                    </table>
                    <div class="pagination-wrapper pl-3"> {!! $products->appends(['search' => Request::get('search')])->render() !!} </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="card">

            <div class="card-header">
                <h3 class="card-title pt-1">Список курс валют</h3>
            </div>

            <div class="card-body table-responsive table-striped p-0">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Название</th>
                            <th>Код</th>
                            <th>Значение</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($currencies as $currency)
                            <tr>
                                <td>{{ $currency->id }}</td>
                                <td>{{ $currency->name }}</td>
                                <td>{{ $currency->code }}</td>
                                <td>{{ $currency->value }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
