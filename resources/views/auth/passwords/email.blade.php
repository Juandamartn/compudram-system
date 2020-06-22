@extends('layouts.app')

@section('style')
<link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endsection

@section('content')
<div class="login">
    <div class="login__header">
        <a href="{{ route('password.email') }}">
            <i class="far fa-question-circle"></i>

            {{ __('Reestablecer contraseña') }}
        </a>
    </div>

    @if (session('status'))
    <div class="info-log" role="alert">
        {{ session('status') }}
    </div>
    @endif

    <form method="POST" action="{{ route('password.email') }}" class="login__form">
        @csrf

        <div class="login__form__email">
            <label for="email">{{ __('Correo') }}</label>

            <input id="email" type="email" @error('email') class="is-invalid" @enderror name="email"
                value="{{ old('email') }}" required autocomplete="email" autofocus>

            @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="login__form__submit">
            <button type="submit" class="btn btn-primary">
                {{ __('Enviar correo de reestablecimiento') }}
            </button>
        </div>
    </form>
</div>
@endsection