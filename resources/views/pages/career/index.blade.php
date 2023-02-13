@extends('layouts.theme')

@section('title', 'Карьера')

@section('content')
    <div class="info-page career-page">
        <div class="container">
            <section class="info-page delivery">
                @desktop
                    <aside class="sidebar-left career">
                        <a href="{{ route('career.list') }}" class="info-page-title sidebar-left-title">{{ __('Карьера') }}</a>
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
                <aside class="sidebar-left career">
                    <p class="dropdown-list mobile-slideover sphere">{{ __('УТОЧНИТЬ СФЕРУ') }}</p>
                    <nav class="slidedown-element">
                        <ul class="career-page-list">
                            @foreach($categories as $category)
                                <li class="career-page-item"><a href="{{ route('career.list', $category->slug) }}" class=""><p class="">{{ $category->name }}</p></a></li>
                            @endforeach
                        </ul>
                    </nav>
                    <h3 class="info-page-title sidebar-left-title">{{ __('Карьера') }}</h3>
                </aside>
                @endhandheld

                <div class="info-page-block">
                    <div class="career-list">
                        @foreach($career as $car)
                            <div class="career-item outer">
                                <a href="{{ route('career.index', $car->id) }}" class="lider flex items-start space-between">
                                    <div>
                                        <h3>{{ $car->titleLocal }}</h3>
                                        <div class="description">{!! Str::limit($car->textLocal, 150, ' . .') !!}</div>
                                    </div>
                                    <div class="flex career-address">
                                        <div class="city flex item-center">
                                            <img src="{{ url('i/icons/pin.svg') }}" alt="">
                                            {!!  $car->addressLocal !!}
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
{{--                    @if($career->count() >= 2)--}}
                    <div class="pagination-container">
                        <a href="#" class="go-up">@desktop<img src="{{ url('i/icons/arrow-down-sort.svg') }}">@enddesktop{{ __('НАВЕРХ') }}</a>
                        {{ $career->links() }}
                    </div>
{{--                    @endif--}}
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
