@extends('home')

@section('home-content')
@php ($view = 'services')

<div class="content justify-content-center flex-direction-column no-wrap">
    <a href="{{ route('services.index') }}" class="back">
        <i class="fas fa-arrow-left"></i>
    </a>

    <h1>Editar servicio</h1>

    @if (session('status'))
        <div class="success log" role="alert">
            <div class="close" onclick="closeAlert(this.parentNode)">
                <i class="fas fa-times"></i>
            </div>
            
            {{ session('status') }}
        </div>
    @endif

    <form action="{{ route('services.update', $service) }}" method="post" class="form">
        <div class="form__field">
            <label for="name">Nombre del servicio <span class="required">*</span></label>

            <input type="text" name="name" required value="{{ old('name', $service->name) }}" class="normal">
        </div>

        <div class="form__field">
            <label for="owner">Cliente <span class="required">*</span></label>

            <input type="text" name="owner" required value="{{ old('owner', $service->owner) }}">
        </div>

        <div class="form__field">
            <label for="brand_pc">Marca de PC</label>

            <input type="text" name="brand_pc" value="{{ old('brand_pc', $service->brand_pc) }}">
        </div>

        <div class="form__field">
            <label for="accesories">Accesorios incluídos</label>

            <input type="text" name="accesories" value="{{ old('accesories', $service->accesories) }}">
        </div>

        <div class="form__field">
            <label for="description">Descripción <span class="required">*</span></label>

            <input type="text" name="description" required value="{{ old('description', $service->description) }}">
        </div>

        <div class="form__field">
            <label for="receipt_date">Fecha de recibido <span class="required">*</span></label>

            <input type="date" name="receipt_date" required value="{{ old('receipt_date', $service->get_receipt_date_other) }}">
        </div>

        <div class="form__field">
            <label for="delivery_date">Fecha de entrega</label>

            <input type="date" name="delivery_date" value="{{ old('delivery_date', $service->get_delivery_date_other) }}">
        </div>

        <div class="form__field">
            <label class="radio__label">Estatus</label>

            <div class="form__radio">
                <label class="container">Activo
                    <input type="radio" name="status" value="activo" @if($service->status == 'activo') checked="checked" @endif>
    
                    <span class="checkradio"></span>
                </label>
    
                <label class="container">Inactivo
                    <input type="radio" name="status" value="inactivo" @if($service->status == 'inactivo') checked="checked" @endif>
                    
                    <span class="checkradio"></span>
                </label>
            </div>
        </div>

        <div class="form__field">
            <label for="charge">Cobro</label>

            <input type="text" name="charge" value="{{ old('charge', $service->charge) }}">
        </div>

        <div class="form__submit">
            @csrf
            @method('PUT')

            <input type="submit" value="Modificar servicio" class="btn btn-primary">
        </div>
    </form>
</div>
@endsection