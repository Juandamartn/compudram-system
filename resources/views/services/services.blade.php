@extends('home')

@section('home-content')
@php ($view = 'services')

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

    <a href="{{ route('services.create') }}" class="btn btn-new">
        <i class="fas fa-plus"></i>
    </a>

    @foreach ($services as $service)
        <div class="card cursor-pointer">
            <div class="card__header">
                <div class="card__header__title" onclick="window.location.href = '{{ route('services.show', $service) }}'">
                    <p class="name">{{ $service->get_name }}...</p>

                    <p class="name">{{ $service->owner }}</p>

                    <p class="date">Recibido el {{ $service->get_receipt_date }}</p>
                </div>

                <div class="card__header__controls">
                    <a href="{{ route('services.edit', $service) }}" class=" btn btn-edit hidden">
                        <i class="fas fa-edit"></i>
                    </a>

                    <form id="delete{{ $service->id }}" action="{{ route('services.destroy', $service) }}" method="post">
                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-delete hidden" onclick="confirmDelete(event, this.dataset.id)" data-id="{{ $service->id }}">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                    </form>
                </div>
            </div>

            {{-- <div class="card__image" onclick="window.location.href = '{{ route('services.show', $service) }}'">
                <img src="https://ui-avatars.com/api/?name={{ $service->name }}&background=758290&color=4F5B69&size=200" alt="">
            </div> --}}
        </div>
    @endforeach

    {{ $services->links('vendor.pagination.default') }}

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