@extends('adminlte::page')

@section('title', 'Banners')

@section('content_header')
    <div class="card mt-4">
        <div class="card-header">
            <h5 class="mb-0">Banners - 0</h5>
        </div>
        <form action="" method="get">
            <div class="card-body">
                <div class="filters row">
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="">{{ __('Номер телефона') }}</label>
                            <input type="text" class="form-control" rel="phone">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label>{{ __('Дата загрузки:') }}</label>

                            <div class="input-group">
                                <div class="input-group-prepend">
                                  <span class="input-group-text">
                                    <i class="far fa-calendar-alt"></i>
                                  </span>
                                </div>
                                <input type="text" class="form-control float-right" rel="daterange">
                            </div>
                            <!-- /.input group -->
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label>{{ __('Дата покупки:') }}</label>

                            <div class="input-group">
                                <div class="input-group-prepend">
                                  <span class="input-group-text">
                                    <i class="far fa-calendar-alt"></i>
                                  </span>
                                </div>
                                <input type="text" class="form-control float-right" rel="daterange">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="">{{ __('Статус') }}</label>
                            <select class="form-control">
                                <option>option 1</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="">{{ __('Сеть') }}</label>
                            <select class="form-control">
                                <option>option 1</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <div class="col-md-4">
                    <button type="submit" class="btn btn-primary">{{ __('Поиск') }}</button>
                    <button class="btn btn-danger" class="form-reloader">{{ __('Сбросить') }}</button>
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
               <h3 class="card-title pt-2">Banners</h3>
                 <div class="card-tools">
                    <a href="{{ url('/admin/banners/create') }}" class="btn btn-success btn-sm"><i class="fa fa-plus" aria-hidden="true"></i> {{ __('Создать') }}</a>
                 </div>
            </div>

            <div class="card-body table-responsive table-striped p-0">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th><th>Type Id</th><th>Image</th><th>Link</th><th class="text-right">{{ __('Действия') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($banners as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->type_id }}</td><td>{{ $item->image }}</td><td>{{ $item->link }}</td>
                                <td class="text-right">
                                    <a class="btn btn-info btn-sm" href="{{ url('/admin/banners/' . $item->id . '/edit') }}"><i class="fas fa-pencil-alt"></i></a>
                                    <form method="POST" action="{{ url('/admin/banners' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                        {{ method_field('DELETE') }}
                                        {{ csrf_field() }}
                                        <button type="submit" class="btn btn-danger btn-sm" title="Delete banner" onclick="return confirm('Вы уверены?')"><i class="fas fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="pagination-wrapper"> {!! $banners->appends(['search' => Request::get('search')])->render() !!} </div>
                </div>

            </div>
        </div>
    </div>
</div>
@stop

@section('js')
    <script>
        $(function () {

                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-center',
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                            toast.addEventListener('mouseenter', Swal.stopTimer)
                            toast.addEventListener('mouseleave', Swal.resumeTimer)
                        }
                    });

                    @if(session()->has('flash_message'))
                        Toast.fire({
                            title: '{{ session('flash_message') }}'
                        });
                    @endif

             let daterange = $('[rel="daterange"]').daterangepicker({
                            autoUpdateInput: false,
                            "locale": {
                                "applyLabel": "Применить",
                                "cancelLabel": "Отменить",
                                "format": "YYYY-MM-DD",
                                "daysOfWeek": [
                                    "Вс",
                                    "Пн",
                                    "Вт",
                                    "Ср",
                                    "Чт",
                                    "Пт",
                                    "Сб"
                                ],
                                "monthNames": [
                                    "Январь",
                                    "Февраль",
                                    "Март",
                                    "Апрель",
                                    "Май",
                                    "Июнь",
                                    "Июль",
                                    "Август",
                                    "Сентябрь",
                                    "Октябрь",
                                    "Ноябрь",
                                    "Декабрь"
                                ],
                                "firstDay": 1
                            }
                        });

                        daterange.on('apply.daterangepicker', function(ev, picker) {
                            $(this).val(picker.startDate.format('YYYY-MM-DD') + ' / ' + picker.endDate.format('YYYY-MM-DD'));
                        });

                        daterange.on('cancel.daterangepicker', function(ev, picker) {
                            $(this).val('');
                        });
            Inputmask({ "mask": "+\\7 (\\799) 999-99-99"}).mask(document.querySelectorAll("[rel=phone]"));
        });
    </script>
@stop
