@extends('adminlte::page')

@section('title', 'Colors')

@section('content_header')
    <div class="card mt-4">
        <div class="card-header">
            <h5 class="mb-0">Colors - 0</h5>
        </div>
        <form action="" method="get">
            <div class="card-body">
                <div class="filters row">
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="">Номер телефона</label>
                            <input type="text" class="form-control" rel="phone">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label>Дата загрузки: </label>

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
                            <label>Дата покупки: </label>

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
                            <label for="">Статус</label>
                            <select class="form-control">
                                <option>option 1</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="">Сеть</label>
                            <select class="form-control">
                                <option>option 1</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <div class="col-md-4">
                    <button type="submit" class="btn btn-primary">Поиск</button>
                    <button class="btn btn-danger" class="form-reloader">Сбросить</button>
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
               <h3 class="card-title pt-2">Colors</h3>
                 <div class="card-tools">
                    <a href="{{ url('/admin/colors/create') }}" class="btn btn-success btn-sm"><i class="fa fa-plus" aria-hidden="true"></i> Создать</a>
                 </div>
            </div>

            <div class="card-body table-responsive table-striped p-0">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th><th>Name</th><th>Code</th><th>Abbr</th><th class="text-right">Действия</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($colors as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->name }}</td><td>{{ $item->code }}</td><td>{{ $item->abbr }}</td>
                                <td class="text-right">
                                    <a class="btn btn-info btn-sm" href="{{ url('/admin/colors/' . $item->id . '/edit') }}"><i class="fas fa-pencil-alt"></i></a>
                                    <form method="POST" action="{{ url('/admin/colors' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                        {{ method_field('DELETE') }}
                                        {{ csrf_field() }}
                                        <button type="submit" class="btn btn-danger btn-sm" title="Delete color" onclick="return confirm('Вы уверены?')"><i class="fas fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="pagination-wrapper"> {!! $colors->appends(['search' => Request::get('search')])->render() !!} </div>
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
