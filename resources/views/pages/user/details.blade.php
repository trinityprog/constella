@extends('layouts.theme')

@section('title', 'Мои данные')

@section('content')
    @desktop
    <div class="profile-page">
        <div class="container">
            <div class="inner">
                <div class="heads">
                    <p class="title"></p>
                    <a href="{{ route('auth.logout') }}" class="btn flex item-center space-center">
                        <svg width="13" height="13" viewBox="0 0 13 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M3.70918 8.6385L2.21381 7.15L8.44886 7.15C8.6213 7.15 8.78667 7.08152 8.9086 6.95962C9.03053 6.83772 9.09903 6.67239 9.09903 6.5C9.09903 6.32761 9.03053 6.16228 8.9086 6.04038C8.78667 5.91848 8.6213 5.85 8.44886 5.85L2.21381 5.85L3.70918 4.3615C3.77012 4.30107 3.81849 4.22918 3.8515 4.14997C3.88451 4.07077 3.9015 3.98581 3.9015 3.9C3.9015 3.81419 3.88451 3.72923 3.8515 3.65003C3.81849 3.57082 3.77012 3.49893 3.70918 3.4385C3.64874 3.37758 3.57683 3.32922 3.49761 3.29622C3.41838 3.26322 3.3334 3.24623 3.24757 3.24623C3.16174 3.24623 3.07676 3.26322 2.99753 3.29622C2.9183 3.32922 2.84639 3.37758 2.78595 3.4385L0.185305 6.0385C0.126114 6.10032 0.0797147 6.17321 0.0487706 6.253C-0.0162573 6.41125 -0.0162573 6.58875 0.0487707 6.747C0.0797147 6.82679 0.126114 6.89968 0.185305 6.9615L2.78595 9.5615C2.84657 9.6221 2.91854 9.67018 2.99774 9.70298C3.07695 9.73578 3.16184 9.75266 3.24757 9.75266C3.3333 9.75266 3.41819 9.73578 3.49739 9.70298C3.5766 9.67018 3.64856 9.6221 3.70918 9.5615C3.7698 9.50089 3.81789 9.42895 3.8507 9.34976C3.8835 9.27058 3.90039 9.18571 3.90039 9.1C3.90039 9.01429 3.8835 8.92942 3.8507 8.85024C3.81789 8.77105 3.7698 8.69911 3.70918 8.6385ZM7.7987 0.65C7.7987 0.822391 7.8672 0.987721 7.98913 1.10962C8.11106 1.23152 8.27643 1.3 8.44886 1.3L11.0495 1.3C11.2219 1.3 11.3873 1.36848 11.5092 1.49038C11.6312 1.61228 11.6997 1.77761 11.6997 1.95L11.6997 11.05C11.6997 11.2224 11.6312 11.3877 11.5092 11.5096C11.3873 11.6315 11.2219 11.7 11.0495 11.7L8.44886 11.7C8.27643 11.7 8.11106 11.7685 7.98913 11.8904C7.8672 12.0123 7.7987 12.1776 7.7987 12.35C7.7987 12.5224 7.8672 12.6877 7.98913 12.8096C8.11106 12.9315 8.27643 13 8.44886 13L11.0495 13C11.5668 13 12.0629 12.7946 12.4287 12.4289C12.7945 12.0632 13 11.5672 13 11.05L13 1.95C13 1.43283 12.7945 0.936838 12.4287 0.571142C12.0629 0.205446 11.5668 4.48073e-07 11.0495 -4.8299e-07L8.44886 -3.69312e-07C8.27643 -3.61774e-07 8.11106 0.068482 7.98913 0.19038C7.8672 0.312278 7.7987 0.477609 7.7987 0.65Z" fill="#272727"/>
                        </svg>
                        {{ __('Выход') }}
                    </a>
                </div>
                <div class="user-infos">
                    <div class="data-info">
                        <p class="subtitles flex item-center mt-0"><img src="{{ url('i/icons/my-data-bg.svg') }}" alt="">{{ __('Мои данные') }}</p>

                        <div class="discount">
                            <p class="user-discount">
                                {{ __('Моя скидка') }}
                                <span>{{ (isset($info->discount)) ? $info->discount : '0' }}%</span>
                            </p>
                            <p class="user-bonus">
                                {{ __('Мои бонусы') }}
                                <span>{{ (isset($info->bonuses)) ? $info->bonuses : '0' }}</span>
                            </p>
                        </div>

                        <div class="user-data">
                            <p class="name">{{ auth()->user()->fullName() }}</p>
                            <p>{{ auth()->user()->email }}</p>
                            @if(isset($info))
                                <p>{{ $info->phone }}</p>
                                <p>{{ $info->formattedDob() }}</p>
                                @if(isset($info->iin)) <p>{{ __('ИИН:') }} {{ $info->iin }}</p> @endif
                            @endif
                            <p>{{ __('Пол:') }} {{ auth()->user()->gender() }}</p>
                        </div>

                        <div class="user-btns flex item-center">
                            <a href="{{ route('user.profile.edit') }}" class="btn-black">
                                <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M9.9492 2.67019L13.204 5.94086L4.96526 14.2199L1.71234 10.9492L9.9492 2.67019ZM15.6737 1.88138L14.2222 0.422776C13.6612 -0.140925 12.7504 -0.140925 12.1875 0.422776L10.7971 1.81998L14.0519 5.09068L15.6737 3.46092C16.1088 3.02368 16.1088 2.31859 15.6737 1.88138ZM0.00905723 15.5464C-0.0501753 15.8143 0.190506 16.0544 0.457113 15.9892L4.084 15.1055L0.831082 11.8348L0.00905723 15.5464Z" fill="#272727"/>
                                </svg>
                                {{ __('РЕДАКТИРОВАТЬ') }}
                            </a>
                            <a href="{{ route('user.profile.password') }}" class="btn-white">
                                <svg width="16" height="15" viewBox="0 0 16 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M10.4345 4.7582L12.8928 2.36662M14.2976 1L12.8928 2.36662L14.2976 1ZM7.54763 7.5666C7.9103 7.91473 8.19861 8.3292 8.39595 8.78617C8.59328 9.24313 8.69576 9.73356 8.69746 10.2292C8.69917 10.7249 8.60008 11.2159 8.40589 11.6742C8.21171 12.1324 7.92626 12.5488 7.56599 12.8992C7.20573 13.2497 6.77775 13.5274 6.30672 13.7163C5.83568 13.9052 5.33088 14.0016 4.82139 14C4.3119 13.9983 3.80778 13.8986 3.33805 13.7067C2.86833 13.5147 2.44228 13.2342 2.08443 12.8814C1.38073 12.1726 0.991344 11.2232 1.00015 10.2379C1.00895 9.25247 1.41523 8.30987 2.13149 7.61307C2.84775 6.91627 3.81668 6.52102 4.82958 6.51246C5.84249 6.50389 6.81833 6.8827 7.54693 7.56729L7.54763 7.5666ZM7.54763 7.5666L10.4345 4.7582L7.54763 7.5666ZM10.4345 4.7582L12.5416 6.80813L15 4.41655L12.8928 2.36662L10.4345 4.7582Z" stroke="#272727" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                                {{ __('ИЗМЕНИТЬ ПАРОЛЬ') }}
                            </a>
                        </div>

                    </div>
                    <div class="data-adresses">
                        <p class="subtitles flex item-center mt-0"><img src="{{ url('i/icons/my-location-bg.svg') }}" alt="">{{ __('Адреса доставки')}}</p>
                        <div class="adresses">
                            @foreach(auth()->user()->addresses()->orderByDesc('created_at')->get() as $address)
                                <div class="location flex item-center space-between">
                                    <p class="name">{{ $address->title }}</p>
                                    <div class="description">
                                        <p>{{ $address->city }} {{ $address->index }}</p>
                                        <p>{{ $address->address }} {{ $address->area }}</p>
                                    </div>
                                    <div class="actions flex">
                                        <a href="{{ route('user.profile.address.edit', $address->id) }}" class="edit"><img src="{{ url('i/icons/pen.svg') }}" alt=""></a>
                                        <div class="dropdown">
                                            <a href="#" class="element delete"><img src="{{ url('i/icons/close-black.svg') }}" alt=""></a>
                                            <div class="droppable right delete-one">
                                                <p>{{ __('Удалить адрес?') }}</p>
                                                <div class="two-drop-buttons flex item-center">
                                                    <a href="#" class="btn-white tdb-close">{{ __('Отменить') }}</a>
                                                    <a href="#" class="btn-black flex item-center" data-delete="{{ $address->id }}">{{ __('Удалить') }}
                                                        <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M6.00015 4.58926L1.7027 0.291588C1.31394 -0.0971957 0.682504 -0.0971957 0.292501 0.291588C-0.0975011 0.681611 -0.0975011 1.31308 0.292501 1.7031L4.58996 6.00077L0.292502 10.2972C-0.0975006 10.6872 -0.0975006 11.3187 0.292502 11.7075C0.682504 12.0975 1.31394 12.0975 1.7027 11.7075L6.00015 7.40981L10.2976 11.7075C10.6876 12.0975 11.3178 12.0975 11.7078 11.7075C11.9034 11.5131 12 11.258 12 11.003C12 10.7479 11.9034 10.4928 11.7078 10.2972L7.41159 6.00077L11.7078 1.7031C11.9034 1.50871 12 1.25241 12 0.997343C12 0.742281 11.9034 0.487218 11.7078 0.291587C11.3178 -0.0971961 10.6876 -0.0971961 10.2976 0.291587L6.00015 4.58926Z" fill="#fff"/>
                                                        </svg>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <a href="{{ route('user.profile.address') }}" class="add-location flex item-center"><img src="{{ url('i/icons/plus.svg') }}" alt="">{{ __('Добавить новый адрес') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @enddesktop

    @handheld
    <div class="profile-page my-info">
        <div class="container">
            <p class="dropdown-list title-1">{!! __('Мои данные') !!} <img src="{{ url('i/icons/arrow-down-sort.svg') }}" class="img" alt=""></p>
            <div class="my-info__list slidedown-element block">
                <div class="my-info__discount">
                    <p class="my-info__text">
                        <span>{{ (isset($info->discount)) ? $info->discount : '0' }}%</span>
                        {{ __('Моя скидка') }}
                    </p>

                    <p class="my-info__text">
                        <span>{{ (isset($info->bonuses)) ? $info->bonuses : '0' }}</span>
                        {{ __('Мои бонусы') }}
                    </p>
                </div>
                <div class="my-info__user">
                    <p class="name">{{ auth()->user()->fullName() }}</p>
                    <p class="email">{{ auth()->user()->email }}</p>
                    @if(isset($info))
                        <p class="phone">{{ $info->phone }}</p>
                        <p>{{ __('Дата рождения:') }} <span class="text">{{ $info->formattedDob() }}</span></p>
                        <p>{{ __('ИИН:') }} <span class="text">{{ $info->iin ?? '-' }}</span></p>
                    @endif
                    <p>{{ __('Пол:') }} <span class="text">{{ auth()->user()->gender() }}</span></p>
                    <div class="user-btns flex item-center">
                        <a href="{{ route('user.profile.edit') }}" class="btn-black">
                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M9.9492 2.67019L13.204 5.94086L4.96526 14.2199L1.71234 10.9492L9.9492 2.67019ZM15.6737 1.88138L14.2222 0.422776C13.6612 -0.140925 12.7504 -0.140925 12.1875 0.422776L10.7971 1.81998L14.0519 5.09068L15.6737 3.46092C16.1088 3.02368 16.1088 2.31859 15.6737 1.88138ZM0.00905723 15.5464C-0.0501753 15.8143 0.190506 16.0544 0.457113 15.9892L4.084 15.1055L0.831082 11.8348L0.00905723 15.5464Z" fill="#272727"/>
                            </svg>
                            {!! __('РЕДАКТИРОВАТЬ') !!}
                        </a>
                        <a href="{{ route('user.profile.password') }}" class="btn-white">
                            <svg width="16" height="15" viewBox="0 0 16 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M10.4345 4.7582L12.8928 2.36662M14.2976 1L12.8928 2.36662L14.2976 1ZM7.54763 7.5666C7.9103 7.91473 8.19861 8.3292 8.39595 8.78617C8.59328 9.24313 8.69576 9.73356 8.69746 10.2292C8.69917 10.7249 8.60008 11.2159 8.40589 11.6742C8.21171 12.1324 7.92626 12.5488 7.56599 12.8992C7.20573 13.2497 6.77775 13.5274 6.30672 13.7163C5.83568 13.9052 5.33088 14.0016 4.82139 14C4.3119 13.9983 3.80778 13.8986 3.33805 13.7067C2.86833 13.5147 2.44228 13.2342 2.08443 12.8814C1.38073 12.1726 0.991344 11.2232 1.00015 10.2379C1.00895 9.25247 1.41523 8.30987 2.13149 7.61307C2.84775 6.91627 3.81668 6.52102 4.82958 6.51246C5.84249 6.50389 6.81833 6.8827 7.54693 7.56729L7.54763 7.5666ZM7.54763 7.5666L10.4345 4.7582L7.54763 7.5666ZM10.4345 4.7582L12.5416 6.80813L15 4.41655L12.8928 2.36662L10.4345 4.7582Z" stroke="#272727" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                            {!! __('ИЗМЕНИТЬ ПАРОЛЬ') !!}
                        </a>
                    </div>
                </div>
                <div class="my-info__adresses">
                    <p class="title"><img src="{{ asset('i/icons/location-black.svg') }}" alt="">{!! __('Адреса доставки') !!}</p>
                        @foreach(auth()->user()->addresses()->orderByDesc('created_at')->get() as $address)
                           @if($address)
                            <div class="info-item">
                                <a href="#user-address" class="title-2">
                                    {{ $address->city ?? '' }}
                                    <p class="text">{{ $address->address ?? '' }} {{ $address->area ?? '' }}</p>
                                </a>
                            </div>
                           @endif
                        @endforeach
                    <a href="{{ route('user.profile.address') }}" class="add-location flex item-center">{!! __('Добавить новый адрес') !!}<img src="{{ url('i/icons/plus.svg') }}" alt=""></a>
                </div>
            </div>
        </div>
    </div>
    @endhandheld
@stop

@section('modal')
    <div class="remodal" data-remodal-id="user-address">
        <button data-remodal-action="close" class="remodal-close"></button>
        <div class="modal-body">
            <div class="info">
                @foreach(auth()->user()->addresses()->orderByDesc('created_at')->get() as $address)
                    @if($address)
                        <p class="title">{{ __('Адрес') }} <span>{{ $address->city ?? '' }}</span></p>
                        <p class="text">{{ $address->address ?? '' }} {{ $address->area ?? '' }}</p>
                    @endif
                @endforeach
                <div class="user-btns flex item-center">
                    <a href="{{ route('user.profile.address.edit', $address->id ?? '') }}" class="btn-white">
                        {{ __('Редактировать') }}
                    </a>
                    <a href="#" class="btn-black flex item-center" data-delete="{{ $address->id ?? '' }}">
                        {{ __('Удалить') }}
                    </a>
                </div>
            </div>
        </div>
    </div>
@stop
