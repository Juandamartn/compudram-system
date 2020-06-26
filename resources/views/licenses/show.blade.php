@extends('home')

@section('home-content')
@php ($view = 'licenses')

<div class="content">
    <a href="{{ route('licenses.index') }}" class="back back-show">
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
            @if ($license->status == 'activo')
                <form id="checkout{{ $license->id }}" action="{{ route('licenses.update', $license) }}" method="post" class="form__checkout">
                    <input type="hidden" name="status" value="inactivo">

                    @csrf
                    @method('PUT')

                    <button type="submit" class="btn btn-checkout" onclick="confirmDeactivation(event, this.dataset.id)"
                    data-id="{{ $license->id }}">
                        <i class="fas fa-power-off"></i>
                    </button>               
                </form>
            @endif

            <a href="{{ route('licenses.edit', $license) }}" class=" btn btn-edit">
                <i class="fas fa-edit"></i>
            </a>

            <form id="delete{{ $license->id }}" action="{{ route('licenses.destroy', $license) }}" method="post">
                @csrf
                @method('DELETE')

                <button type="submit" class="btn btn-delete" onclick="confirmDelete(event, this.dataset.id)" data-id="{{ $license->id }}">
                    <i class="fas fa-trash-alt"></i>
                </button>
            </form>
        </div>

        <div class="card__profile license">
            <p class="profile__name">Cliente: {{ $license->client->name }}</p>

            <p class="profile__owner">Sistema: {{ $license->system->name }}</p>

            <p class="profile__date">Fecha de expiración: {{ $license->get_due_date }}</p>

            @if ($license->system->image)
                <img src="{{ $license->system->get_image }}" alt="{{ $license->system->name }} image">
            @else
                <img src="https://ui-avatars.com/api/?name={{ $license->system->name }}&background=758290&color=4F5B69&size=200" alt="{{ $license->system->name }} image">
            @endif

            <span class="status @if($todayDate >= strtotime($license->due_date)) expired-status @elseif($license->status == 'inactivo') inactive-status @elseif($license->status == 'activo') active-status @endif ">
                @if($todayDate >= strtotime($license->due_date))
                    expirado
                @else
                    {{ $license->status }}
                @endif
            </span>
        </div>

        <div class="card__info">
            <div class="card__info__field">
                <p class="info__field__title">Fecha de activación</p>

                <p class="info__field__content">{{ $license->get_activation_date }}</p>
            </div>

            <div class="card__info__field">
                <p class="info__field__title">Numero de serie</p>

                <p class="info__field__content normal">{{ $license->serial_number }}</p>
            </div>

            <div class="card__info__field">
                <p class="info__field__title">Observaciones</p>

                <p class="info__field__content normal">{{ $license->observations }}</p>
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

            <div class="modal__checkout hidden">
                <p>¿Estás seguro que deseas desactivar la licencia?</p>

                <div class="checkout__input"></div>

                <div class="modal__pane__buttons">
                    <input type="submit" value="Sí" form="" class="btn btn-primary">
    
                    <button class="btn btn-danger" onclick="closeModal()">No</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection