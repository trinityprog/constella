@extends('layouts.theme')

@section('title', 'Спонсорам')

@section('content')
    <div class="info-page career-page partnership-page">
        <div class="container">
            <section class="info-page">
                @include('partials.partnership_sidebar')

                <div class="info-page-block">
                    <div class="info-fl flex stretch space-between">

                        <div class="partner-info">
                            <div class="pi-top">
                                <p class="text-center"><img src="{{ url('i/icons/charity.svg') }}" alt=""></p>
                                <p class="text mb-0">{{ __('Благотворительная деятельность') }}</p>
                                <p class="sub-text">
                                    {{ __('Команда Zhan Kan Group ежегодно проводит') }}
                                </p>
                            </div>

                            <div class="pi-top flex column item-center space-center">
                                <p class="text">
                                    {!! __('Если вы заинтересованы принять участие') !!}
                                </p>
                                <form action="{{ route('partnership.action') }}" method="post" class="form styled">
                                    @csrf
                                    <input type="hidden" name="type" value="for-sponsors">
                                    <div class="form-group @error('email_partners') form-error @enderror">
                                        @error('email_partners') <span class="error-msg">{{ $message }}</span> @enderror
                                        <input type="text" name="email_partners" placeholder="{{ __('Ваш email') }}">
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn-black">{{ __('Оставить заявку') }}</button>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <div class="partner-image">
                            <img src="{{ url('i/p-sponsors.jpg') }}" alt="">
                        </div>

                    </div>
                </div>
            </section>
        </div>
    </div>
@stop
