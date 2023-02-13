@extends('adminlte::page')

@section('title', 'Career')

@section('content_header')
    <a href="{{ route('admin.career.index') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Назад</button></a>
    <h1 class="text-center mb-4">Создать вакансию</h1>
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

                        <form method="POST" action="{{ route('admin.career.store') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            @include ('admin.vacancies.form', ['formMode' => 'create'])
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
    </script>
@endsection
