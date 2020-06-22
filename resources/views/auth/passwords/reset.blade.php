@extends('layouts.app')

@section('style')
<link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endsection

@section('content')
<div class="login">
    <div class="card-header">{{ __('Reset Password') }}</div>

    <div class="login__header">
        <a href="{{ route('password.update') }}">
            <i class="fas fa-exchange-alt"></i>

            {{ __('Reestablecer Contraseña') }}
        </a>
    </div>

    <form method="POST" action="{{ route('password.update') }}" class="login__form">
        @csrf

        <input type="hidden" name="token" value="{{ $token }}">

        <div class="login__form__email">
            <label for="email">{{ __('Correo') }}</label>

            <input id="email" type="email" @error('email') class="is-invalid" @enderror name="email"
                value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

            @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="login__form__password">
            <label for="password">{{ __('Contraseña') }}</label>

            <input id="password" type="password" @error('password') class="is-invalid"@enderror
                name="password" required autocomplete="new-password">

            @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="login__form__password">
            <label for="password-confirm"
                class="col-md-4 col-form-label text-md-right">{{ __('Confirmar Contraseña') }}</label>

            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required
                autocomplete="new-password">
        </div>

        <div class="login__form__submit">
            <button type="submit" class="btn btn-primary">
                {{ __('Reset Password') }}
            </button>
        </div>
    </form>
</div>
@endsection