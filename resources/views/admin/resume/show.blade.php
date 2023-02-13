@extends('adminlte::page')

@section('title', 'Резюме #'. $resume->id)

@section('content_header')
    <a href="{{ route('admin.career.index') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Назад</button></a>
    <h1 class="text-center mb-4">Резюме #{{ $resume->id }}</h1>
@stop

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Информация о резюме</div>
                <div class="card-body">
                    <p>Имя: <b>{{ $resume->name }}</b></p>
                    <p>Фамилия: <b>{{ $resume->surname }}</b></p>
                    <p>Вакансия: <b>{{ $resume->careers->title_ru ?? '-' }}</b></p>
                    @if(isset($resume->careers_id))
                        <p>Id вакансии: <b>{{ $resume->careers_id }}</b></p>
                    @else
                        <p>Id вакансии: - </p>
                    @endif
                    <a href="{{ asset('i/'. $resume->file) }}" download="{{ $resume->file }}">Скачать файл</a>
                </div>
            </div>
        </div>
    </div>
@endsection
