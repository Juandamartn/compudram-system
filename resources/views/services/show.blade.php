@extends('home')

@section('home-content')
@php ($view = 'services')

<div class="content">
    <a href="{{ route('services.index') }}" class="back back-show">
        <i class="fas fa-arrow-left"></i>
    </a>

    <div class="logs">
        @if (session('status'))
        <div class="success log" role="alert">
            <div class="close" onclick="closeAlert(this.parentNode)">
                <i class="fas fa-times"></i>
            </div>

            {{ session('status') }}
        </div>

        @elseif (session('error'))
        <div class="error log" role="alert">
            <div class="close" onclick="closeAlert(this.parentNode)">
                <i class="fas fa-times"></i>
            </div>

            {!! session('error') !!}
        </div>
        @endif
    </div>

    <div class="card__show">
        <div class="card__controls">
            <a href="{{ route('services.edit', $service) }}" class=" btn btn-edit">
                <i class="fas fa-edit"></i>
            </a>

            <form id="delete{{ $service->id }}" action="{{ route('services.destroy', $service) }}" method="post">
                @csrf
                @method('DELETE')

                <button type="submit" class="btn btn-delete" onclick="confirmDelete(event, this.dataset.id)" data-id="{{ $service->id }}">
                    <i class="fas fa-trash-alt"></i>
                </button>
            </form>
        </div>

        <div class="card__profile service">
            <p class="profile__name">{{ $service->name }}</p>

            <p class="profile__owner">Cliente: {{ $service->owner }}</p>

            <p class="profile__date">Fecha de entrega: {{ $service->get_delivery_date }}</p>
        </div>

        <div class="card__info">
            <div class="card__info__field">
                <p class="info__field__title">Marca de PC</p>

                <p class="info__field__content">{{ $service->brand_pc }}</p>
            </div>

            <div class="card__info__field">
                <p class="info__field__title">Accesorios incluidos</p>

                <p class="info__field__content normal">{{ $service->accesories }}</p>
            </div>

            <div class="card__info__field">
                <p class="info__field__title">Detalles del servicio</p>

                <p class="info__field__content normal">{{ $service->description }}</p>
            </div>

            <div class="card__info__field">
                <p class="info__field__title">Fecha de recibido</p>

                <p class="info__field__content">{{ $service->get_receipt_date }}</p>
            </div>

            <div class="card__info__field">
                <p class="info__field__title">Cobro por servicio</p>

                <p class="info__field__content">$ {{ $service->charge }}</p>
            </div>
        </div>
    </div>

    <div class="modal hidden">
        <div class="modal__pane">
            <p>¿Estas seguro que deseas eliminar?</p>

            <div class="modal__pane__buttons">
                <input type="submit" value="Sí" form="" class="btn btn-primary">

                <button class="btn btn-danger" onclick="closeModal()">No</button>
            </div>
        </div>
    </div>
</div>
@endsection