@extends('home')

@section('home-content')
@php ($view = 'systems')

<div class="content justify-content-center flex-direction-column no-wrap">
    <a href="{{ route('systems.index') }}" class="back">
        <i class="fas fa-arrow-left"></i>
    </a>

    <h1>Editar sistema</h1>

    @if (session('status'))
        <div class="success log" role="alert">
            <div class="close" onclick="closeAlert(this.parentNode)">
                <i class="fas fa-times"></i>
            </div>

            {{ session('status') }}
        </div>
    @endif

    <form action="{{ route('systems.update', $system) }}" method="post" enctype="multipart/form-data" class="form">
        <div class="form__field">
            <label for="name">Nombre del sistema <span class="required">*</span></label>

            <input type="text" name="name" required value="{{ old('name', $system->name) }}">
        </div>

        <div class="form__button">
            <label for="image">
                <i class="fas fa-edit"></i>

                <input type="file" name="image" id="image" onchange="previewImage(this)">
            </label>

            @if ($system->image)
                <img src="{{ $system->get_image }}" alt="{{ $system->name }} image">
            @else
                <img src="https://ui-avatars.com/api/?name={{ $system->name }}&background=758290&color=4F5B69&size=200" alt="{{ $system->name }} image">
            @endif
        </div>

        <div class="form__submit">
            @csrf
            @method('PUT')

            <input type="submit" value="Modificar sistema" class="btn btn-primary">
        </div>
    </form>
</div>
@endsection