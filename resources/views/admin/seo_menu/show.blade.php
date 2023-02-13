@extends('adminlte::page')

@section('title', 'SEO Меню #'. $menu->id)

@section('content_header')
    <a href="{{ url('/admin/seo_menu') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Назад</button></a>
    <h1 class="text-center mb-4">{{ $menu->name }}</h1>
@stop

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Информация о SEO</div>
                <div class="card-body">
                    <p>Заголовок: <br> <strong>{{ $menu->title }}</strong></p>
                    <p>Описание: <br><strong>{{ $menu->description }}</strong></p>
                    <p>Заголовок H1: <br><strong>{{ $menu->H1 }}</strong></p>
                    <p>Заголовок H2: <br><strong>{{ $menu->H2 }}</strong></p>
                    <p>Заголовок H3: <br><strong>{{ $menu->H3 }}</strong></p>
                    <p>Заголовок H4: <br><strong>{{ $menu->H4 }}</strong></p>
                    <p>Заголовок H5: <br><strong>{{ $menu->H5 }}</strong></p>
                    <p>Заголовок H6: <br><strong>{{ $menu->H6 }}</strong></p>
                    <p>SEO Текст H1: <br><strong>{{ $menu->H1_seo_text }}</strong></p>
                    <p>SEO Текст H2: <br><strong>{{ $menu->H2_seo_text }}</strong></p>
                    <p>SEO Текст H3: <br><strong>{{ $menu->H3_seo_text }}</strong></p>
                    <p>SEO Текст H4: <br><strong>{{ $menu->H4_seo_text }}</strong></p>
                    <p>SEO Текст H5: <br><strong>{{ $menu->H5_seo_text }}</strong></p>
                    <p>SEO Текст H6: <br><strong>{{ $menu->H6_seo_text }}</strong></p>
                    <p>Ключевые слова: <br><strong>{{ $menu->keywords }}</strong></p>
                </div>
            </div>
        </div>
    </div>
@endsection
