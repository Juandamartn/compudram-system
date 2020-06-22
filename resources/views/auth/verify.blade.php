@extends('layouts.app')

@section('style')
<link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endsection

@section('content')
<div class="login">
    <div class="login__header">
        <a href="{{ route('verification.resend') }}">
            <i class="fas fa-share"></i>

            {{ __('Verificar correo') }}
        </a>
    </div>

    @if (session('resent'))
    <div class="success-log" role="alert">
        {{ __('Un link de verificación se ha enviado a tu correo!') }}
    </div>
    @endif

    <div class="info-log">
        {{ __('Antes de proceder, verifica tu dirección de correo') }}
        {{ __('Si no recibiste el correo') }},
    </div>

    <form class="login__form" method="POST" action="{{ route('verification.resend') }}">
        @csrf
        <div class="login__form__submit">
            <button type="submit"
                class="btn btn-primary">{{ __('Enviar correo') }}</button>
        </div>
    </form>
</div>
@endsection