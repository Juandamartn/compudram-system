@extends('layouts.app')

@section('style')
<link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endsection

@section('content')
<div class="login">
    <div class="login__header">
        <a href="{{ route('login') }}">
            <i class="fas fa-sign-in-alt"></i>

            {{ __('Ingresar') }}
        </a>
    </div>

    <form method="POST" action="{{ route('login') }}" class="login__form">
        @csrf

        <div class="login__form__email">
            <label for="email" id="emailLabel">{{ __('Correo') }}</label>

            <input id="email" type="email" @error('email') class="is-invalid" @enderror name="email"
                value="{{ old('email') }}" required autocomplete="email" autofocus>

            @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="login__form__password">
            <label for="password" id="passwordLabel">{{ __('Contraseña') }}</label>

            <input id="password" type="password" @error('password') class="is-invalid" @enderror
                name="password" required autocomplete="current-password">

            @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="login__form__remember-check">
            <input class="form-check-input" type="checkbox" name="remember" id="remember"
                {{ old('remember') ? 'checked' : '' }}>

            <span class="checkmark"></span>

            <label class="form-check-label" for="remember">
                {{ __('Recuérdame') }}
            </label>
        </div>

        <div class="login__form__forgot-pw">
            <button type="submit" class="btn btn-primary">
                {{ __('Iniciar sesión') }}
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