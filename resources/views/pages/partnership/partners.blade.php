@extends('layouts.theme')

@section('title', 'Для прессы')

@section('content')
    <div class="info-page career-page partnership-page">
        <div class="container">
            <section class="info-page">
                @include('partials.partnership_sidebar')

                <div class="info-page-block">
                    <div class="info-fl flex stretch space-between">
                        <div class="partner-info">

                            <div class="pi-top flex column item-center space-center">
                                <p class="text">
                                    {!! __('Напишите нам и мы расскажем о вариантах сотрудничества') !!}
                                </p>
                                <form action="{{ route('partnership.action') }}" class="form styled" method="post">
                                    @csrf
                                    <input type="hidden" name="type" value="for-partners">
                                    <div class="form-group @error('email_partners') form-error @enderror">
                                        @error('email_partners') <span class="error-msg">{{ $message }}</span> @enderror
                                        <input type="text" name="email_partners" placeholder="{{ __('Ваш email') }}">
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn-black">{{ __('Написать письмо') }}</button>
                                    </div>
                                </form>
                            </div>
                            <div class="pi-bottom">
                                <p>
                                    {!! __('Если вы настроены на долгосрочное партнерство') !!}
                                </p>
                            </div>

                        </div>
                        <div class="partner-image">
                            <img src="{{ url('i/p-partners.jpg') }}" alt="">
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
@stop
