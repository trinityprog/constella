@extends('layouts.agent')

@section('title', 'Регистрация агента')

@section('body-class', 'login-agent')

@section('content')
    <div class="content">
        <div class="container">
            <div class="login-form">
                <h1>{{ __('Регистрация агента') }}</h1>
                <form class="form" action="{{ route('agent.register.action') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <input type="text" name="fio" placeholder="ФИО" value="{{ old('fio') }}" autofocus>
                        @error('fio') <span class="form-error">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <input type="text" name="iin" placeholder="ИИН" value="{{ old('iin') }}">
                        @error('iin') <span class="form-error">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <input type="text" name="phone" placeholder="Телефон" value="{{ old('phone') }}">
                        @error('phone') <span class="form-error">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <input type="email" name="email" placeholder="E-mail" value="{{ old('email') }}">
                        @error('email') <span class="form-error">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <input type="date" name="dob">
                    </div>
                    <div class="form-group">
                        <select name="manager_id" id="manager_id">
                            <option value="">{{ __('Ваш менеджер') }}</option>
                            @foreach($managers as $manager)
                                <option value="{{ $manager->id }}">{{ $manager->fio }}</option>
                            @endforeach
                        </select>
                        @error('manager_id') <span class="form-error">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <input type="text" name="password" placeholder="Пароль">
                    </div>
                    <div class="form-group">
                        <button type="submit">{{ __('Зарегистрироваться') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop
