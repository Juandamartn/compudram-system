@extends('home')

@section('home-content')
@php ($view = 'systems')

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

    <a href="{{ route('systems.create') }}" class="btn btn-new">
        <i class="fas fa-plus"></i>
    </a>

    @foreach ($systems as $system)
        <div class="card">
            <div class="card__header">
                <div class="card__header__title">
                    <p class="name">{{ $system->name }}</p>

                    <p class="date">Creado en {{ $system->get_creation_date }}</p>
                </div>

                <div class="card__header__controls">
                    <a href="{{ route('systems.edit', $system) }}" class=" btn btn-edit hidden">
                        <i class="fas fa-edit"></i>
                    </a>

                    <form id="delete{{ $system->id }}" action="{{ route('systems.destroy', $system) }}" method="post">
                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-delete hidden" onclick="confirmDelete(event, this.dataset.id)" data-id="{{ $system->id }}">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                    </form>
                </div>
            </div>

            <div class="card__image">
                @if ($system->image)
                <img src="{{ $system->get_image }}" alt="{{ $system->name }} image">
                @else
                <img src="https://ui-avatars.com/api/?name={{ $system->name }}&background=758290&color=4F5B69&size=200" alt="">
                @endif
            </div>
        </div>
    @endforeach

    {{ $systems->links('vendor.pagination.default') }}

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