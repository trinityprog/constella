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
                                    {!! __('Мы открыты к сотрудничеству') !!}
                                </p>
                                <form action="{{ route('partnership.action') }}" method="post" class="form styled">
                                    @csrf
                                    <input type="hidden" name="type" value="for-press">
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
                                    {!! __('Не забудьте указать название издания') !!}
                                </p>
                            </div>

                        </div>
                        <div class="partner-image">
                            <img src="{{ url('i/p-press.jpg') }}" alt="">
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
@stop
