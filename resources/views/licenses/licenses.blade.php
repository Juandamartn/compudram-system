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
                <p class="name">{{ $license->get_name }}...</p>

                <p class="name">{{ $license->owner }}</p>

                <p class="date">Recibido el {{ $license->get_receipt_date }}</p> <span class="status @if($license->status == 'activo') active-status @else inactive-status @endif status-index">{{ $license->status }}</span>
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