@extends('layouts.theme')

@section('title', 'Адреса')

@section('content')
<div class="contacts-page">
    <div class="container">

        <div class="c-header">
            @desktop
            <div class="contacts-addresses flex item-center space-center">
                <div>
                    <span class="weighter">+ 7 701 039 5550</span>
{{--                    <span class="weighter">+ 7 775 039 5550</span>--}}
{{--                    <span class="weighter">+ 7 777 401 0888</span>--}}
                    {{ __('С 10:00 до 19:00 (по г. Нур-Султан)') }}
                </div>
                <div>
                    <span>pr@zhannakangroup.com</span>
                    {{ __('по всем вопросам') }}
                </div>
                <div>
                    <span>hr@zhannakangroup.com</span>
                    {!! __('для откликов на вакансии') !!}
                </div>
            </div>
            @enddesktop
        </div>

        @handheld
        <div class="contacts-addresses flex item-center space-center">
            <div>
                <span class="weighter">+ 7 701 039 5550</span>
{{--                <span class="weighter">+ 7 775 039 5550</span>--}}
{{--                <span class="weighter">+ 7 777 401 0888</span>--}}
                {{ __('С 10:00 до 19:00 (по г. Нур-Султан)') }}
            </div>
            <div>
                <span>pr@zhannakangroup.com</span>
                {{ __('по всем вопросам') }}
            </div>
            <div>
                <span>hr@zhannakangroup.com</span>
                {!! __('для откликов на вакансии') !!}
            </div>
        </div>
        @endhandheld

        <div class="info-page-content">
            <div class="info-page-content__container tabos">
                @desktop
                <div class="tab-content">
                    <address class="info-page-address">
                        <div id="map" style="width:100%; height:658px"></div>
                    </address>
                </div>
                @enddesktop
                <div class="info-page">
                    <div class="details">
                        <div class="cities">
                            @foreach($data->get('cities') as $city)
                                <a href="#" class="title {{ $loop->first ? 'active' : '' }}" data-link-tab="{{ $city->id }}" data-map-type="city" data-map-coordinates="{{ $city->getRawOriginal('coordinates') }}">
                                    {{ $city->nameLocal }}
                                    @handheld
                                    <img src="{{ asset('i/icons/arrow-down.svg') }}" alt="">
                                    @endhandheld
                                </a>
                            @endforeach
                        </div>
                        @desktop
                        <div class="tabs-content">
                            @foreach($data->get('cities') as $city)

                                <div class="tab-content {{ $loop->first ? 'active' : '' }}" data-tab="{{ $city->id }}">
                                    @foreach($city->addresses as $address)
                                        <div class="info-page-about" data-map-type="address" data-map-coordinates="{{ $address->getRawOriginal('coordinates') }}">
                                            <div class="info-page-about__content">
                                                <a href="#" class="title">{{ $address->nameLocal }}</a>
                                                <span class="address">{{ $address->infoLocal }}</span>
                                                <div class="numbers">
                                                    @foreach($address->phones as $phone)
                                                        <span>{{ $phone }}</span>
                                                    @endforeach
                                                </div>
                                            </div>
                                            <div class="info-page-about__content">
                                                @foreach($address->brandsModels as $brand)
                                                    @if($brand->logo != null)
                                                        <img src="{{ $brand->logoPath }}" class="logo" alt="">
                                                    @endif
                                                @endforeach
                                            </div>
                                        </div>
                                        @if($loop->first)
                                            <img src="{{ asset('i/icons/line.svg') }}" class="line" alt="">
                                        @endif
                                    @endforeach
                                </div>
                            @endforeach
                        </div>
                        @enddesktop
                    </div>
                </div>
                @handheld
                <div class="tab-content">
                    <address class="info-page-address">
                        <div id="map" style="width:100%; height:658px"></div>
                    </address>
                </div>
                @endhandheld
            </div>
            @desktop
            <div class="all-addresses">
                <div class="all-addresses-content">
                    @foreach($data->get('cities') as $city)
                        <div class="all-addresses-info">
                            <span class="title" data-map-type="city" data-map-coordinates="{{ $city->getRawOriginal('coordinates') }}">{{ $city->nameLocal }}</span>
                            @foreach($city->addresses as $address)
                                <div class="all-addresses-text" data-map-type="address" data-map-coordinates="{{ $address->getRawOriginal('coordinates') }}">
                                    <div class="brands">
                                        @foreach($address->brandsModels as $brand)
                                            <span class="title-1">{{ $brand->name }}</span>
                                        @endforeach
                                    </div>
                                    <span class="house" style="cursor:pointer;">{{ $address->nameLocal }}</span>
                                    <span class="address">{{ $address->infoLocal }}</span>
                                    <div class="numbers">
                                        @foreach($address->phones as $phone)
                                            <span>{{ $phone }}</span>
                                        @endforeach
                                    </div>
                                </div>
                                @if($loop->first)
                                    <img src="{{ asset('i/icons/half-line.svg') }}" alt="">
                                @endif
                            @endforeach
                        </div>
                    @endforeach
                </div>
            </div>
            @enddesktop
        </div>
    </div>
</div>
@stop
<script type="text/javascript">
    const mapData = {!! $data->toJson(true) !!}
</script>
