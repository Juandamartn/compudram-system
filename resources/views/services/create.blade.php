@extends('home')

@section('home-content')
@php ($view = 'services')

<div class="content justify-content-center flex-direction-column no-wrap">
    <a href="{{ route('services.index') }}" class="back">
        <i class="fas fa-arrow-left"></i>
    </a>

    <h1>Nuevo servicio</h1>

    @if (session('status'))
        <div class="success log" role="alert">
            <div class="close" onclick="closeAlert(this.parentNode)">
                <i class="fas fa-times"></i>
            </div>
            
            {{ session('status') }}
        </div>
    @endif

    <form action="{{ route('services.store') }}" method="post" class="form">
        <div class="form__field">
            <label for="name">Nombre del servicio <span class="required">*</span></label>

            <input type="text" name="name" required value="{{ old('name') }}" class="normal">
        </div>

        <div class="form__field">
            <label for="owner">Cliente <span class="required">*</span></label>

            <input type="text" name="owner" required value="{{ old('owner') }}">
        </div>

        <div class="form__field">
            <label for="brand_pc">Marca de PC</label>

            <input type="text" name="brand_pc" value="{{ old('brand_pc') }}">
        </div>

        <div class="form__field">
            <label for="accesories">Accesorios incluídos</label>

            <input type="text" name="accesories" value="{{ old('accesories') }}">
        </div>

        <div class="form__field">
            <label for="description">Descripción <span class="required">*</span></label>

            <input type="text" name="description" required value="{{ old('description') }}">
        </div>

        <div class="form__field">
            <label for="receipt_date">Fecha de recibido <span class="required">*</span></label>

            <input type="date" name="receipt_date" required value="{{ old('receipt_date') }}">
        </div>

        <div class="form__field">
            <label for="delivery_date">Fecha de entrega</label>

            <input type="date" name="delivery_date" value="{{ old('delivery_date') }}">
        </div>

        <div class="form__field">
            <label for="charge">Cobro</label>

            <input type="text" name="charge" value="{{ old('charge') }}">
        </div>

        <div class="form__submit">
            @csrf

            <input type="submit" value="Crear servicio" class="btn btn-primary">
        </div>
    </form>
</div>
@endsection