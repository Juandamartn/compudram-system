@extends('home')

@section('home-content')
@php ($view = 'clients')

<div class="content">
    <a href="{{ route('clients.index') }}" class="back back-show">
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
            <a href="{{ route('clients.edit', $client) }}" class=" btn btn-edit">
                <i class="fas fa-edit"></i>
            </a>

            <form id="delete{{ $client->id }}" action="{{ route('clients.destroy', $client) }}" method="post">
                @csrf
                @method('DELETE')

                <button type="submit" class="btn btn-delete" onclick="confirmDelete(event, this.dataset.id)" data-id="{{ $client->id }}">
                    <i class="fas fa-trash-alt"></i>
                </button>
            </form>
        </div>

        <div class="card__profile">
            <p class="profile__name">{{ $client->name }}</p>

            <p class="profile__date">Alta en {{ $client->get_creation_date }}</p>

            <img src="https://ui-avatars.com/api/?name={{ $client->name }}&background=758290&color=4F5B69&size=200"
                alt="">
        </div>

        <div class="card__info">
            <div class="card__info__field">
                <p class="info__field__title">Correo</p>

                <p class="info__field__content email">{{ $client->email }}</p>
            </div>

            <div class="card__info__field">
                <p class="info__field__title">RFC</p>

                <p class="info__field__content rfc">{{ $client->rfc }}</p>
            </div>

            <div class="card__info__field">
                <p class="info__field__title">Dirección</p>

                <p class="info__field__content">{{ $client->address }}</p>
            </div>

            <div class="card__info__field">
                <p class="info__field__title">Teléfono</p>

                <p class="info__field__content">{{ $client->phone }}</p>
            </div>

            <div class="card__info__field">
                <p class="info__field__title">Última actualización</p>

                <p class="info__field__content">{{ $client->get_updated_date }}</p>
            </div>
        </div>
    </div>

    <div class="modal hidden">
        <div class="modal__pane">
            <div class="modal__delete">
                <p>¿Estas seguro que deseas eliminar?</p>
    
                <div class="modal__pane__buttons">
                    <input type="submit" value="Sí" form="" class="btn btn-primary">
    
                    <button class="btn btn-danger" onclick="closeModal()">No</button>
                </div>
            </div>

            <div class="modal__checkout hidden"></div>

            <div class="modal__renovate hidden"></div>
        </div>
    </div>
</div>
@endsection