@extends('home')

@section('home-content')
@php ($view = 'users')

<div class="content">
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

    <a href="{{ route('users.create') }}" class="btn btn-new">
        <i class="fas fa-plus"></i>
    </a>

    @foreach ($users as $user)
    <div class="card cursor-pointer users">
        <div class="card__header">
            <div class="card__header__title" onclick="window.location.href = '{{ route('users.show', $user) }}'">
                <p class="name">{{ $user->name }}</p>

                <p class="date">Alta en {{ $user->get_creation_date }}</p> <span class="status @if($user->status == 'expirado') expired-status @elseif($user->status == 'inactivo') inactive-status @elseif($user->status == 'activo') active-status @endif status-index">
                    {{ $user->status }}
                </span>
            </div>

        </div>

        <div class="card__header__controls controls__licenses">
            @if ($user->status == 'activo')
                <form id="checkout{{ $user->id }}" action="{{ route('users.update', $user) }}" method="post" class="form__checkout">
                    <input type="hidden" name="status" value="inactivo">

                    @csrf
                    @method('PUT')

                    <button type="submit" class="btn btn-checkout hidden" onclick="confirmDeactivation(event, this.dataset.id)"
                    data-id="{{ $user->id }}">
                        <i class="fas fa-power-off"></i>
                    </button>                
                </form>
            @endif

            <a href="{{ route('users.edit', $user) }}" class=" btn btn-edit hidden">
                <i class="fas fa-edit"></i>
            </a>

            <form id="delete{{ $user->id }}" action="{{ route('users.destroy', $user) }}" method="post">
                @csrf
                @method('DELETE')

                <button type="submit" class="btn btn-delete hidden" onclick="confirmDelete(event, this.dataset.id)"
                    data-id="{{ $user->id }}">
                    <i class="fas fa-trash-alt"></i>
                </button>
            </form>
        </div>

        <div class="card__image" onclick="window.location.href = '{{ route('users.show', $user) }}'">
            @if ($user->image)
            <img src="{{ $user->get_image }}" alt="{{ $user->name }} image">
            @else
            <img src="https://ui-avatars.com/api/?name={{ $user->name }}&background=758290&color=4F5B69&size=200" alt="">
            @endif
        </div>
    </div>
    @endforeach

    {{ $users->links('vendor.pagination.default') }}

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
                <p>¿Estás seguro que deseas desactivar al usuario?</p>

                <div class="modal__pane__buttons">
                    <input type="submit" value="Sí" form="" class="btn btn-primary">
    
                    <button class="btn btn-danger" onclick="closeModal()">No</button>
                </div>
            </div>

            <div class="modal__renovate hidden"></div>
        </div>
    </div>
</div>
@endsection