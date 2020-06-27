@extends('home')

@section('home-content')
@php ($view = 'users')

<div class="content">
    <a href="{{ route('users.index') }}" class="back back-show">
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
            @if ($user->status == 'activo')
                <form id="checkout{{ $user->id }}" action="{{ route('users.update', $user) }}" method="post" class="form__checkout">
                    <input type="hidden" name="status" value="inactivo">

                    @csrf
                    @method('PUT')

                    <button type="submit" class="btn btn-checkout" onclick="confirmDeactivation(event, this.dataset.id)"
                    data-id="{{ $user->id }}">
                        <i class="fas fa-power-off"></i>
                    </button>               
                </form>
            @endif

            <a href="{{ route('users.edit', $user) }}" class=" btn btn-edit">
                <i class="fas fa-edit"></i>
            </a>

            <form id="delete{{ $user->id }}" action="{{ route('users.destroy', $user) }}" method="post">
                @csrf
                @method('DELETE')

                <button type="submit" class="btn btn-delete" onclick="confirmDelete(event, this.dataset.id)" data-id="{{ $user->id }}">
                    <i class="fas fa-trash-alt"></i>
                </button>
            </form>
        </div>

        <div class="card__profile license">
            <p class="profile__name">{{ $user->name }}</p>

            <p class="profile__date">Alta en {{ $user->get_creation_date }}</p>

            @if ($user->image)
                <img src="{{ $user->get_image }}" alt="{{ $user->name }} image">
            @else
                <img src="https://ui-avatars.com/api/?name={{ $user->name }}&background=758290&color=4F5B69&size=200" alt="{{ $user->name }} image">
            @endif

            <span class="status @if($user->status == 'expirado') expired-status @elseif($user->status == 'inactivo') inactive-status @elseif($user->status == 'activo') active-status @endif ">
                {{ $user->status }}
            </span>
        </div>

        <div class="card__info">
            <div class="card__info__field">
                <p class="info__field__title">Correo</p>

                <p class="info__field__content email">{{ $user->email }}</p>
            </div>

            <div class="card__info__field">
                <p class="info__field__title">Rol de usuario</p>

                <p class="info__field__content normal">{{ $user->role == 'admin' ? __('Administrador') : __('Trabajador') }}</p>
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

                <div class="modal__pane__buttons">
                    <input type="submit" value="Sí" form="" class="btn btn-primary">
    
                    <button class="btn btn-danger" onclick="closeModal()">No</button>
                </div>
            </div>

            <div class="modal__renovate hidden">
                <p>Renovar licencia</p>

                <div class="renovate__input">
                    <input type="date" onchange="updateCharge(this.value, this.dataset.id)">
                </div>

                <div class="modal__pane__buttons">
                    <input type="submit" value="Aceptar" form="" class="btn btn-primary">
    
                    <button class="btn btn-danger" onclick="closeModal()">Cancelar</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection