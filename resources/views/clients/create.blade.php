@extends('home')

@section('home-content')
@php ($view = 'clients')

<div class="content justify-content-center flex-direction-column no-wrap">
    <a href="{{ route('clients.index') }}" class="back">
        <i class="fas fa-arrow-left"></i>
    </a>

    <h1>Nuevo cliente</h1>

    @if (session('status'))
        <div class="success log" role="alert">
            <div class="close" onclick="closeAlert(this.parentNode)">
                <i class="fas fa-times"></i>
            </div>
            
            {{ session('status') }}
        </div>
    @endif

    <form action="{{ route('clients.store') }}" method="post" class="form">
        <div class="form__field">
            <label for="name">Nombre del cliente <span class="required">*</span></label>

            <input type="text" name="name" required value="{{ old('name') }}">
        </div>

        <div class="form__field">
            <label for="email">Correo <span class="required">*</span></label>

            <input type="email" name="email" required value="{{ old('email') }}">
        </div>

        <div class="form__field">
            <label for="rfc">RFC</label>

            <input type="text" name="rfc" required value="{{ old('rfc') }}">
        </div>

        <div class="form__field">
            <label for="address">Dirección <span class="required">*</span></label>

            <input type="text" name="address" required value="{{ old('address') }}">
        </div>

        <div class="form__field">
            <label for="phone">Teléfono <span class="required">*</span></label>

            <input type="text" name="phone" required value="{{ old('phone') }}">
        </div>

        <div class="form__submit">
            @csrf

            <input type="submit" value="Crear cliente" class="btn btn-primary">
        </div>
    </form>
</div>
@endsection