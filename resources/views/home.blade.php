@extends('layouts.app')

@section('style')
<link rel="stylesheet" href="{{ asset('css/home.css') }}">
@endsection

@section('content')
<div class="home">
    <div class="home__header">
        <a href="{{ route('home') }}" @if ($view == 'dashboard') class="selected" @endif >
            <i class="fas fa-tachometer-alt"></i>

            {{ __('Inicio') }}
        </a>

        <a href="{{ route('systems.index') }}" @if ($view == 'systems') class="selected" @endif >
            <i class="fas fa-box"></i>

            {{ __('Sistemas') }}
        </a>

        <a href="" @if ($view == 'clients') class="selected" @endif >
            <i class="fas fa-users"></i>

            {{ __('Clientes') }}
        </a>

        <a href="" @if ($view == 'services') class="selected" @endif >
            <i class="fas fa-tools"></i>

            {{ __('Servicios') }}
        </a>

        <a href="" @if ($view == 'licences') class="selected" @endif >
            <i class="fas fa-address-card"></i>

            {{ __('Licencias') }}
        </a>

        <a href="" @if ($view == 'users') class="selected" @endif >
            <i class="fas fa-users-cog"></i>

            {{ __('Usuarios') }}
        </a>
    </div>

    @yield('home-content')
</div>
@endsection