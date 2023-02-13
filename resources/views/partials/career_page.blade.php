@extends('layouts.theme')

@section('title', 'Карьера')

@section('content')
    <div class="info-page career-page">
        <div class="container">
            <section class="info-page delivery">
                @desktop
                <aside class="sidebar-left career">
                    <h3 class="info-page-title sidebar-left-title">{{ __('Карьера') }}</h3>
                    <nav class="info-page-nav">
                        <ul class="info-page-list">
                            @foreach($categories as $category)
                                <li class="info-page-list__item">
                                    <a href="{{ route('career.list', $category->slug) }}" class="{{ (request()->routeIs('career.list', $category->slug)) ? 'active' : '' }} info-page-list__link">
                                        <p class="info-page-list__text">{{ $category->name }}</p>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </nav>
                </aside>
                @enddesktop
                @handheld
                <a href="{{ route('career.list') }}" class="info-page-arrow">
                    <svg width="17" height="14" viewBox="0 0 17 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M1 7L0.646447 6.64645L0.292893 7L0.646447 7.35355L1 7ZM15.9783 7.5C16.2545 7.5 16.4783 7.27614 16.4783 7C16.4783 6.72386 16.2545 6.5 15.9783 6.5V7.5ZM6.64645 0.646447L0.646447 6.64645L1.35355 7.35355L7.35355 1.35355L6.64645 0.646447ZM0.646447 7.35355L6.64645 13.3536L7.35355 12.6464L1.35355 6.64645L0.646447 7.35355ZM1 7.5L15.9783 7.5V6.5L1 6.5V7.5Z" fill="#2E3338"/>
                    </svg>
                </a>
                @endhandheld
                <div class="info-page-block career-info-page">
                    <div class="career-list">
                        <h1 class="career-title">{{ $career->titleLocal }}</h1>
                        <div class="career-info">{!! $career->textLocal !!}</div>
                        <a href="#" data-type="career-id" class="btn-black career-btn career-button">{{ __('Откликнуться НА ВАКАНСИЮ') }}</a>
                    </div>
                    @desktop
                    <div class="flex career-location">
                        <p class="city flex item-center"><img src="{{ url('i/icons/pin.svg') }}" alt="">{!! $career->addressLocal !!}</p>
                    </div>
                    @enddesktop
                </div>
                <div class="vacancy-different">
                    <h4>{{ __('Не нашли подходящую вакансию?') }}</h4>
                    <p>
                        {!! __('Отправьте нам ваше резюме!') !!}
                    </p>

                    <a href="#" class="career-button">{{ __('Отправить резюме') }}</a>
                </div>
            </section>
        </div>
    </div>
@stop

@section('modal')
    <div class="remodal" data-remodal-id="send-resume">
        <button data-remodal-action="close" class="remodal-close"></button>
        <h2>{!! __('Отправка резюме') !!}</h2>

        <form action="{{ route('send-resume.index') }}" method="post" enctype="multipart/form-data" class="form styled minified">
            @csrf
            <div class="form-group @error('surname') form-error @enderror">
                <label for="surname">{{ __('Фамилия') }}</label>
                @error('surname') <span class="error-msg">{{ $message }}</span> @enderror
                <div class="infoed">
                    <input type="text" name="surname" id="surname" placeholder="Введи фамилию">
                </div>
            </div>

            <div class="form-group @error('name') form-error @enderror">
                <label for="name">{{ __('Имя') }}</label>
                @error('name') <span class="error-msg">{{ $message }}</span> @enderror
                <div class="infoed">
                    <input type="text" name="name" id="name" placeholder="Введи имя">
                </div>
            </div>
            <div class="form-group @error('file') form-error @enderror">
                <label for="resume">{{ __('Резюме') }}</label>
                @error('file') <span class="error-msg">{{ $message }}</span> @enderror
                <div class="infoed">
                    <input type="file" name="file">
                </div>
            </div>
            <input type="hidden" name="careers_id" id="careers_id" value="{{ $career->id ?? '' }}">
            <button class="btn-black" type="submit">{{ __('Отправить') }}</button>
        </form>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript">
        $(document).ready(function () {
            @if ($errors->count() > 0)
            $('.career-button').trigger('click');
            @endif
        });
    </script>
@endsection
