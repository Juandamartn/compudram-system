@extends('home')

@section('home-content')
@php ($view = 'users')

<div class="content justify-content-center flex-direction-column no-wrap">
    <a href="{{ route('users.index') }}" class="back">
        <i class="fas fa-arrow-left"></i>
    </a>

    <h1>Editar usuario</h1>

    @if (session('status'))
        <div class="success log" role="alert">
            <div class="close" onclick="closeAlert(this.parentNode)">
                <i class="fas fa-times"></i>
            </div>
            
            {{ session('status') }}
        </div>
    @endif

    <form action="{{ route('users.update', $user) }}" method="post" class="form" enctype="multipart/form-data">
        <div class="form__field">
            <label for="name">Nombre <span class="required">*</span></label>

            <input type="text" name="name" required value="{{ old('name', $user->name) }}">
        </div>

        <div class="form__field">
            <label for="email">Correo <span class="required">*</span></label>

            <input type="email" name="email" required value="{{ old('email', $user->email) }}">
        </div>

        <div class="form__field">
            <label class="radio__label">Rol de usuario <span class="required">*</span></label>

            <div class="form__radio">
                <label class="container">Administrador
                    <input type="radio" name="role" value="admin" {{ $user->role == 'admin' ? __('checked') : __('') }} >

                    <span class="checkradio"></span>
                </label>

                <label class="container">Trabajador
                    <input type="radio" name="role" value="worker" {{ $user->role == 'worker' ? __('checked') : __('') }}>
                    
                    <span class="checkradio"></span>
                </label>
            </div>
        </div>

        <div class="form__button">
            <p>Imagen</p>

            <label for="image">
                <i class="fas fa-edit"></i>

                <input type="file" name="image" id="image" onchange="previewImage(this)">
            </label>

            @if($user->image)
                <img src="{{ $user->get_image }}" alt="{{ $user->name }} image">
            @else
                <img src="https://ui-avatars.com/api/?name={{ $user->name }}&background=758290&color=4F5B69&size=200" alt="">
            @endif
        </div>

        <div class="form__submit">
            @csrf
            @method('PUT')

            <input type="submit" value="Modificar usuario" class="btn btn-primary">
        </div>
    </form>
</div>
@endsection