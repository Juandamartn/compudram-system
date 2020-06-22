@extends('layouts.app')

@section('style')
<link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endsection

@section('content')
<div class="login">
    <div class="login__header">
        <a href="{{ route('password.confirm') }}">
            <i class="fas fa-check-double"></i>

            {{ __('Confirmar contraseña') }}
        </a>
    </div>

    <div class="info-log">
        {{ __('Por favor confirma tu contraseña antes de continuar.') }}
    </div>

    <form method="POST" action="{{ route('password.confirm') }}" class="login__form">
        @csrf

        <div class="login__form__password">
            <label for="password">{{ __('Contraseña') }}</label>

            <input id="password" type="password" @error('password') class="is-invalid" @enderror name="password"
                required autocomplete="current-password">

            @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="login__form__forgot-pw">
            <button type="submit" class="btn btn-primary">
                {{ __('Confirmar contraseña') }}
            </button>

            @if (Route::has('password.request'))
            <a href="{{ route('password.request') }}">
                {{ __('Olvidaste tu contraseña?') }}
            </a>
            @endif
        </div>
    </form>
</div>
@endsection