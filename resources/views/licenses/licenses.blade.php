@extends('home')

@section('home-content')
@php ($view = 'licenses')

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

    <a href="{{ route('licenses.create') }}" class="btn btn-new">
        <i class="fas fa-plus"></i>
    </a>

    @foreach ($licenses as $license)
    <div class="card cursor-pointer licenses">
        <div class="card__header">
            <div class="card__header__title" onclick="window.location.href = '{{ route('licenses.show', $license) }}'">
                <p class="name">{{ $license->client->name }}</p>

                <p class="name">{{ $license->system->name }}</p>

                <p class="serial">{{ $license->serial_number }}</p>

                <p class="date">Expira en {{ $license->get_due_date }}</p> <span class="status @if($license->status == 'activo') active-status @else inactive-status @endif status-index">{{ $license->status }}</span>
            </div>

        </div>

        <div class="card__header__controls controls__licenses">
            @if ($license->status == 'activo')
                <form id="checkout{{ $license->id }}" action="{{ route('licenses.update', $license) }}" method="post" class="form__checkout">
                    <input type="hidden" name="status" value="inactivo">

                    <input type="hidden" name="charge" value="{{ $license->charge }}" id="input{{ $license->id }}">

                    @csrf
                    @method('PUT')

                    <button type="submit" class="btn btn-checkout hidden" onclick="confirmCheckout(event, this.dataset.id, this.dataset.charge)"
                    data-id="{{ $license->id }}" data-charge="{{ $license->charge }}">
                        <i class="fas fa-dollar-sign"></i>
                    </button>                
                </form>
            @endif

            <a href="{{ route('licenses.edit', $license) }}" class=" btn btn-edit hidden">
                <i class="fas fa-edit"></i>
            </a>

            <form id="delete{{ $license->id }}" action="{{ route('licenses.destroy', $license) }}" method="post">
                @csrf
                @method('DELETE')

                <button type="submit" class="btn btn-delete hidden" onclick="confirmDelete(event, this.dataset.id)"
                    data-id="{{ $license->id }}">
                    <i class="fas fa-trash-alt"></i>
                </button>
            </form>
        </div>

        <div class="card__image">
            @if ($license->system->image)
            <img src="{{ $license->get_image }}" alt="{{ $license->system->name }} image">
            @else
            <img src="https://ui-avatars.com/api/?name={{ $license->system->name }}&background=758290&color=4F5B69&size=200" alt="">
            @endif
        </div>
    </div>
    @endforeach

    {{ $licenses->links('vendor.pagination.default') }}

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
                <p></p>

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