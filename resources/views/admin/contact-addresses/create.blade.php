@extends('adminlte::page')

@section('title', 'Адреса')

@section('content_header')
    <a href="{{ route('admin.contacts.index') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Назад</button></a>
    <h1 class="text-center mb-4">Добавить адрес</h1>
@stop

@section('content')
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        <form method="POST" action="{{ route('admin.contact-addresses.store') }}" id="contact-form" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <input type="hidden" name="city_id" value="{{ $city->id }}">
                            @include ('admin.contact-addresses.form', ['formMode' => 'create'])
                        </form>
                    </div>
                </div>
            </div>
        </div>
@endsection

@section('js')
    <script>
        $(function () {
            document.querySelectorAll('[rel="editor"]').forEach(el => {
                ClassicEditor
                    .create(el)
                    .then( editor => {
                        console.log( editor );
                    } )
                    .catch( error => {
                        console.error( error );
                    } );
            });
        });

        $(document).ready(function(){
            let i = 1;

            $('#add').click(function(){
                i++;
                $('#dynamic_field').append('<div id="row'+i+'" class="dynamic-added" style="display: flex; margin-top: 1rem; gap: 1rem;"><div style="width: 100%;"><input type="tel" name="phones[]" class="form-control name_list" /></div><div><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></div></div>');
            });
            $(document).on('click', '.btn_remove', function(){
                let button_id = $(this).attr("id");
                $('#row'+button_id+'').remove();
            });
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('#submit').click(function(){
                $.ajax({
                    url: 'admin/contact-addresses/store',
                    method:"POST",
                    data:$('#contact-form').serialize(),
                    type:'json',
                    success:function(data)
                    {
                        i=1;
                        $('.dynamic-added').remove();
                        $('#add_name')[0].reset();
                    }
                });
            });
        });
    </script>
@endsection
