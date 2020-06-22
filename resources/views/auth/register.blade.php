@extends('layouts.app')

@section('style')
<link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endsection

@section('content')
<div class="login">
    <div class="login__header">
        <a href="{{ route('register') }}">
            <i class="fas fa-user-plus"></i>

            {{ __('Registrarse') }}
        </a>
    </div>

    <form method="POST" action="{{ route('register') }}" class="login__form">
        @csrf

        <div class="login__form__name">
            <label for="name">{{ __('Name') }}</label>

            <input id="name" type="text" @error('name') class="is-invalid @enderror" name="name"
                value="{{ old('name') }}" required autocomplete="name" autofocus>

            @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="login__form__email">
            <label for="email">{{ __('E-Mail Address') }}</label>

            <input id="email" type="email" @error('email') class="is-invalid @enderror" name="email"
                value="{{ old('email') }}" required autocomplete="email">

            @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="login__form__password">
            <label for="password">{{ __('Password') }}</label>

            <input id="password" type="password" @error('password') class="is-invalid @enderror" name="password"
                required autocomplete="new-password">

            @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="login__form__password">
            <label for="password-confirm">{{ __('Confirm Password') }}</label>

            <input id="password-confirm" type="password" name="password_confirmation" required
                autocomplete="new-password">
        </div>

        <div class="login__form__submit">
            <button type="submit" class="btn btn-primary">
                {{ __('Register') }}
            </button>
        </div>
    </form>
</div>
@endsection